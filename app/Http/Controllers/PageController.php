<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function dataBiji()
    {
        return [
            ['nama' => 'Arabika Gayo', 'asal' => 'Aceh', 'stok' => 24, 'harga' => 180000, 'foto' => 'biji-1.jpg', 'rasa' => 'Body penuh dengan rasa yang kompleks.'],
            ['nama' => 'Arabika Kintamani', 'asal' => 'Bali', 'stok' => 18, 'harga' => 170000, 'foto' => 'biji-2.jpg', 'rasa' => 'Segar dan seimbang, rasanya lebih lembut.'],
            ['nama' => 'Arabika Toraja', 'asal' => 'Sulawesi Selatan', 'stok' => 6, 'harga' => 190000, 'foto' => 'biji-3.jpg', 'rasa' => 'Ada nuansa buah, asamnya rendah, aromanya kompleks.'],
            ['nama' => 'Robusta Lampung', 'asal' => 'Lampung', 'stok' => 40, 'harga' => 95000, 'foto' => 'biji-4.jpg', 'rasa' => 'Pahit manis khas robusta dengan tekstur yang halus.'],
            ['nama' => 'Robusta Temanggung', 'asal' => 'Jawa Tengah', 'stok' => 4, 'harga' => 100000, 'foto' => 'biji-5.jpg', 'rasa' => 'Ada sentuhan cokelat dan sedikit rempah.'],
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
        ], [
            'username.required' => 'Username tidak boleh kosong.',
            'username.min' => 'Username minimal 3 karakter.',
        ]);

        return redirect()->route('dashboard', ['username' => $request->input('username')]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username', 'Tamu');
        $biji = $this->dataBiji();
        $menipis = array_filter($biji, fn ($item) => $item['stok'] <= 10);

        $ringkasan = [
            ['judul' => 'Jenis Biji Kopi', 'nilai' => count($biji)],
            ['judul' => 'Stok Menipis', 'nilai' => count($menipis)],
            ['judul' => 'Total Stok (kg)', 'nilai' => array_sum(array_column($biji, 'stok'))],
        ];

        $jenisKopi = [
            [
                'nama' => 'Arabika',
                'rasa' => 'Lebih harum dan kompleks, ada nuansa bunga, buah, dan cokelat.',
                'kafein' => '0,8 - 1,5%',
                'ketinggian' => '700 - 2.400 mdpl',
            ],
            [
                'nama' => 'Robusta',
                'rasa' => 'Lebih pahit, rasanya berkisar di cokelat dan rempah.',
                'kafein' => '1,7 - 3,5%',
                'ketinggian' => 'Di bawah 900 mdpl',
            ],
        ];

        return view('dashboard', compact('username', 'ringkasan', 'jenisKopi', 'biji'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Tamu');

        $detail = [
            'Peran' => 'Pengelola Toko',
            'Cabang' => 'Mauw Coffee Jember',
            'Shift' => 'Pagi (07.00 - 15.00)',
        ];

        $perluDicek = array_filter($this->dataBiji(), fn ($item) => $item['stok'] <= 10);

        return view('profile', compact('username', 'detail', 'perluDicek'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username', 'Tamu');
        $biji = $this->dataBiji();
        $totalStok = array_sum(array_column($biji, 'stok'));
        $nilaiStok = array_sum(array_map(fn ($item) => $item['stok'] * $item['harga'], $biji));

        return view('pengelolaan', compact('username', 'biji', 'totalStok', 'nilaiStok'));
    }
}
