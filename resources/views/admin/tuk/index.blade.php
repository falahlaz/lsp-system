@extends('admin.app')
@section('title', 'TUK')
@section('activetuk','active')
@section('content')
	<section class="section">
		<div class="section-header">
			<h1>TUK</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>TUK</div>
			</div>
        </div>

		<div class="section-body">
			<div class="row">
				<div class="col-12 col-md-5 col-lg-5">
					<div class="card">
						<div class="card-header">
							<h4>Add New TUK</h4>
						</div>
						<div class="card-body">
							<form action="{{route('admin.tuk.store')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label>Kode TUK</label>
                                    <input type="text" class="form-control" name="code" value="{{old('code')}}">
                                @error('code')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenis TUK</label>
                                    <select class="form-control" name="type" value="{{old('type')}}">
                                        <option value="">-- Pilih Jenis TUK --</option>
                                        <option>Sementara</option>
                                        <option>Mandiri</option>
                                        <option>Tempat Kerja</option>
                                    </select>
                                @error('type')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama TUK</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                @error('name')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="address" value="{{old('address')}}" style="height: 100%;" rows="4">{{old('address')}}</textarea>
                                @error('address')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-7 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of TUK</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                            #
                                            </th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jenis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $tuk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tuk->code}}</td>
                                                <td>{{ $tuk->name }}</td>
                                                <td>{{ $tuk->type }}</td>
                                                <td>
                                                    <a href="{{ route('admin.tuk.edit',$tuk->id) }}" class="btn btn-primary btn-icon"><i class="fas fa-edit"></i></a>
                                                    <form data-form-id="{{ $tuk->id }}" action="{{ route('admin.tuk.destroy',$tuk->id) }}" method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button data-btn-id="{{ $tuk->id }}" onclick="deleteData(this)" class="btn btn-icon btn-danger delete" type="button"><i class="fas fa-times"></i></button>
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
