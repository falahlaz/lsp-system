@extends('admin.app')
@section('title', 'Elemen')
@section('activeelement','active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Elemen</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Elemen</div>
			</div>
        </div>

		<div class="section-body">
			<div class="row">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Elemen</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label>Nama Elemen</label>
                            <input type="text" class="form-control"/>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>List of Elemen</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                        #
                                        </th>
                                        <th>Nama Elemen</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                                        <td>
                                            <a href="" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                                        <td>
                                            <a href="/elemen/detail" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                                        <td>
                                            <a href="/elemen/detail" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                                        <td>
                                            <a href="/elemen/detail" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                                        <td>
                                            <a href="/elemen/detail" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                                        </td>
                                    </tr>
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
