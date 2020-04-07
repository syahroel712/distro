<!-- menentukan dimana layout/template akan dipakai -->
@extends('layout/main')

<!-- memberikan title pada bar jadi dinamis -->
@section('title', 'Swimoc Distro')

<!-- membuat isi content berdasarkan kebutuhan -->
@section('content')
<div class="main-panel">
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
                    <!-- <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Basic Form</a>
                    </li> -->
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Warna</h4>
                                <a class="btn btn-primary btn-round ml-auto" style="color: white" href="{{ '/warna/create' }}">
                                    <i class="fa fa-plus"></i>
                                    Data Warna
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @if(session('status'))
                                    <div class="alert alert-success text-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Warna</th>
                                                    <th>Harga</th>
                                                    <th style="width: 10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($warna as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->warna_nama }}</td>
                                                    <td>Rp. {{ number_format($data->warna_harga, 2) }}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <a href="/warna/{{ $data->warna_id }}/edit" class="btn btn-link btn-primary" data-toggle="tooltip" data-original-title="Edit Data">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <form action="{{url('/warna/'.$data->warna_id) }}" method="POST" class="d-inline" style="margin-top: 0.5px ">
                                                                <!-- metod bawaan laravel utk hapus data dengan nama delete -->
                                                                @method('delete')
                                                                <!-- method bawaan laravel yang berisi token random utk mencegah user nakal -->
                                                                @csrf
                                                                <button data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Data" type="submit" onclick="return confirm('Yakin Mau Hapus Data Ini?')"><i class="fa fa-times"></i></button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">

            </nav>
            <div class="copyright ml-auto">
                2020, made with <i class="fa fa-heart heart text-danger"></i> by <a href="#">Swimoc Distro</a>
            </div>
        </div>
    </footer>
</div>
@endsection