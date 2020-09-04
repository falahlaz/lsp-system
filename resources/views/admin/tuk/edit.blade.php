@extends('admin.app')
@section('title','Edit TUK')
@section('sub-judul', 'Edit TUK')
@section('content')
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
            <h4>Edit TUK</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama TUK</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kode</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis TUK</label>
                    <select class="form-control">
                        <option>Sewaktu</option>
                        <option>Tempat Kerja</option>
                        <option>Mandiri</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="card-footer text-right">
            <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
        </div>
    </div>
@endsection

