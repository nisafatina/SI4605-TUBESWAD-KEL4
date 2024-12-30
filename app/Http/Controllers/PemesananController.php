<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Restoran;
use Barryvdh\DomPDF\Facade\Pdf;

class PemesananController extends Controller
{
    public function create($id)
    {
        // Ambil data keranjang dan total harga dari session
        $cart = session('cart', []);
        $total = session('total', 0);

        // Ambil restoran berdasarkan id_pemilik yang diberikan
        $restoran = Restoran::where('id_pemilik', $id)->first();

        if (!$restoran) {
            // Jika restoran tidak ditemukan, redirect ke dashboard dengan error
            return redirect()->route('dashboard')->with('error', 'Restoran tidak ditemukan');
        }

        // Inisialisasi array untuk menyimpan detail menu yang dipesan
        $items = [];
        foreach ($cart as $menuId => $quantity) {
            $menu = Menu::find($menuId);
            if ($menu) {
                $items[] = [
                    'menu' => $menu,
                    'quantity' => $quantity,
                    'total_price' => $menu->harga * $quantity,
                ];
            }
        }

        // Kirim data restoran dan keranjang ke view
        return view('pemesanan.create', compact('items', 'total', 'restoran'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([   
            'nama_pemesan' => 'required|string|max:255',
            'no_meja' => 'required|string|max:50',
            'total_harga' => 'required|numeric',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'items' => 'required|array', // Validasi items sebagai array
        ]);
        // Gabungkan nama-nama menu dari items
        $namaMenu = collect($request->items)->map(function ($item) {
            return $item['menu']; // Ambil nama menu
        })->implode(', ');

        // Simpan bukti pembayaran
        $buktiPembayaran = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        // Simpan data pemesanan
        $pemesanan = Pemesanan::create([
            'nama_pemesan' => $validated['nama_pemesan'],
            'no_meja' => $validated['no_meja'],
            'total_harga' => $validated['total_harga'],
            'bukti_pembayaran' => $buktiPembayaran,
            'nama_menu' => $namaMenu, // Masukkan nama menu yang digabungkan
            'status' => 'selesai',
        ]);

        // Kosongkan session cart dan total
        session()->forget('cart');
        session()->forget('total');

        // Redirect ke halaman sukses
        return redirect()->route('pemesanan.success', ['id' => $pemesanan->id])
            ->with('success', 'Pemesanan berhasil dibuat.');
    }

    
    public function show($id)
    {
        // Ambil data pemesanan berdasarkan id
        $order = Pemesanan::findOrFail($id);

        // Ambil item pesanan yang terkait dengan pemesanan
        $items = $order->items; // Pastikan relasi sudah terdefinisi dengan benar

        // Hitung total harga
        $total = 0;
        foreach ($items as $item) {
            $total += $item->menu->harga * $item->quantity;
        }

        // Tampilkan view untuk cetak bill
        return view('pemesanan.show', compact('order', 'items', 'total'));
    }

    public function success($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.success', compact('pemesanan'));
    }

    public function downloadBill($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);  // Ambil data pemesanan berdasarkan ID
        $pdf = PDF::loadView('pemesanan.bill', compact('pemesanan')); // Load view untuk bill
        return $pdf->download('bill-pemesanan-' . $pemesanan->id . '.pdf'); // Download PDF dengan nama file sesuai ID pemesanan
    }

    public function showCheckout($id)
    {
        $restoran = Restoran::find($id);
        return view('restoran', compact('restoran'));
    }

    public function index()
    {
        // Ambil semua data pemesanan dari database
        $pemesanan = Pemesanan::paginate(10);
    
        // Tampilkan view dan kirimkan data pemesanan ke view
        return view('pemesanan.index', compact('pemesanan'));
    }

    public function destroy($id)
    {
        // Cari pemesanan berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id);

        // Hapus file bukti pembayaran dari storage jika ada
        if ($pemesanan->bukti_pembayaran && \Storage::exists('public/' . $pemesanan->bukti_pembayaran)) {
            \Storage::delete('public/' . $pemesanan->bukti_pembayaran);
        }

        // Hapus data pemesanan
        $pemesanan->delete();

        // Redirect kembali ke index dengan pesan sukses
        return redirect()->route('pemesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
    }