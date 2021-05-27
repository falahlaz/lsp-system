@extends('admin.app')
@section('title', 'Detail Ujian Tertulis')
@section('activeujian','active')
@section('content')
    <section class="section">
        <div class="section-header">
			<h1>Detail Ujian Tertulis</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ route('admin.form.recap') }}">Ujian Tertulis</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Detail Ujian Tertulis</div>
			</div>
        </div>
        <style>
            table.table-bordered thead th {
                border: 1px solid #eee !important;
            }
        </style>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="w-100">
                                @foreach ($data["questionList"] as $idx => $question)
                                <tr>
                                    <td class="pt-2 d-none d-md-block">
                                        {{ $idx + 1 }}.
                                    </td>
                                    <td class="pt-2" width="99%">
                                        {{ $question->question }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pb-2 d-none d-md-block"></td>
                                    <td class="pb-2">
                                        <input type="hidden" name="answerList[{{ $idx }}][question]"
                                            value="{{ $question->id }}">
                                        @foreach ($question["answerList"] as $answer)
                                        <div class="form-check d-flex pl-0">
                                            <input type="radio" name="answerList[{{ $idx }}][answer]"
                                                id="idx{{$idx}}answer{{ $answer->id }}"
                                                value="{{ $answer->id }}"
                                                @if ($answer->is_checked == 1) checked @endif
                                                disabled>
                                            <label class="form-check-label pl-2"
                                                for="idx{{$idx}}answer{{ $answer->id }}">
                                                {{ $answer->answer }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col text-right">
                                    <a href="{{ route('admin.form.recap') }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
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
