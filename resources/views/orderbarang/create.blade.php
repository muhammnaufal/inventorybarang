<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Buat Data Barang</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('orderbarang.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div>
                                    <div class="form-group">
                                        <label for="kode_barang">Barang</label>
                                        <select class="form-control" name="kode_barang" id="kode_barang">
                                            @foreach ($dataBarang as $item)
                                                <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('kode_barang')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                                            placeholder="Enter Tanggal">
                                        @error('tanggal')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div>
                                            <div class="form-group">
                                                <label for="kode_supplier">Supplier</label>
                                                <select class="form-control" name="kode_supplier" id="kode_supplier">
                                                    @foreach ($dataSupplier as $item)
                                                        <option value="{{ $item->kode_supplier }}">
                                                            {{ $item->nama_supplier }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                                @error('kode_supplier')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div>
                                                <label for="ppn">PPN</label>
                                                <input type="text" name="ppn" class="form-control" id="ppn"
                                                    placeholder="Enter ppn">
                                                @error('ppn')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="quantity">Quantity</label>
                                                <input type="text" name="quantity" class="form-control"
                                                    id="quantity" placeholder="Enter quantity">
                                                @error('quantity')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                        </form>


                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
