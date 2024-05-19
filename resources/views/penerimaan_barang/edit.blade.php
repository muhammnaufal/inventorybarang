<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ubah Data Penerimaan Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Ubah Data Penerimaan Barang</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('penerimaan_barang.update', $dataPenerimaanBarang->id_penerimaan) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="tgl_penyimpanan">Tanggal Penyimpanan</label>
                                <input type="date" name="tgl_penyimpanan" class="form-control"
                                    placeholder="Enter Tanggal Penyimpanan"
                                    value="{{ old('tgl_penyimpanan', $dataPenerimaanBarang->tgl_penyimpanan) }}">
                                @error('tgl_penyimpanan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="barang">Barang</label>
                                <input type="text" name="barang" class="form-control" placeholder="Enter barang"
                                    value="{{ old('barang', $dataPenerimaanBarang->barang->nama_barang) }}" disabled>
                                @error('barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Enter alamat"
                                    value="{{ old('alamat', $dataPenerimaanBarang->alamat) }}">
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Jumlah</label>
                                <input type="text" name="quantity" class="form-control" placeholder="Enter quantity"
                                    value="{{ old('quantity', $dataPenerimaanBarang->quantity) }}">
                                @error('quantity')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br />
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
