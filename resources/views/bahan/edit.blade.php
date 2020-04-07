<!-- menentukan dimana layout/template akan dipakai -->
@extends('layout/main')

<!-- memberikan title pada bar jadi dinamis -->
@section('title', 'Swimoc Distro')

<!-- membuat isi content berdasarkan kebutuhan -->
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Bahan</h4>
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
                    <a href="#">Data Bahan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Bahan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Bahan</h4>
                            <a class="btn btn-primary btn-round ml-auto" style="color: white" href="{{ '/bahan' }}">
                                <i class="flaticon-left-arrow"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{url('/bahan/'.$bahan->bahan_id) }}">
                                    <!-- metod bawaan laravel untuk membajak form method POST -->
                                    @method('patch')
                                    <!-- memanggil token supaya data yang dimasukkan sah dan tidak bisa dipalsukan -->
                                    @csrf
                                    <div class="form-group">
                                        <label>Bahan</label>
                                        <input type="text" name="bahan_nama" class="form-control @error('bahan_nama') is-invalid  @enderror" id="bahan_nama" placeholder="Nama bahan" value="{{ $bahan->bahan_nama }}">
                                        @error('bahan_nama')
                                        <div class="is-invalid">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Bahan</label>
                                        <input type="text" name="bahan_harga" class="form-control @error('bahan_harga') is-invalid  @enderror" id="bahan_harga" placeholder="harga bahan" value="{{ $bahan->bahan_harga }}">
                                        @error('bahan_harga')
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
    var bahan_harga = new AutoNumeric('#bahan_harga', pengaturan_rupiah);
</script>
@endsection