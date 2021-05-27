@extends('admin.app')
@section('title', 'Detail Form-APL 02')
@section('activeapl02','active')
@section('content')
    <section class="section">
        <div class="section-header">
			<h1>Detail Form APL 02</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ route('admin.form.apl02') }}">Form APl 02</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Detail Form APl 02</div>
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
                    <form action="" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $data['id_form02'] }}">
                        <div class="card">
                            <div class="card-body">
                                @php
                                    $idx = 0;
                                @endphp
                                @foreach($data['unit_scheme'] as $unitScheme)
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="line-height: 100px;">Unit Kompetensi No.</th>
                                                <th>Kode Unit</th>
                                                <th>:</th>
                                                <th>{{ $unitScheme->code }}</th>
                                            </tr>
                                            <tr>
                                                <th>Judul Unit</th>
                                                <th>:</th>
                                                <th>{{ $unitScheme->name }}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    @foreach($unitScheme->element as $element)
                                        <table class="table table-bordered mb-0" style="border-bottom: 0px !important; border-top: 0px !important; margin-top: -1rem;">
                                            <thead>
                                                <tr>
                                                    <th style="border-bottom: 0px !important;">Elemen Kompetensi</th>
                                                    <th style="border-bottom: 0px !important;">:</th>
                                                    <th style="border-bottom: 0px !important;">{{ $element->name }}</th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <table class="table table-bordered text-center">
                                            <thead>
                                                <tr>
                                                    <th style="background: rgb(248,248,248); " rowspan="2" >No. KUK </th>
                                                    <th style="background: rgb(248,248,248); line-height: 100px" rowspan="2" >Daftar Pertanyaan (Asesmen Mandiri/Self Assessment)</th>
                                                    <th style="background: rgb(248,248,248); " colspan="2">Penilaian</th>
                                                    <th style="background: rgb(248,248,248); " colspan="4">Diisi Asesor</th>
                                                </tr>
                                                <tr>
                                                    <th style="background: rgb(248,248,248); ">K</th>
                                                    <th style="background: rgb(248,248,248); ">BK</th>
                                                    <th style="background: rgb(248,248,248); ">V</th>
                                                    <th style="background: rgb(248,248,248); ">A</th>
                                                    <th style="background: rgb(248,248,248); ">T</th>
                                                    <th style="background: rgb(248,248,248); ">M</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($element->question as $question)
                                                    <tr>
                                                        <th>
                                                            {{ $question->id }}
                                                            <input type="hidden" name="question[{{ $idx }}][id_unit_question]" value="{{ $question->id }}">
                                                        </th>
                                                        <td width="80%">
                                                            {{ $question->question }}
                                                        </td>
                                                        <td>
                                                            <input type="radio" disabled {{ $data["answer"][$question->id]->user_answer == "K" ? "checked" : "" }}>
                                                        </td>
                                                        <td>
                                                            <input type="radio" disabled {{ $data["answer"][$question->id]->user_answer == "BK" ? "checked" : "" }}>
                                                        </td>
                                                        @if ($data['user_asesor']->id_users == $data['user']->id && !isset($data["answer"][$question->id]->asesor_answer)) 
                                                            <td>
                                                                <input type="radio" name="question[{{ $idx }}][answer]" required value="V">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="question[{{ $idx }}][answer]" required value="A">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="question[{{ $idx }}][answer]" required value="T">
                                                            </td>
                                                            <td>
                                                                <input type="radio" name="question[{{ $idx }}][answer]" required value="M">
                                                            </td>
                                                        @else
                                                            <td>
                                                                <input type="radio" disabled {{ $data["answer"][$question->id]->asesor_answer == "V" ? "checked" : "" }}>
                                                            </td>
                                                            <td>
                                                                <input type="radio" disabled {{ $data["answer"][$question->id]->asesor_answer == "A" ? "checked" : "" }}>
                                                            </td>
                                                            <td>
                                                                <input type="radio" disabled {{ $data["answer"][$question->id]->asesor_answer == "T" ? "checked" : "" }}>
                                                            </td>
                                                            <td>
                                                                <input type="radio" disabled {{ $data["answer"][$question->id]->asesor_answer == "M" ? "checked" : "" }}>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                    @php
                                                        $idx++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endforeach
                                @endforeach
                            </div>
                            @if ($data['apl02']->status == 2 && $data['user_asesor']->id_users == $data['user']->id)
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="check" class="form-check-label ml-md-4 ml-0">
                                                <input type="checkbox" id="check" name="check" value="on" class="form-check-input">
                                                Saya Sudah Memastikan Semua Data
                                            </label>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="submit" id="submit" class="btn btn-primary" disabled >Submit</button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col text-right">
                                            <a href="{{ route('admin.form.apl02') }}" class="btn btn-danger">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('script')
        <script>
            $('#check').on('click',function(){
                if($(this).is(':checked')) {
                    $('#submit').removeAttr('disabled')
                } else {
                    $('#submit').attr('disabled', 'disabled')
                }
            });
        </script>
    @endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
@endsection
