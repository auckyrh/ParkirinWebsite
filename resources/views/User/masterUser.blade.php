@extends('layouts.parent')

@section('title','Master User')

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
                <form action="/filterUser" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <label for="id_user" class="col-sm-1 col-form-label" style="text-align: right">ID User</label>
                            <div class="col-sm-1">
                                <input type="number" class="form-control" name="id_user" id="id_user">
                            </div>
                            <label for="email" class="col-sm-1 col-form-label" style="text-align: right">Email</label>
                            <div class="col-sm-2">
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <label for="nomor_hp" class="col-sm-1 col-form-label" style="text-align: right">Nomor HP</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="nomor_hp" id="nomor_hp">
                            </div>
                            <label for="role" class="col-sm-1 col-form-label" style="text-align: right">Role</label>
                            <div class="col-sm-1">
                                <select class="form-control" name="role" id="role" required>
                                    <option value="ALL">Semua</option>
                                    <option value="User">User</option>
                                    <option value="Partner">Partner</option>
                                    <option value="Operator">Operator</option>
                                    <option value="Admin">Admin</option>
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
                    <h3 class="card-title">Master User</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr style="text-align: center">
                            <th style="">ID User</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->nama }}</td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->nomor_hp }}</td>
                                <td>{{ $u->role }}</td>
                                <td>{{ $u->status }}</td>
                                <td>
                                    <form action="/detailUser/{{$u->id}}" method="get">
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
