@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                @if(\Auth::user()->hasVerifiedEmail())
                    <div class="alert alert-info" role="alert">
                        <strong>Selamat di datang di Sistem Administrasi Parkirin.</strong>s
                        <meta http-equiv = "refresh" content = "1; url = /" />
                    </div>
                @else
                    <div class="alert alert-warning" role="alert">
                        <strong>Email belum terverifikasi.</strong> Mohon verifikasi email anda terlebih dahulu.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
