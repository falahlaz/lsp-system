@extends('admin.app')
@section('title', 'Ujian tertulis')
@section('activequestion','active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Ujian Tertulis</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Ujian Tertulis</div>
			</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="card">
                        <form action="{{ route('admin.exam.question.store') }}" method="post">
                            @csrf
                            <div class="card-header">
                            <h4>Add New Question</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Skema</label>
                                    <select class="form-control select2" name="id_scheme">
                                        <option value="">-- Pilih Skema --</option>
                                        @foreach ($data['scheme'] as $scheme)
                                        <option value="{{ $scheme->id }}">{{ $scheme->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pertanyaan</label>
                                    <input type="text" class="form-control" name="question">
                                </div>
                                <div class="form-group">
                                    <label>Jawaban A</label>
                                    <input type="text" name="answer[]" class="form-control question-a">
                                </div>
                                <div class="form-group">
                                    <label>Jawaban B</label>
                                    <input type="text" name="answer[]" class="form-control question-b">
                                </div>
                                <div class="form-group">
                                    <label>Jawaban C</label>
                                    <input type="text" name="answer[]" class="form-control question-c">
                                </div>
                                <div class="form-group">
                                    <label>Jawaban D</label>
                                    <input type="text" name="answer[]" class="form-control question-d">
                                </div>
                                <div class="form-group">
                                    <label>Jawaban E</label>
                                    <input type="text" name="answer[]" class="form-control question-e">
                                </div>
                                <div class="form-group">
                                    <label>Jawaban Benar</label>
                                    <select class="form-control correct" name="is_correct">
                                        <option value="">-- Pilih Jawaban Benar --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </div>
                        </form>
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
                                            <th>Skema</th>
                                            <th>Pertanyaan</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['question'] as $question)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $question->scheme_name }}</td>
                                                <td>{{ $question->question }}</td>
                                                <td>
                                                    <a href="{{ route('admin.exam.question.edit',$question->id_e_question) }}" class="btn btn-primary btn-icon"><i class="fas fa-edit"></i></a>
                                                    <form data-form-id="{{ $question->id_e_question }}" action="{{ route('admin.exam.question.destroy',$question->id_e_question) }}" method="post" style="display: inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button data-btn-id="{{ $question->id_e_question }}" onclick="deleteData(this)" class="btn btn-icon btn-danger delete" type="button"><i class="fas fa-times"></i></button>
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
    <script src="{{ asset('/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('/assets/modules/sweetalert/dist/sweetalert.min.js')}}"></script>
    
    <script src="{{ asset('/assets/js/page/modules-datatables.js')}}"></script>
    <script src="{{ asset('/assets/js/page/modules-sweetalert.js')}}"></script>
    <script src="{{ asset('/assets/js/page/correct-answer.js')}}"></script>
    <script>
        @if(Session::has('success'))
            swal('Success', "{{ Session::get('success') }}", 'success');
        @endif
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
@endsection