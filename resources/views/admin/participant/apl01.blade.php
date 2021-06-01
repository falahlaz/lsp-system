@extends('admin.app')
@section('title', 'Form APL 01')
@section('activeapl01','active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Form APL 01</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Form APL 01</div>
			</div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Participant</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Warga Negara</th>
                                            <th>Skema</th>
                                            <th>Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data['apl01'] as $apl01)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $apl01->name }}</td>
                                                <td>{{ $apl01->phone }}</td>
                                                <td>{{ $apl01->private_email }}</td>
                                                <td>{{ $apl01->nationality }}</td>
                                                <td>{{ $apl01->scheme }}</td>
                                                <td>
                                                    @if ($apl01->status == 1)
                                                        <div class="badge badge-warning">Pending</div>
                                                    @elseif ($apl01->status == 2)
                                                        <div class="badge badge-primary">On Progress (APL 02)</div>
                                                    @elseif ($apl01->status == 3)
                                                        <div class="badge badge-primary">On Progress (Ujian Tertulis)</div>
                                                    @elseif ($apl01->status == 4)
                                                        <div class="badge badge-success">Lulus</div>
                                                    @elseif ($apl01->status == 5)
                                                        <div class="badge badge-danger">Tidak Lulus</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.form.apl01.detail',['id' => $apl01->id, 'scheme' => $apl01->id_scheme]) }}" class="btn btn-primary btn-icon"><i class="fas fa-edit"></i></a>
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
            swal('Berhasil', "{{ Session::get('success') }}", 'success');
        @endif
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
@endsection
