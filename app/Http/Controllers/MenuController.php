<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu; // Import model Menu
use App\Models\Restoran; // Import model Restoran
use Barryvdh\DomPDF\Facade\Pdf;

class MenuController extends Controller
{
    /**
     * Menampilkan daftar menu.
     */
    public function index()
    {
        $menus = Menu::with('restoran')->paginate(10); // Gunakan paginate agar links() berfungsi
        return view('menus.index', compact('menus'));
    }

    /**
     * Menampilkan form untuk menambahkan menu baru.
     */
    public function create()
    {
        // Ambil semua restoran untuk dropdown
        $restoran = Restoran::all();
        return view('menus.create', compact('restoran'));
    }

    /**
     * Menyimpan data menu baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'kategori' => 'nullable|string|max:100',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_pemilik' => 'required|exists:restoran,id',
        ]);

        $menus = new Menu();
        $menus->nama_menu = $request->nama_menu;
        $menus->deskripsi = $request->deskripsi;
        $menus->harga = $request->harga;
        $menus->kategori = $request->kategori;
        $menus->id_pemilik = $request->id_pemilik;

        if ($request->hasFile('gambar_menu')) {
            $menus->gambar_menu = $request->file('gambar_menu')->store('uploads/menus', 'public');
        }
        $menus->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit menu.
     */
    public function edit($id)
    {
        $menus = Menu::findOrFail($id);
        $restoran = Restoran::all();
        return view('menus.edit', compact('menus', 'restoran'));
    }

    /**
     * Memperbarui data menu di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'kategori' => 'nullable|string|max:100',
            'gambar_menu' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'id_pemilik' => 'required|exists:restoran,id',
        ]);

        $menus = Menu::findOrFail($id);
        $menus->nama_menu = $request->nama_menu;
        $menus->deskripsi = $request->deskripsi;
        $menus->harga = $request->harga;
        $menus->kategori = $request->kategori;
        $menus->id_pemilik = $request->id_pemilik;

        if ($request->hasFile('gambar_menu')) {
            $menus->gambar_menu = $request->file('gambar_menu')->store('uploads/menus', 'public');
        }

        $menus->save();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui!');
    }

    /**
     * Menghapus menu dari database.
     */
    public function destroy($id)
    {
        $menus = Menu::findOrFail($id);

        // Hapus gambar jika ada
        if ($menus->gambar_menu) {
            \Storage::disk('public')->delete($menus->gambar_menu);
        }

        $menus->delete();

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus!');

    }

    public function order($menuId)
    {
        // Ambil data menu berdasarkan ID
        $menu = Menu::findOrFail($menuId);

        // Logic untuk menangani pemesanan, misalnya menyimpan data pemesanan ke database
        // Misalnya, buat pesanan baru (contoh implementasi bisa berbeda tergantung aplikasi)

        // Redirect kembali dengan pesan sukses atau error
        return redirect()->route('restoran.showMenu', $menu->id_pemilik)
                        ->with('success', 'Menu berhasil dipesan!');
    }

    public function downloadPdf()
    {
    $menus = Menu::with('restoran')->get();
    $pdf = Pdf::loadView('menus.pdf', compact('menus'));

    return $pdf->download('Daftar_Menu.pdf');
    }
}