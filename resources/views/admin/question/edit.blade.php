@extends('admin.app')
@section('title','Edit Pertanyaan')
@section('activeelement', 'active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Edit Pertanyaan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.element.index') }}">Elemen</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Edit Pertanyaan</div>
			</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Question</h4>
                    </div>

                    <form action="{{ route('admin.question.update', ['question' => $data['edit']->id]) }}" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" name="id_element" value="{{ $data['edit']->id_element }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <input type="text" class="form-control" name="question" value="{{ $data['edit']->question }}">
                            @error('question')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="text-right">
                                <a href="{{ route('admin.element.edit', ['element' => $data['edit']->id_element]) }}" class="btn btn-outline-danger">Back</a>
                                <button class="btn btn-primary" type="submit">Update</button>
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