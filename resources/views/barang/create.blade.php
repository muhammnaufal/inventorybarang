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
                        <form action="{{ route('barang.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div>
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" name="nama_barang" class="form-control" id="nama_barang"
                                            placeholder="Enter Nama Barang">
                                        @error('nama_barang')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div>
                                            <div class="form-group">
                                                <label for="unit">Unit</label>
                                                <select class="form-control" name="unit" id="unit">
                                                    <option value="pcs">Pcs</option>
                                                    <option value="buah">Buah</option>
                                                    <option value="lembar">Lembar</option>
                                                </select>
                                                @error('unit')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="ukuran">Ukuran</label>
                                                <input type="text" name="ukuran" class="form-control" id="ukuran"
                                                    placeholder="Enter ukuran">
                                                @error('ukuran')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="warna">Warna</label>
                                                <input type="text" name="warna" class="form-control" id="warna"
                                                    placeholder="Enter warna">
                                                @error('warna')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="jenis">Jenis</label>
                                                <input type="text" name="jenis" class="form-control" id="jenis"
                                                    placeholder="Enter Jenis">
                                                @error('jenis')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="harga_satuan">Harga Satuan</label>
                                                <input type="text" name="harga_satuan" class="form-control"
                                                    id="harga_satuan" placeholder="Enter Harga Satuan">
                                                @error('harga_satuan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="stok">Stok</label>
                                                <input type="text" name="stok" class="form-control" id="stok"
                                                    placeholder="Enter Stok">
                                                @error('stok')
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
