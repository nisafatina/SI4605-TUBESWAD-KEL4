<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $menuId = $request->input('menu_id');
        $quantity = $request->input('quantity');
        
        // Jika quantity 0, tetap simpan item dengan quantity 0 di session
        if ($quantity >= 0) {
            session()->put("cart.$menuId", $quantity); // Simpan ke session dengan quantity yang diinput
        }

        // Hitung total harga
        $total = 0;
        foreach (session('cart') as $id => $qty) {
            $item = Menu::find($id);
            if ($item) {
                $total += $item->harga * $qty;
            }
        }

        // Menyimpan total harga di session
        session()->put('total', $total);

        // Mengembalikan response JSON dengan total harga yang terbaru
        return response()->json(['message' => 'Item updated in cart', 'total' => $total]);
    }

}