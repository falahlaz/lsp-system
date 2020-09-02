<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Ecommerce Dashboard &mdash; Stisla</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/components.css') }}">
</head>

	<body>
	<!-- Main Content -->
		<div class="container pt-5">
			<section class="section">
				<div class="section-header">
					<h1>Form APL 01</h1>
				</div>

		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>A. Data Pribadi</h4>
						</div>
						<form action="">
						<div class="card-body">
							<div class="form-group">
								<label for="InputName">Nama Lengkap</label>
								<input type="text" class="form-control" id="InputName" placeholder="Nama Lengkap">
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="InputKtp">No KTP/NIK/PASSPORT</label>
                           <input type="text" id="InputKtp" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="KtpPhoto">Foto KTP</label>
                           <input type="file"  id="KtpPhoto" class="form-control">
                        </div>
                     </div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Tempat Lahir</label>
									<input type="text" class="form-control">
								</div>
								<div class="form-group col-md-6">
									<label>Tanggal Lahir</label>
									<input type="date" class="form-control">
								</div>
							</div>
							<div class="form-group">		
								<label>Jenis Kelamin</label>
								<select class="form-control" id="exampleFormControlSelect1">
									<option selected>--Pilih Jenis Kelamin--</option>
									<option>Laki-Laki</option>
									<option>Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label>Kebangsaan</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Alamat Rumah</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Kode Pos</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="">Phone/Email :</label>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="rumah">Rumah</label>
									<input type="email" class="form-control" id="rumah">
								</div>
								<div class="form-group col-md-6">
									<label for="office">Kantor</label>
									<input type="password" class="form-control" id="office" >
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="handphone">HP</label>
									<input type="password" class="form-control" id="handphone" >
								</div>
								<div class="form-group col-md-6">
									<label for="email">Email</label>
									<input type="password" class="form-control" id="email" >
								</div>
							</div>
							<div class="form-group">
								<label>Kualifikasi/Pendidikan</label>
								<input type="text" class="form-control">
							</div>
						</div>
						</form>
						<div class="card-header">
							<h4>Data Pribadi</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Perusahaan/Lembaga</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Jabatan</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-group">
								<label>Alamat Kantor</label>
								<input type="text" class="form-control">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Kode Pos</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label for="">No Telp/Fax/Email :</label>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="telepon">Telepon</label>
									<input type="email" class="form-control" id="telepon">
								</div>
								<div class="form-group col-md-6">
									<label for="fax">Fax</label>
									<input type="password" class="form-control" id="fax" >
								</div>
							</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="password" class="form-control" id="email" >
							</div>
						</div>

							<div class="card-footer text-left">
							<button class="btn btn-icon icon-left btn-primary mr-4" type="submit">Submit</button>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<script src="../../assets/js/stisla.js"></script>

	<!-- JS Libraies -->
	<script src="../../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="../../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../../node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
	
	<!-- Template JS File -->
	<script src="../../assets/js/scripts.js"></script>
	<script src="../../assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
	<script src="../../assets/js/page/modules-datatables.js"></script>
	</body>
</html>
