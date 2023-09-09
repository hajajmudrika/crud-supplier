<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Produk Supplier</title>
</head>
<body style="background: lightgrey">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Produk Supplier</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('produks.create') }}" class="btn btn-md btn-success mb-3">Tambah Produk</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Tanggal Buat</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produks as $produk)
                                <tr>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->deskripsi }}</td>
                                <td>{{ $produk->harga }}</td>
                                <td>{{ $produk->status}}</td>
                                <td>{{ $produk->stok}}</td>
                                <td>{{ $produk->tanggal_buat }}</td>
                                <td class="text-center">
                                    {{-- <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('produks.destroy') }}, $produk->id" method="POST"> --}}
                                    <a href="{{  route('produks.show', $produk->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{  route('produks.edit', $produk->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"> HAPUS</button>
                                    </form>
                                </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Produk Belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'Berhasil');

        @elseif (session()->has('error'))

        toastr.error('{{ session('error') }}' 'Gagal');
            
        @endif
    </script>
</body>
</html>