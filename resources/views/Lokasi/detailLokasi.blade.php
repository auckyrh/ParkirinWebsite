@extends('layouts.parent')

@section('title','Dashboard')

@section('contentheader')
    <div class="content-header">

    </div>
@endsection

@section('content')

    @if(isset($message))
        <div class="alert alert-success" role="alert">
            <strong> {{ $message }} </strong>
            <button type="button" class="close" data-dismiss="alert">x</button>
        </div>
    @endif


    <!-- form start -->
    <form action="/editLokasi" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-navy">
                    <div class="card-header">
                        <h3 class="card-title">Detail Lokasi [{{$lokasi->id}}]</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-12">

                                <div class="row justify-content-center">
                                    <img src="{{ asset('storage/'.$lokasi->foto_path) }}" class="img-fluid" alt="foto lokasi">
{{--                                    <img src="storage/{{$lokasi->foto_path}}" class="img-fluid" alt="foto lokasi">--}}
                                </div>
                                    <hr class="rounded">
                                <div class="row justify-content-center">
                                    <h5>Nama Lokasi :</h5>
                                </div>
                                <div class="row justify-content-center">
                                    <H4>{{$lokasi->nama}}</H4>
                                </div>
                                <div class="row justify-content-center">
                                    <h5>Alamat Lokasi :</h5>
                                </div>
                                <div class="row justify-content-center">
                                    <H4>{{$lokasi->alamat}}</H4>
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
                                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" value="{{ $lokasi->longitude }}" name="longitude" id="longitude" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" value="{{ $lokasi->latitude }}"name="latitude" id="latitude" readonly>
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
                                    <input type="number" min="0" class="form-control @error('kapasitasmax_mobil') is-invalid @enderror" value="{{ $lokasi->kapasitasmax_mobil }}" name="kapasitasmax_mobil" id="kapasitasmax_mobil" disabled>
                                    @error('kapasitasmax_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="biaya_mobil">Biaya Mobil / JAM</label>
                                    <input type="number" min="0" class="form-control @error('biaya_mobil') is-invalid @enderror" value="{{ $lokasi->biaya_mobil }}"  name="biaya_mobil" id="biaya_mobil" disabled>
                                    @error('biaya_mobil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kapasitasmax_motor">Kapasitas Maksimum Motor</label>
                                    <input type="number" min="0" class="form-control @error('kapasitasmax_motor') is-invalid @enderror" value="{{ $lokasi->kapasitasmax_motor }}"  name="kapasitasmax_motor" id="kapasitasmax_motor" disabled>
                                    @error('kapasitasmax_motor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="biaya_motor">Biaya Motor / JAM</label>
                                    <input type="number" min="0" class="form-control @error('biaya_motor') is-invalid @enderror" value="{{ $lokasi->biaya_motor }}"  name="biaya_motor" id="biaya_motor" disabled>
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
                            <div class="col-sm-4">
                                <div class="btn btn-warning" id="btnedit" style="width: 100%">Edit</div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" style="visibility: hidden; width: 100%" class="btn btn-primary" id="btnsave" onclick="return confirm('Are you sure you want to save the changes?')">Save</button>
                            </div>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="{{ $lokasi->id }}">
                                <button type="submit" class="btn btn-danger" name="btndelete" id="btndelete" value="delete" onclick="return confirm('Are you sure you want to delete?')" style="width: 100%">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 5000);

        var btnedit = document.getElementById("btnedit")

        btnedit.onclick = function() {
            var btnsave = document.getElementById('btnsave');
            if (btnsave.style.visibility !== 'visible') {
                btnsave.style.visibility = 'visible';
                btnedit.innerText = "Cancel";
                btnedit.className = "btn btn-secondary";
                document.getElementById('kapasitasmax_mobil').disabled = false
                document.getElementById('kapasitasmax_motor').disabled = false
                document.getElementById('biaya_mobil').disabled = false
                document.getElementById('biaya_motor').disabled = false

            }
            else {
                btnsave.style.visibility = 'hidden';
                btnedit.innerText = "Edit";
                btnedit.className = "btn btn-warning";
                document.getElementById('kapasitasmax_mobil').disabled = true
                document.getElementById('kapasitasmax_motor').disabled = true
                document.getElementById('biaya_mobil').disabled = true
                document.getElementById('biaya_motor').disabled = true
            }
        };

    </script>

    <script>
        let map;
        function initMap() {
            var long = document.getElementById('longitude').value;
            var lat = document.getElementById('latitude').value;

            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat:parseFloat(lat), lng: parseFloat(long) },
                zoom: 12,
                scrollwheel: true,
            });
            const Surabaya = { lat:parseFloat(lat), lng: parseFloat(long) };
            let marker = new google.maps.Marker({
                position: Surabaya,
                map: map,
                draggable: false
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
            type="text/javascript"></script>
@endsection
