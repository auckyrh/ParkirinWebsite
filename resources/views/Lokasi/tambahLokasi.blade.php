@extends('layouts.parent')

@section('title','Daftarkan Lokasi Baru')

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

    <!-- form start -->
    <form action="/addLokasi" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-navy">
                    <div class="card-header">
                        <h3 class="card-title">Daftarkan Lokasi Baru</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nama">Nama Lokasi</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" name="nama" id="nama">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Lokasi</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}"name="alamat" id="alamat">
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="foto_path" class="form-label">Foto Lokasi</label>
                                        <input class="form-control @error('foto_path') is-invalid @enderror" type="file" id="foto_path" name="foto_path">
                                        @error('foto_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-navy">
                    <div class="card-header">
                        <h3 class="card-title">Detail Lokasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longitude">
                                    @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" id="latitude">
                                    @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="map" style="height:500px; width: 100%" class="my-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-navy">
                    <div class="card-header">
                        <h3 class="card-title">Detail Kendaraan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="kapasitasmax_mobil">Kapasitas Maksimum Mobil</label>
                                    <input type="number" min="0" class="form-control @error('kapasitasmax_mobil') is-invalid @enderror" value="{{ old('kapasitasmax_mobil') }}" name="kapasitasmax_mobil" id="kapasitasmax_mobil">
                                    @error('kapasitasmax_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="biaya_mobil">Biaya Mobil / JAM</label>
                                    <input type="number" min="0" class="form-control @error('biaya_mobil') is-invalid @enderror" value="{{ old('biaya_mobil') }}"  name="biaya_mobil" id="biaya_mobil">
                                    @error('biaya_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kapasitasmax_motor">Kapasitas Maksimum Motor</label>
                                    <input type="number" min="0" class="form-control @error('kapasitasmax_motor') is-invalid @enderror" value="{{ old('kapasitasmax_motor') }}"  name="kapasitasmax_motor" id="kapasitasmax_motor">
                                    @error('kapasitasmax_motor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="biaya_motor">Biaya Motor / JAM</label>
                                    <input type="number" min="0" class="form-control @error('biaya_motor') is-invalid @enderror" value="{{ old('biaya_motor') }}"  name="biaya_motor" id="biaya_motor">
                                    @error('biaya_motor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center">
                            <div class="col-sm-6">
                                <button type="submit" style="width: 100%" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat:-7.250445, lng: 112.768845 },
                zoom: 12,
                scrollwheel: true,
            });
            const Surabaya = { lat: -7.250445, lng: 112.768845 };
            let marker = new google.maps.Marker({
                position: Surabaya,
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker,'position_changed',
                function (){
                    let lat = marker.position.lat()
                    let lng = marker.position.lng()
                    $('#latitude').val(lat)
                    $('#longitude').val(lng)
                })
            google.maps.event.addListener(map,'click',
                function (event){
                    pos = event.latLng
                    marker.setPosition(pos)
                })
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
            type="text/javascript"></script>

@endsection
