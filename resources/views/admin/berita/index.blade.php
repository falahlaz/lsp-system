@extends('admin.app')
@section('title', 'Berita')
@section('activeberita','active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>News</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>News</div>
			</div>
        </div>

		<div class="section-body">
			<div class="row">
                <div class="col-12 col-md-2 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New News</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.news.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" type="text" name="title" value="{{old("title")}}">
                                @error('title')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label>Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="body" class="summernote"></textarea>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                </div>
                            </form>
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