<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|string|email|max:255|unique:admin',
        //     'password' => 'required|string|min:8',
        //     'nama' => 'required|string',
        //     'alamat' => 'required|string',
        //     'no_hp' =>'required|integer',
        // ]);
        
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:admin',
            'password' => 'required|string|min:8',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' =>'required|string',
        ]);

        $admin = Admin::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        // Debugging Log
        logger('Validated data:', $validatedData);

        Auth::guard('admin')->login($admin);

        return redirect('/login')->with('success', 'Registrasi berhasil, Anda sudah bisa login.');
    }

        
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Login berhasil
            $request->session()->regenerate();
            return redirect()->intended('/restoran');
        }

        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
    {
        $admin = Admin::all();
        $nav = 'Semua pemilik toko';

        return view('auth.index', compact('admin', 'nav'));
    }

    public function show(Admin $admin)
    {
        $nav = 'Detail pemilik toko - ' . $admin->nama;
        return view('auth.show', compact('admin', 'nav'));
    }

    public function edit(Admin $admin)
    {
        $nav = 'Edit pemilik toko - ' . $admin->nama;
        return view('auth.edit', compact('admin', 'nav'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update($validated);

        return redirect()->route('auth.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('auth.index')->with('success', 'pemilik toko berhasil dihapus.');
    }

    public function exportPdf()
    {
        $admins = Admin::all();

        // Buat konten HTML untuk file PDF
        $html = '<html>
        <head><title>Admin Report</title></head>
        <body>
        <h1>Admin Report</h1>
        <table border="1" cellpadding="5" cellspacing="0">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        </thead>
        <tbody>';
        
        foreach ($admins as $index => $admin) {
            $html .= '<tr>
            <td>' . ($index + 1) . '</td>
            <td>' . $admin->nama . '</td>
            <td>' . $admin->email . '</td>
            <td>' . $admin->no_hp . '</td>
            </tr>';
        }

        $html .= '</tbody></table></body></html>';

        // Set header untuk download file sebagai PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="admin-report.pdf"');

        // Konversi HTML ke PDF dengan built-in PDF renderer seperti `wkhtmltopdf` atau sejenisnya.
        echo $html;
        exit;
    }

    
}

