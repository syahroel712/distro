<!-- menentukan dimana layout/template akan dipakai -->
@extends('layout/main')

<!-- memberikan title pada bar jadi dinamis -->
@section('title', 'Swimoc Distro')

<!-- membuat isi content berdasarkan kebutuhan -->
@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Supplier</h4>
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
                    <a href="#">Data Supplier</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Supplier</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Supplier</h4>
                            <a class="btn btn-primary btn-round ml-auto" style="color: white" href="{{ '/supplier' }}">
                                <i class="flaticon-left-arrow"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ url('/supplier') }}">
                                    <!-- memanggil token supaya data yang dimasukkan sah dan tidak bisa dipalsukan -->
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Supplier</label>
                                        <input type="text" name="supplier_nama" class="form-control @error('supplier_nama') is-invalid  @enderror" id="supplier_nama" placeholder="Nama Supplier" value="{{ old('supplier_nama') }}">
                                        @error('supplier_nama')
                                        <div class="is-invalid">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kontak Supplier</label>
                                        <input type="text" name="supplier_kontak" class="form-control @error('supplier_kontak') is-invalid  @enderror" id="supplier_kontak" placeholder="Kontak Supplier" value="{{ old('supplier_kontak') }}">
                                        @error('supplier_kontak')
                                        <div class="is-invalid">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email Supplier</label>
                                        <input type="email" name="supplier_email" class="form-control @error('supplier_email') is-invalid  @enderror" id="supplier_email" placeholder="Email Supplier" value="{{ old('supplier_email') }}">
                                        @error('supplier_email')
                                        <div class="is-invalid">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Supplier</label>

                                        <textarea rows="4" cols="54" name="supplier_alamat" style="resize:none" class="form-control @error('supplier_alamat') is-invalid  @enderror">{{ old('supplier_alamat') }}</textarea>
                                        @error('supplier_alamat')
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
    var supplier_harga = new AutoNumeric('#supplier_harga', pengaturan_rupiah);
</script>

@endsection