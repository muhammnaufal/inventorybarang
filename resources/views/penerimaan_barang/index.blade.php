<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Penerimaan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Penerimaan Barang</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('penerimaan_barang.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Terima</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataPenerimaanBarang as $index => $penerimaanBarang)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $penerimaanBarang->tgl_penyimpanan}}</td>
                                        <td>{{ $penerimaanBarang->alamat}}</td>
                                        <td>{{ $penerimaanBarang->kode_barang}}</td>
                                        <td>{{ $penerimaanBarang->quantity}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('penerimaan_barang.destroy', $penerimaanBarang->id_penerimaan) }}"
                                                method="POST">
                                                <a href="{{ route('penerimaan_barang.show', $penerimaanBarang->id_penerimaan) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('penerimaan_barang.edit', $penerimaanBarang->id_penerimaan) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Barang Belum Ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
