@extends('admin.app')
@section('title', 'Assessor')
@section('sub-judul', 'Assessor')
@section('content')
	<div class="col-12 col-md-5 col-lg-5">
		<div class="card">
			<div class="card-header">
					<h4>Add New Assessor</h4>
			</div>
			<div class="card-body">
				<form action="">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>No Registrasi</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control">
					</div>
						<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="number" class="form-control">
					</div>
					<div class="form-group">
						<label>TUK</label>
						<select class="form-control">
							<option>Option 1</option>
							<option>Option 2</option>
							<option>Option 3</option>
						</select>
					</div>
					<div class="form-group">
						<label>Skema</label>
						<select class="form-control" multiple="" data-height="100%">
							<option>Option 1</option>
							<option>Option 2</option>
							<option>Option 3</option>
							<option>Option 3</option>
						</select>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label class="d-block">Jenis Kelamin</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1">
							<label class="form-check-label" for="exampleRadios1">
									Pria
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2">
							<label class="form-check-label" for="exampleRadios2">
									Wanita
							</label>
						</div>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control">
					</div>
					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" class="form-control">
					</div>
				</form>
			</div>
			<div class="card-footer text-right">
					<button class="btn btn-primary mr-1" type="submit">Submit</button>
			</div>
		</div>
	</div>
	<div class="col-12 col-md-7 col-lg-7">
		<div class="card">
			<div class="card-header">
				<h4>List of Assessor</h4>
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
							<th>Email</th>
							<th>No Telp</th>
								<th width="135">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Al Falah Lazuardi Mahmudi</td>
							<td>alfalahlazuardi@gmail.com</td>
							<td>088977392521</td>
							<td>
								<a href="#" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
								<a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Al Falah Lazuardi Mahmudi</td>
							<td>alfalahlazuardi@gmail.com</td>
							<td>088977392521</td>
							<td>
								<a href="asesor-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
								<a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Al Falah Lazuardi Mahmudi</td>
							<td>alfalahlazuardi@gmail.com</td>
							<td>088977392521</td>
							<td>
								<a href="asesor-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
								<a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Al Falah Lazuardi Mahmudi</td>
							<td>alfalahlazuardi@gmail.com</td>
							<td>088977392521</td>
							<td>
							<a href="asesor-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
							<a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
