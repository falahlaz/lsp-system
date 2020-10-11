@extends('admin.app')
@section('title','Edit Elemen')
@section('activeelement', 'active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Edit  Elemen</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.element.index') }}">Elemen</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Edit Elemen</div>
			</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Edit Elemen</h4>
                    </div>
                    <form action="{{ route('admin.element.update', ['element' => $data['element']->id]) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Unit</label>
                                <select class="form-control select2" name="id_unit">
                                    <option value="">-- Pilih Unit --</option>
                                    @foreach ($data['unit'] as $unit)
                                    <option value="{{ $unit->id }}" @if($data['element']->id_unit == $unit->id) selected @endif>{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            @error('id_unit')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $data['element']->name }}">
                                @error('name')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('admin.element.index') }}" class="btn btn-outline-danger">Back</a>
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
                        <h4>Add New Question</h4>
                    </div>

                    <form action="{{ route('admin.question.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_element" value="{{ $data['element']->id }}">
                        <div class="card-body">
                            <div class="form-group form-add-input">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control" name="name[]" value="{{ old('name') }}">
                            @error('name')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="text-right">
                                <style>
                                    button.add-input, .add-input i {
                                        font-size: 10px !important;
                                    }
                                </style>
                                <button class="btn-sm btn btn-info add-input" type="button"><i class="fas fa-plus"></i> New Input</button>
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
                        <h4>List of Question</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                    #
                                    </th>
                                    <th>Pertanyaan</th>
                                    <th>Status</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['question'] as $question)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>Aktif</td>
                                        <td>
                                            <a href="{{ route('admin.question.edit',$question->id) }}" class="btn btn-primary btn-icon"><i class="fas fa-edit"></i></a>
                                            <form data-form-id="{{ $question->id }}" action="{{ route('admin.question.destroy',$question->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button data-btn-id="{{ $question->id }}" onclick="deleteData(this)" class="btn btn-icon btn-danger delete" type="button"><i class="fas fa-times"></i></button>
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
    <script src="{{ asset('/assets/js/page/add-input.js')}}"></script>
    <script>
        @if(Session::has('success'))
            swal('Success', "{{ Session::get('success') }}", 'success');
        @endif
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection