@extends('admin.app')
@section('title','Edit Skema')
@section('activescheme', 'active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Skema Unit</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item active"><a href="{{ route('admin.scheme.index') }}">Skema</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Skema Unit</div>
			</div>
        </div>
        <div class="section-body">
			<div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <h4>Detail Skema</h4>
                        </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode</label>
                                    <input type="text" name="code" class="form-control" >
                                    @error('code')
                                        <div class="customalert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" >
                                    @error('name')
                                        <div class="customalert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="category" class="form-control" >
                                    @error('category')
                                        <div class="customalert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Bidang</label>
                                    <input type="text" name="field" class="form-control" >
                                    @error('field')
                                        <div class="customalert">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Status Mea</label>
                                    <input type="text" class="form-control" name="mea_status" >
                                @error('mea_status')
                                    <div class="customalert">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-icon icon-left btn-primary mr-1" type="submit"><i class="fas fa-save"></i> Save</button>
                                <button class="btn btn-icon icon-left btn-outline-danger mr-1" type="submit"><i class="fas fa-arrow-left"></i> Back</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-5 col-lg-5">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Unit Scheme</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Tahun Terbit</label>
                      <input type="text" class="form-control">
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
                    <h4>List of Unit Scheme</h4>
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
                            <th>Tahun</th>
                            <th width="20%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>C.331220.IAB-PAB.022.01</td>
                            <td>Melakukan Penyelesaian Problem Ekskavator Hidrolik</td>
                            <td>2016</td>
                            <td>
                              <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                              <!-- <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a> -->
                              <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>C.331220.IAB-PAB.022.01</td>
                            <td>Melakukan Penyelesaian Problem Ekskavator Hidrolik</td>
                            <td>2016</td>
                            <td>
                              <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                              <!-- <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a> -->
                              <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>C.331220.IAB-PAB.022.01</td>
                            <td>Melakukan Penyelesaian Problem Ekskavator Hidrolik</td>
                            <td>2016</td>
                            <td>
                              <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                              <!-- <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a> -->
                              <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                            </td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>C.331220.IAB-PAB.022.01</td>
                            <td>Melakukan Penyelesaian Problem Ekskavator Hidrolik</td>
                            <td>2016</td>
                            <td>
                              <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                              <!-- <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a> -->
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

