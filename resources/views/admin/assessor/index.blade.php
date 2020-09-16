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
                                    <input type="text" class="form-control" name="reg_num" value="{{ old('reg_num') }}">
                                @error('reg_num')
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
                                    <select class="form-control" name="id_tuk" value="{{ old('id_tuk') }}">
                                        <option value="">-- Pilih TUK --</option>
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
                                    <select name="id_scheme[]" class="form-control select2" multiple="">
                                        <option value="">-- Pilih Skema --</option>
                                        @foreach ($data['scheme'] as $scheme)
                                        <option value="{{ $scheme->id }}">{{ $scheme->name }}</option>
                                        @endforeach
                                    </select>
                                @error('id_scheme')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" style="height: 100%;" rows="4" name="address" value="{{ old('address') }}"></textarea>
                                @error('address')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Laki-Laki" value="{{ old('gender') }}">
                                        <label class="form-check-label" for="exampleRadios1">
                                                Pria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Perempuan" value="{{ old('gender') }}">
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
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
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
                                            <th>Reg Num</th>
                                            <th>Nama</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data['asesor'] as $asesor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $asesor->reg_num }}</td>
                                            <td>{{ $asesor->name }}</td>
                                            <td>{{ $asesor->phone }}</td>
                                            <td>
                                                <a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                                <form action="{{ route('admin.assessor.destroy', ['assessor' => $asesor->id]) }}" method="post" style="display: inline-block">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>
                                                </form>
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

@section('script')
    <script src="{{ asset('/assets/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('/assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    
    <script src="{{ asset('/assets/js/page/modules-datatables.js')}}"></script>
  	<script src="{{ asset('/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
@endsection