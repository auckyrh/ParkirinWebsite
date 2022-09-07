@extends('layouts.parent')

@section('title','Detail User')

@section('contentheader')
    <div class="content-header">
    </div>
@endsection

@section('content')


    id : {{ $user->id }}
    nama : {{ $user->nama }}



@endsection
