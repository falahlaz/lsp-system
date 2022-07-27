@extends('admin.app')
@section('title','Edit Skema')
@section('activescheme', 'active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Edit  Skema</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.scheme.index') }}">Skema</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Edit Skema</div>
			</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Edit Skema</h4>
                    </div>
                    <form action="{{ route('admin.scheme.update', ['scheme' => $data['scheme']->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" name="code" class="form-control" value="{{ $data['scheme']->code }}">
                                @error('code')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $data['scheme']->name }}">
                                @error('name')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="text" name="category" class="form-control" value="{{ $data['scheme']->category }}">
                                @error('category')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Bidang</label>
                                <input type="text" name="field" class="form-control" value="{{ $data['scheme']->field }}">
                                @error('field')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status Mea</label>
                                <input type="text" class="form-control" name="mea_status" value="{{ $data['scheme']->mea_status }}">
                            @error('mea_status')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" class="form-control" name="image">
                            @error('image')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <a href="{{ route('admin.scheme.index') }}" class="btn btn-outline-danger">Back</a>
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
                        <h4>Add New Unit</h4>
                    </div>

                    <form action="{{ route('admin.unit.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_scheme" value="{{ $data['scheme']->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" name="code" value="{{ old('code') }}">
                            @error('code')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" class="form-control" name="pub_year" value="{{ old('pub_year') }}">
                            @error('pub_year')
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
                        <h4>List of Unit</h4>
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
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['unit'] as $unit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->code }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.unit.edit',$unit->id) }}" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                        <form data-form-id="{{ $unit->id }}" action="{{ route('admin.unit.destroy',$unit->id) }}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button data-btn-id="{{ $unit->id }}" onclick="deleteData(this)" type="button" class="btn btn-danger btn-icon"><i class="fas fa-times"></i></button>
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