<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //

    public function index(): View {

        //ambil data produk

        $produks = Produk::latest()->paginate(5);

        return view('produks.index', compact('produks'));
    }

    public function create(): View {
        return view('produks.create');
    }

    public function store(Request $request): RedirectResponse {

        //validasi form

        $this->validate($request, [
            'nama' => 'required|min:5',
            'deskripsi' => 'required|min:5',
            'harga' => 'required|min:5',
            'stok' => 'required|min:3',
            'status' => 'required|min:5',
            'tanggal_buat' => 'required'

        ]);

        //create produk

        Produk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'status' => $request->status,
            'stok' => $request->stok,
            'tanggal_buat' => $request->tanggal_buat

        ]);

        return redirect()->route('produks.index')->with(['success' => 'Data Berhasil Di Simpan']);
    }

    public function show(string $id): View {

        $produk = Produk::findOrFail($id);

        return view('produks.show', compact('produk'));
    }
}
