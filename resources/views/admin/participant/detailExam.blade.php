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
                                    @if ($data["exam"]->status == 2)
                                        <button type="button" data-toggle="modal" data-target="#submit" class="btn btn-primary mr-1">Submit</button>
                                    @endif
                                    <a href="{{ route('admin.form.recap') }}" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tentukan Status Kelulusan Asesi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.form.recap.store', ['id' => $data["exam"]->id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="graduation">Status Kelulusan</label>
                        <select class="form-control" id="graduation" name="graduation" required onchange="setGraduation(this)">
                            <option value="">-- Pilih Status Kelulusan --</option>
                            <option value="Lulus">Lulus</option>
                            <option value="Tidak Lulus">Tidak Lulus</option>
                        </select>
                    </div>
                    <div class="form-group form-graduate d-none">
                        <label for="tuk">Tempat Uji Kompetensi</label>
                        <select class="form-control" id="tuk" name="id_tuk">
                            <option value="">-- Pilih TUK --</option>
                            @foreach ($data['tuk'] as $tuk)
                                <option value="{{ $tuk->id }}">{{ $tuk->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-graduate d-none">
                        <label for="tanggal">Tanggal Uji Kompetensi</label>
                        <input type="datetime-local" name="tanggal_ujikom" id="tanggal" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="storeSubmit">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
@endsection

@section('script')
    <script>
        function setGraduation(el) {
            const value = $(el).val();
            (value == "Lulus") 
                ? $('.form-graduate').removeClass('d-none') 
                : $('.form-graduate').addClass('d-none');
        }
    </script>
@endsection
