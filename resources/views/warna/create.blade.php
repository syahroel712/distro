<!-- menentukan dimana layout/template akan dipakai -->
@extends('layout/main')

<!-- memberikan title pada bar jadi dinamis -->
@section('title', 'Swimoc Distro')

<!-- membuat isi content berdasarkan kebutuhan -->
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Warna</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data Warna</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Warna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Warna</h4>
                            <a class="btn btn-primary btn-round ml-auto" style="color: white" href="{{ '/warna' }}">
                                <i class="flaticon-left-arrow"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ url('/warna') }}">
                                    <!-- memanggil token supaya data yang dimasukkan sah dan tidak bisa dipalsukan -->
                                    @csrf
                                    <div class="form-group">
                                        <label>Warna</label>
                                        <input type="text" name="warna_nama" class="form-control @error('warna_nama') is-invalid  @enderror" id="warna_nama" placeholder="Warna" value="{{ old('warna_nama') }}">
                                        @error('warna_nama')
                                        <div class="is-invalid">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="warna_harga" class="form-control @error('warna_harga') is-invalid  @enderror" id="warna_harga" placeholder="Harga" value="{{ old('warna_harga') }}">
                                        @error('warna_harga')
                                        <div class="is-invalid">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <button class="btn btn-success" type="submit">Simpan</button>
                                            <button class="btn btn-warning" type="reset">Reset</button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var pengaturan_rupiah = {
        currencySymbol: "Rp",
        decimalCharacter: ',',
        digitGroupSeparator: '.'
    };
    var warna_harga = new AutoNumeric('#warna_harga', pengaturan_rupiah);
</script>

@endsection