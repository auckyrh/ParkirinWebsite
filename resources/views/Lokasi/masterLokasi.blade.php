@extends('layouts.parent')

@section('title','Master Lokasi')

@section('contentheader')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <div class="form-group">
                        <form action="/tambahLokasi" method="get">
                            @csrf
                            <button type="submit" style="width: 100%;" class="btn btn-primary">
                                Daftarkan Lokasi &nbsp;
                                <i class="fas fa-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-navy">
                <form action="/masterLokasi" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <label for="id_lokasi" class="col-sm-1 col-form-label" style="text-align: right">ID Lokasi</label>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" name="id_lokasi" id="id_lokasi">
                            </div>
                            <label for="id_user" class="col-sm-1 col-form-label" style="text-align: right">ID Pemilik</label>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" name="id_user" id="id_user">
                            </div>
                            <label for="status_transaksi" class="col-sm-1 col-form-label" style="text-align: right">Transaksi</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="status_transaksi" id="status_transaksi" required>
                                    <option value="ALL">Semua</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Check In">Check In</option>
                                    <option value="Check Out">Check Out</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                            <label for="status_pembayaran" class="col-sm-1 col-form-label" style="text-align: right">Pembayaran</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="status_pembayaran" id="status_pembayaran" required>
                                    <option value="ALL">Semua</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Terbayar">Terbayar</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button type="submit" style="width: 100%;" class="btn btn-primary">
                                    CARI &nbsp;
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(isset($message))
        @if(strpos($message, 'Gagal') == true)
            <div class="alert alert-danger">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
        @else
            <div class="alert alert-success">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert">x</button>
            </div>
        @endif
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title">Master Lokasi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center">
                            <th>ID Lokasi</th>
                            <th>ID Pemilik</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kapasitas Mobil</th>
                            <th>Kapasitas Motor</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lokasi as $l)
                            <tr>
                                <td>{{ $l->id }}</td>
                                <td>{{ $l->id_pemilik }}</td>
                                <td>{{ $l->nama }}</td>
                                <td>{{ $l->alamat }}</td>
                                <td>{{ $l->kapasitasmax_mobil }}</td>
                                <td>{{ $l->kapasitasmax_motor }}</td>
                                <td>
                                    <form action="/detailLokasi" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $l->id }}">
                                        <button type="submit" class="btn btn-block btn-sm btn-outline-primary">DETAIL</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{--                    {{ $listbooking->links() }}--}}
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection
