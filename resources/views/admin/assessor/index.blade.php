@extends('admin.app')
@section('title', 'Assessor')
@section('activeassessor','active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Assessor</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Assessor</div>
			</div>
        </div>

		<div class="section-body">
			<div class="row">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Assessor</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.assessor.store') }}" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" >
                                @error('name')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>No Registrasi</label>
                                    <input type="text" class="form-control" name="num_reg" value="{{ old('reg_num') }}">
                                @error('num_reg')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" name="email">
                                @error('email')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="{{ old('username') }}" name="username">
                                @error('username')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="number" class="form-control" value="{{ old('phone') }}" name="phone">
                                @error('phone')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>TUK</label>
                                    <select class="form-control" name="id_tuk" value="{{ old('id_tuk') }}" >
                                    @foreach($data['tuk'] as $tuk)
                                        <option value="{{ $tuk->id }}">{{ $tuk->name }}</option>
                                    @endforeach
                                    </select>
                                @error('id_tuk')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Skema</label>
                                    <select class="form-control" multiple="" data-height="100%" name="id_scheme" value="{{ old('id_scheme') }}">
                                        @foreach($data['scheme'] as $scheme)
                                        <option value="{{ $scheme->id }}">{{ $scheme->name }}</option>
                                        @endforeach
                                    </select>
                                @error('id_scheme')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" style="height: 100%;" rows="4" name="address"></textarea>
                                @error('address')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1">
                                        <label class="form-check-label" for="exampleRadios1">
                                                Pria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2">
                                        <label class="form-check-label" for="exampleRadios2">
                                                Wanita
                                        </label>
                                    </div>
                                @error('gender')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Assessor</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                            #
                                            </th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Telp</th>
                                                <th width="135">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $assessor)
                                        <tr>
                                            dd($assessr)
                                            <td>{{ $loop->iteration }}</td>
                                            <td>hello</td>
                                            <td>hello</td>
                                            <td>hello</td>
                                            <td>
                                                <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                                <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
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
        </div>
    </section>
@endsection
