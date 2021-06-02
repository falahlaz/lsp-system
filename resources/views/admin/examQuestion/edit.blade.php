@extends('admin.app')
@section('title', 'Ujian tertulis')
@section('activequestion','active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Edit Ujian Tertulis</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.exam.question.index') }}">Ujian Tertulis</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Edit Ujian Tertulis</div>
			</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4>Edit Ujian tertulis</h4>
                    </div>
                    <form action="{{ route('admin.exam.question.update', ['question' => $data['edit']->id]) }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="id_scheme" value="{{ $data['edit']->id_scheme }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pertanyaan</label>
                                <input type="text" name="question" class="form-control" value="{{ $data['edit']->question }}">
                                @error('question')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <a href="{{ route('admin.exam.question.index') }}" class="btn btn-outline-danger">Back</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-lg-5">
                <div class="card">
                    <form action="{{ route('admin.answer.store') }}" method="post">
                        @csrf
                        <div class="card-header">
                        <h4>Add New Answer</h4>
                        </div>
                        <input type="hidden" name="id_exam_question" value="{{ $data['edit']->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jawaban</label>
                                <input type="text" class="form-control" name="answer">
                                @error('answer')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <form action="{{ route('admin.answer.correct') }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>Ubah Jawaban Benar</h4>
                        </div>
                        <input type="hidden" name="id_exam_question" value="{{ $data['edit']->id }}">
                        <input type="hidden" name="old_correct" value="{{ $data['correct_answer']->id }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Jawaban</label>
                                <select name="is_correct" class="form-control">
                                    <option value="">-- Pilih Jawaban Benar --</option>
                                    @foreach ($data['answer'] as $answer)
                                        <option value="{{ $answer->id }}" @if($answer->is_correct === 1) selected @endif>{{ $answer->answer }}</option>
                                    @endforeach
                                </select>
                                @error('is_correct')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h4>List of Answer</h4>
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
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['answer'] as $answer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $answer->answer }}</td>
                                            <td>
                                                @if($answer->is_correct == 1)
                                                    Benar
                                                @else
                                                    Salah
                                                @endif
                                            </td>
                                            <td>
                                                <form data-form-id="{{ $answer->id }}" action="{{ route('admin.answer.destroy',$answer->id) }}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-btn-id="{{ $answer->id }}" onclick="deleteData(this)" class="btn btn-icon btn-danger delete" type="button"><i class="fas fa-times"></i></button>
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