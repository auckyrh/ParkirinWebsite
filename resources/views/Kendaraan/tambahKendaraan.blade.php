@extends('layouts.parent')

@section('title','Daftarkan Kendaraan Baru')

@section('contentheader')
    {{--    <div class="content-header">--}}
    {{--        <div class="container-fluid">--}}
    {{--            <div class="row mb-2">--}}
    {{--                <div class="col-sm-6">--}}
    {{--                    <h1 class="m-0 text-dark">Tambah Aset</h1>--}}
    {{--                </div><!-- /.col -->--}}
    {{--            </div><!-- /.row -->--}}
    {{--        </div><!-- /.container-fluid -->--}}
    {{--    </div>--}}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card card-navy">
                <div class="card-header">
                    <h3 class="card-title">Daftarkan Kendaraan Baru</h3>
                </div>

                <!-- form start -->
                <form action="/addKendaraan" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-6">

                                <div class="form-group">
                                    <label for="plat_nomor">Plat Nomor</label>
                                    <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" placeholder="L1945AB" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                    <select class="form-control" name="jenis_kendaraan" id="jenis_kendaraan" required>
                                        <option value="Mobil">Mobil</option>
                                        <option value="Motor">Motor</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="merk_model">Merk dan Model</label>
                                    <input type="text" class="form-control" name="merk_model" id="merk_model" placeholder="Toyota Avanza" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection
