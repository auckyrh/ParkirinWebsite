@extends('layouts.parent')

@section('title','Master Transaksi')

@section('contentheader')
    {{--    <div class="content-header">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row mb-2">--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <h1 class="m-0 text-dark">Kelola Aset</h1>--}}
    {{--                </div><!-- /.col -->--}}
    {{--            </div><!-- /.row -->--}}
    {{--        </div><!-- /.container-fluid -->--}}
    {{--    </div>--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-navy">
                <form action="/masterTransaksi" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <label for="id_transaksi" class="col-sm-1 col-form-label" style="text-align: right">ID Transaksi</label>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" name="id_transaksi" id="id_transaksi">
                            </div>
                            <label for="id_user" class="col-sm-1 col-form-label" style="text-align: right">ID User</label>
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

    <div class="row">
        <div class="col-md-12">
            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title">Master Transaksi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center">
                            <th>ID Transaksi</th>
                            <th>Plat Nomor</th>
                            <th>ID Lokasi</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Pembayaran</th>
                            <th>Status Transaksi</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transaksi as $t)
                            <tr>
                                <td>{{ $t->id }}</td>
                                <td>{{ $t->plat_nomor }}</td>
                                <td>{{ $t->id_lokasi }}</td>
                                <td>{{ $t->start_time }}</td>
                                <td>{{ $t->end_time }}</td>
                                <td>{{ $t->status_pembayaran }}</td>
                                <td>{{ $t->status_transaksi }}</td>
                                <td>
                                    <form action="/detailTransaksi" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $t->id }}">
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
