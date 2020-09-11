@extends('admin.app')
@section('title','Edit Skema')
@section('activescheme', 'active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Edit  Skema</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.scheme.index') }}">Skema</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Edit Skema</div>
			</div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4>Edit Skema</h4>
                </div>
                <form action="{{ route('admin.scheme.update',$data['scheme']->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="code" class="form-control" value="{{ $data['scheme']->code }}">
                            @error('code')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ $data['scheme']->name }}">
                            @error('name')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" name="category" class="form-control" value="{{ $data['scheme']->category }}">
                            @error('category')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Bidang</label>
                            <input type="text" name="field" class="form-control" value="{{ $data['scheme']->field }}">
                            @error('field')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Status Mea</label>
                            <input type="text" class="form-control" name="mea_status" value="{{ $data['scheme']->mea_status }}">
                        @error('mea_status')
                            <div class="customalert">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('admin.scheme.index') }}" class="btn btn-outline-danger">Back</a>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

