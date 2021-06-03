@extends('admin.app')
@section('title', 'Users')
@section('activeusers', 'active')
@section('content')
    <section class="section">
        <div class="section-header">
			<h1>Users</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Users</div>
			</div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.user.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                @error('username')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select class="form-control" name="id_position" required>
                                    <option value="">-- Pilih Posisi --</option>
                                    @foreach ($data['position'] as $position)
                                        <option value="{{ $position->id }}" @if(old('id_position') == $position->id) selected @endif>{{ $position->name }}</option>
                                    @endforeach
                                </select>
                                @error('id_position')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-header">
                    <h4>List of User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['users'] as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->position->name }}</td>
                                        <td>
                                            @if ($user->id_position != 1)
                                                <form data-form-id="{{ $user->id }}" action="{{ route('admin.user.destroy',$user->id) }}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-btn-id="{{ $user->id }}" onclick="deleteData(this)" type="button" class="btn btn-danger btn-icon"><i class="fas fa-times"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('/assets/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('/assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/assets/modules/sweetalert/dist/sweetalert.min.js')}}"></script>
    
    <script src="{{ asset('/assets/js/page/modules-datatables.js')}}"></script>
    <script src="{{ asset('/assets/js/page/modules-sweetalert.js')}}"></script>
    <script>
        @if(Session::has('success'))
            swal('Success', "{{ Session::get('success') }}", 'success');
        @endif
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection