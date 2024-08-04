<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data supplier</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('supplier.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Supplier</th>
                                    <th scope="col">Nama supplier</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataSupplier as $index => $supplier)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $supplier->kode_supplier }}</td>
                                        <td>{{ $supplier->nama_supplier }}</td>
                                        <td>{{ $supplier->telepon }}</td>
                                        <td>{{ $supplier->alamat }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('supplier.destroy', $supplier->kode_supplier) }}"
                                                method="POST">
                                                <a href="{{ route('supplier.show', $supplier->kode_supplier) }}"
                                                    class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('supplier.edit', $supplier->kode_supplier) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data supplier Belum Ada.
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
