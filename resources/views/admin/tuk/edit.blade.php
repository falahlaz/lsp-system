@extends('admin.app')
@section('title','Edit TUK')
@section('activetuk', 'active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Edit  TUK</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.tuk.index') }}">TUK</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Edit TUK</div>
			</div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4>Edit TUK</h4>
                </div>
                <form action="{{ route('admin.tuk.update',$data['tuk']->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama TUK</label>
                            <input type="text" name="name" class="form-control" value="{{ $data['tuk']->name }}">
                            @error('name')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="code" class="form-control" value="{{ $data['tuk']->code }}">
                            @error('code')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis TUK</label>
                            <select name="type" class="form-control">
                                <option  value="">-- Pilih Jenis TUK --</option>
                                @foreach($data['type'] as $type)
                                    <option value="{{ $type }}" @if($data['tuk']->type == $type) selected @endif>{{ $type }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" class="form-control" style="height: 100%;" rows="4">{{ $data['tuk']->address }}</textarea>
                            @error('address')
                                <div class="customalert">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('admin.tuk.index') }}" class="btn btn-outline-danger">Back</a>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

