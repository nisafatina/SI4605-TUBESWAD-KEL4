<?php

namespace App\Http\Controllers;

use App\Models\Restoran;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestoranController extends Controller
{
    public function index()
    {
        $restorans = Restoran::latest()->paginate(10);
        return view('restoran.index', compact('restorans'));
    }

    public function create()
    {
        return view('restoran.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_pemilik' => 'required|integer',
            'nama_restoran' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'qris' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $validatedData['gambar'] = $request->file('gambar')->store('images', 'public');
        $validatedData['qris'] = $request->file('qris')->store('images', 'public');

        Restoran::create($validatedData);

        return redirect()->route('restoran.index')->with('success', 'Restoran berhasil ditambahkan');
    }

    public function show(Restoran $restoran)
    {
        return view('restoran.show', compact('restoran'));
    }

    public function edit(Restoran $restoran)
    {
        return view('restoran.edit', compact('restoran'));
    }

    public function update(Request $request, Restoran $restoran)
    {
        $validatedData = $request->validate([
            'id_pemilik' => 'required|integer',
            'nama_restoran' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'qris' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($restoran->gambar) {
                Storage::disk('public')->delete($restoran->gambar);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('images', 'public');
        }

         // Cek jika ada gambar QRIS yang di-upload dan simpan
        if ($request->hasFile('qris')) {
            // Hapus gambar QRIS lama jika ada
            if ($restoran->qris) {
                Storage::disk('public')->delete($restoran->qris);
            }
            // Simpan gambar QRIS yang baru
            $validatedData['qris'] = $request->file('qris')->store('images', 'public');
        }

        $restoran->update($validatedData);

        return redirect()->route('restoran.index')->with('success', 'Restoran berhasil diubah');
    }

    public function destroy(Restoran $restoran)
    {
        if ($restoran->gambar) {
            Storage::disk('public')->delete($restoran->gambar);
        }
        if ($restoran->qris) {
            Storage::disk('public')->delete($restoran->qris);
        }

        $restoran->delete();

        return redirect()->route('restoran.index')->with('success', 'Restoran berhasil dihapus');
    }

    public function dashboard()
    {
        $restorans = Restoran::all(); // Mengambil semua data restoran
        return view('dashboard', compact('restorans'));
    }

    public function showMenu($id)
    {
        $restoran = Restoran::find($id);
        if (!$restoran) {
            abort(404, 'Restoran tidak ditemukan');
        }
        $menus = Menu::where('id_pemilik', $id)->get(); // Mengambil menu yang terkait dengan restoran

        return view('tampilan.DashboardMenu', compact('restoran', 'menus'));
    }

    // Menyimpan data keranjang
    public function addToCart(Request $request)
    {
        $cart = session('cart', []);
        $menuId = $request->menu_id;
        $quantity = $request->quantity;

        // Update atau tambahkan item ke cart
        if (isset($cart[$menuId])) {
            $cart[$menuId] += $quantity;
        } else {
            $cart[$menuId] = $quantity;
        }

        // Simpan kembali ke session
        session(['cart' => $cart]);

        return response()->json(['success' => true]);
    }

    public function panggilQris($id)
    {
        session(['restoran_id' => $id]);  // Menyimpan restoran_id di session
        $restoran = Restoran::find($id);
        if (!$restoran) {
            abort(404, 'Restoran tidak ditemukan');
        }

        // Redirect atau tampilkan halaman checkout
        return redirect()->route('pemesanan.create');
    }
}