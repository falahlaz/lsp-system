@extends('admin.app')
@section('title','Edit TUK')
@section('activetuk', 'active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Edit  TUK</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.tuk.index') }}">TUK</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Edit TUK</div>
			</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Edit TUK</h4>
                    </div>
                    <form action="{{ route('admin.tuk.update',$data['tuk']->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama TUK</label>
                                <input type="text" name="name" class="form-control" value="{{ $data['tuk']->name }}">
                                @error('name')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="{{ $data['tuk']->email }}">
                                @error('email')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" name="code" class="form-control" value="{{ $data['tuk']->code }}">
                                @error('code')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis TUK</label>
                                <select name="type" class="form-control">
                                    <option  value="">-- Pilih Jenis TUK --</option>
                                    @foreach($data['type'] as $type)
                                        <option value="{{ $type }}" @if($data['tuk']->type == $type) selected @endif>{{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="address" class="form-control" style="height: 100%;" rows="4">{{ $data['tuk']->address }}</textarea>
                                @error('address')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <a href="{{ route('admin.tuk.index') }}" class="btn btn-outline-danger">Back</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-lg-5">
                <div class="card">
                    <div class="card-header">
                    <h4>List Skema</h4>
                    </div>
                    <form action="{{ route("admin.tuk.add.scheme", ['id' => $data['tuk']->id]) }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Skema</label>
                                <select class="form-control select2" multiple name="scheme[]" data-placeholder="-- Pilih Skema --">
                                    @foreach ($data['scheme'] as $scheme)
                                        <option value="{{$scheme->id}}">{{$scheme->name}}</option>
                                    @endforeach
                                </select>
                                @error('scheme')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>Skema Terdaftar</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                    #
                                    </th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['tuk_scheme'] as $tuk_scheme)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tuk_scheme->scheme->code }}</td>
                                        <td>{{ $tuk_scheme->scheme->name }}</td>
                                        <td></td>
                                        <td>
                                            <form data-form-id="{{ $tuk_scheme->id }}" action="{{ route("admin.tuk.destroy.scheme", ["id" => $tuk_scheme->id]) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button data-btn-id="{{ $tuk_scheme->id }}" onclick="deleteData(this)" class="btn btn-icon btn-danger delete" type="button"><i class="fas fa-times"></i></button>
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
    </section>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('/assets/modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('/assets/modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/assets/modules/datatables.net-select-bs4/js/select.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/modules/sweetalert/dist/sweetalert.min.js')}}"></script>
    
    <script src="{{ asset('/assets/js/page/modules-datatables.js')}}"></script>
    <script src="{{ asset('/assets/js/page/modules-sweetalert.js')}}"></script>
    <script>
        @if(Session::has('success'))
            swal('Success', "{{ Session::get('success') }}", 'success');
        @endif
    </script>
@endsection