@extends('admin.app')
@section('title', 'Skema')
@section('activescheme', 'active')
@section('content')
    <section class="section">
            <div class="section-header">
                <h1>Skema</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#"></a>Skema</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-5 col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add New Scheme</h4>
                            </div>

                            <form action="{{ route('admin.scheme.store') }}" method="POST">
                                @csrf
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
                                        <label>Kategori</label>
                                        <input type="text" class="form-control" name="category" value="{{ old('category') }}">
                                    @error('category')
                                        <div class="customalert">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Bidang</label>
                                        <input type="text" class="form-control" name="field" value="{{ old('field') }}">
                                    @error('field')
                                        <div class="customalert">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status Mea</label>
                                        <input type="text" class="form-control" name="mea_status" value="{{ old('mea_status') }}">
                                    @error('mea_status')
                                        <div class="customalert">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h4>List of Scheme</h4>
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
                                        @foreach($data['scheme'] as $scheme)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $scheme->code }}</td>
                                            <td>{{ $scheme->name }}</td>
                                            <td>
                                            <a href="{{ route('admin.scheme.edit',$scheme->id) }}" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                            <form data-form-id="{{ $scheme->id }}" action="{{ route('admin.scheme.destroy',$scheme->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button data-btn-id="{{ $scheme->id }}" onclick="deleteData(this)" type="button" class="btn btn-danger btn-icon"><i class="fas fa-times"></i></button>
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
