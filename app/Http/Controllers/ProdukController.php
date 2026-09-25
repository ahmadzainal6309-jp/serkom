<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProdukController extends Controller
{

    public function index(): View
    {
        $produks = Produk::latest('id')->paginate(10);

        return view('produk.index', compact('produks'));
    }


    public function create(): View
    {
        return view('produk.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produk,nama_produk',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);


        Produk::create($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }


    public function edit(Produk $produk): View
    {
        return view('produk.edit', compact('produk'));
    }


    public function update(Request $request, Produk $produk): RedirectResponse
    {
        $validated = $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produk,nama_produk,'.$produk->id,// agar nama produk sendiri tdk di anggap duplikat
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produk->update($validated);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }


    public function destroy(Produk $produk): RedirectResponse
    {
        try {
            $produk->delete();
            $pesan = 'Produk berhasil dihapus.';
        } catch (QueryException $e) {
    
            $pesan = 'Produk tidak bisa dihapus karena sudah tercatat dalam riwayat transaksi.';
        }

        return redirect()
            ->route('produk.index')
            ->with($pesan === 'Produk berhasil dihapus.' ? 'success' : 'error', $pesan);
    }
}
