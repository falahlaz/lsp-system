<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Form APL 01</title>

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
                            <form action="{{ route('register.store') }}" method="POST">
                            <div class="card">
                                    @csrf
                                    <div class="card-body">
                                        <h4 style="color:#6777EF;" class="card-title">Bagian 1 :  Rincian Data Pemohon Sertifikasi </h4>
                                        <h6 class="card-text">Pada bagian ini,  cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.</h6>
                                        <br>
                                        <h5 style="color:black;" class="card-title">A. Data Pribadi</h5>
                                        <div class="form-group">
                                            <label for="InputName">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" id="InputName" placeholder="Misal : John Doe">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="InputKtp">No KTP/NIK/PASSPORT</label>
                                            <input type="text" id="InputKtp" class="form-control" placeholder="Misal : 31352629000243">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="KtpPhoto">Foto KTP</label>
                                                <input type="file" name="photo_ktp"  id="KtpPhoto" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="PassPhoto">Pas Foto</label>
                                                <input type="file" name="pass_photo" id="PassPhoto" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="birth_place">Tempat Lahir</label>
                                                <input type="text" name="birth_place" class="form-control" id="birth_place" placeholder="Misal : Jakarta">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="birth_date">Tanggal Lahir</label>
                                                <input type="date" name="birth_date" class="form-control" id="birth_date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option selected>--Pilih Jenis Kelamin--</option>
                                                <option>Laki-Laki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nationality">Kebangsaan</label>
                                            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="Misal : Palembang">
                                        </div>
                                        <div class="form-group">
                                            <label for="home_address">Alamat Rumah</label>
                                            <input type="text" name="home_address" class="form-control" id="home_address" placeholder="Misal : jl. Pemuda Pemudi">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label  for="post_code">Kode Pos</label>
                                                <input type="text" name="post_code" class="form-control" id="post_code" placeholder="Misal : 13400">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone/Email :</label>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="rumah">Rumah</label>
                                                <input type="number" name="house_phone" class="form-control" id="rumah" placeholder="Misal : 0212201394">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="office">Kantor</label>
                                                <input type="number" name="office_phone" class="form-control" id="office" placeholder="Misal : 0212389234" >
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="handphone">HP</label>
                                                <input type="number" name="phone" class="form-control" id="handphone" placeholder="Misal : 0812334934">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="private_email">Email</label>
                                                <input type="email" name="private_email" class="form-control" id="private_email" placeholder="Misal : johndoe@gmail.com" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="education">Kualifikasi/Pendidikan</label>
                                            <input type="text" name="last_educ" class="form-control" id="last_educ" placeholder="Misal : S1">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 style="color:black;" class="card-title">B. Data Pekerjaan Sekarang</h5>
                                        <div class="form-group">
                                            <label for="company_name">Perusahaan/Lembaga</label>
                                            <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Misal : PT. Bangun Pemuda Pemudi">
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Jabatan</label>
                                            <input type="text" name="position" class="form-control" id="position" placeholder="Misal : Manajer">
                                        </div>
                                        <div class="form-group">
                                            <label for="company_address">Alamat Kantor</label>
                                            <input type="text" name="company_address" class="form-control" id="company_address" placeholder="Misal : jl. Pemuda Pemudi">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="company_post_code">Kode Pos</label>
                                                <input type="text" name="company_post_code" class="form-control" id="company_post_code" placeholder="Misal : 12391">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">No Telp/Fax/Email :</label>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="company_phone">Telepon</label>
                                                <input type="number" name="company_phone" class="form-control" id="company_phone" placeholder="Misal : 012392349">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="company_fax">Fax</label>
                                                <input type="text" class="form-control" id="company_fax" placeholder="Misal : 03134325">
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <label for="company_email">Email</label>
                                                <input type="email" name="company_email" class="form-control" id="company_email" placeholder="Misal : bangunpemuda@pemudi.com" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 style="color:#6777EF;" class="card-title">Bagian 2 :  Data Sertifikasi </h4>
                                        <h6 class="card-text">Tuliskan Judul dan Nomor Skema Sertifikasi, Tujuan Asesmen serta Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi yang anda ajukan untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta serta pengalaman kerja yang anda miliki.</h6>
                                        <br>
                                        <div class="form-group">
                                            <label>Skema Sertifikasi</label>    <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kkni" id="kkni" value="option1">
                                                <label class="form-check-label" for="kkni">KKNI</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="okupasi" id="okupasi">
                                                <label class="form-check-label" for="okupasi">Okupasi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="klaster" id="klaster">
                                                <label class="form-check-label" for="klaster">Klaster</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tujuan Asesmen</label>    <br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sertifikasi" >
                                                <label class="form-check-label" for="sertifikasi">Sertifikasi</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="sertifikasi_ulang">
                                                <label class="form-check-label" for="sertifikasi_ulang">Sertifikasi Ulang</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jurusan">Skema</label>
                                            <select class="form-control" name="id_jurusan" id="jurusan" onchange="getScheme(this)">
                                                <option value="">--Pilih Skema--</option>
                                                @foreach($data['skema'] as $skema)
                                                <option value="{{ $skema->id }}">{{ $skema->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group" id="table_skema">

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h4 style="color:#6777EF;" class="card-title">Bagian 3 :  Bukti Kelengkapan Pemohon </h4>
                                        <br>
                                        <h5 style="color:black;" class="card-title">A. Bukti kelengkapan persyaratan dasar pemohon :</h5>
                                        <div class="form-group">
                                            <label for="bukti1">Unggah Bukti Lulusan SMK Jurusan Teknik Otomotif atau</label>
                                            <input type="file" class="form-control-file" id="bukti1"  name="buktiKelengkapan1">
                                        </div>

                                        <div class="form-group">
                                            <label for="bukti2">Unggah Bukti Min Lulusan SMP/SLTP & memiliki Sertifikat Pelatihan Kerja Yang Relevan atau</label>
                                            <input type="file" class="form-control-file" id="bukti2"  name="buktiKelengkapan2">
                                        </div>

                                        <div class="form-group">
                                            <label for="bukti3">Unggah Bukti Pengalaman Kerja yang relevan di Bengkel Otomotif Min 1 Tahun</label>
                                            <input type="file" class="form-control-file" id="bukti3"  name="buktiKelengkapan3">
                                        </div>

                                        <h5 style="color:black;" class="card-title">B. Bukti kompetensi yang relavan :</h5>

                                        <div class="form-group">
                                            <label for="buktiKompetensi1">Bukti Kompetensi 1</label>
                                            <input type="file" class="form-control-file" id="buktiKompetensi1"  name="buktiKompetensi1">
                                        </div>

                                        <div class="form-group">
                                            <label for="buktiKompetensi2">Bukti Kompetensi 2</label>
                                            <input type="file" class="form-control-file" id="buktiKompetensi2"  name="buktiKompetensi2">
                                        </div>

                                        <div class="form-group">
                                            <label for="buktiKompetensi3">Bukti Kompetensi 3</label>
                                            <input type="file" class="form-control-file" id="buktiKompetensi3"  name="buktiKompetensi3">
                                        </div>
                                    </div>
                                    <div class="card-footer text-left">
                                        <button class="btn btn-icon icon-left btn-primary mr-4" type="submit">Submit</button>
                                    </div>
                                </div>
                                <script>
                                    console.log
                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
	</div>

    <!-- General JS Scripts -->

    <script>
        // const spinner = '<div class="spinner-border" role="status"></div>';
        function getScheme(e){
            var id = $(e).val();
            var url = "{{ route('admin.scheme') }}"+ id;

            $('#table_skema').load(url);

        }

    </script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="../../assets/js/stisla.js"></script>
    <script src="{{ asset('../../../assets/js/stisla.js') }}"></script>

	<!-- JS Libraies -->
	{{-- <script src="../../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="../../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../../node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script> --}}

	<!-- Template JS File -->
	<script src="../../assets/js/scripts.js"></script>
	<script src="../../assets/js/custom.js"></script>

	<!-- Page Specific JS File -->
	{{-- <script src="../../assets/js/page/modules-datatables.js"></script> --}}
	</body>
</html>
