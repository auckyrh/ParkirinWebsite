@extends('layouts.parent')

@section('title','Master Kendaraan')

@section('contentheader')
        <div class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <form action="/tambahKendaraan" method="get">
                                @csrf
                                <button type="submit" style="width: 100%;" class="btn btn-primary">
                                    Daftarkan Kendaraan &nbsp;
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
                <form action="/kelolaAssetPage" method="get">
                    @csrf
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <label for="plat_nomor" class="col-sm-1 col-form-label" style="text-align: right">Plat Nomor</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="plat_nomor" id="plat_nomor">
                            </div>
                            <label for="id_user" class="col-sm-1 col-form-label" style="text-align: right">ID pemilik</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="id_user" id="id_user">
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
                    <h3 class="card-title">Master Kendaraan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center">
                            <th>Plat Nomor</th>
                            <th>ID Pemilik</th>
                            <th>Jenis Kendaraan</th>
                            <th>Merk dan Model</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kendaraan as $k)
                            <tr>
                                <td>{{ $k->plat_nomor }}</td>
                                <td>{{ $k->id_user }}</td>
                                <td>{{ $k->jenis_kendaraan }}</td>
                                <td>{{ $k->merk_model }}</td>
                                <td>
                                    <form action="/detailKendaraan" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $k->plat_nomor }}">
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
