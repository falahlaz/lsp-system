@extends('admin.app')
@section('title', 'Detail Form-APL 01')
@section('activeapl01','active')
@section('content')
    <section class="section">
        <div class="section-header">
			<h1>Detail Form APL 01</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="{{ route('admin.form.apl01') }}">Form APl 01</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Detail Form APl 01</div>
			</div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mt-5" style="color:#6777EF;" class="card-title">Bagian 1 :  Rincian Data Pemohon Sertifikasi </h3>
                            <h6 class="card-text">Pada bagian ini,  cantumkan data pribadi, data pendidikan formal serta data pekerjaan anda pada saat ini.</h6>
                            <br>
                            <h5 style="color:black;" class="card-title">A. Data Pribadi</h5>
                            <div class="form-group">
                                <label for="InputName">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" id="InputName" readonly value="{{ $data['apl01']->name }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="InputKtp">No KTP/NIK/PASSPORT</label>
                                    <input type="text" id="InputKtp" name="nik" class="form-control" readonly value="{{ $data['apl01']->nik }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="KtpPhoto">Foto KTP</label><br>
                                    <a href="{{ asset('images/ktp/'.$data['apl01']->photo_ktp) }}" target="_blank" class="btn btn-primary">
                                        Lihat Foto
                                    </a>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="PassPhoto">Pas Foto</label> <br>
                                    <a href="{{ asset('images/pass_foto/'.$data['apl01']->pass_photo) }}" target="_blank" class="btn btn-primary">
                                        Lihat Foto
                                    </a>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="birth_place">Tempat Lahir</label>
                                    <input type="text" name="birth_place" class="form-control" id="birth_place" readonly value="{{ $data['apl01']->birth_place }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="birth_date">Tanggal Lahir</label>
                                    @php $tanggal_lahir = date('d-m-Y', strtotime($data['apl01']->birth_date)) @endphp
                                    <input type="text" name="birth_date" class="form-control" id="birth_date" readonly value="{{ $data['apl01']->birth_date }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select class="form-control" name="gender" id="gender" readonly disabled>
                                    <option disabled selected>--Pilih Jenis Kelamin--</option>
                                    @foreach($data['apl01'] as $gender)
                                    <option value="{{ $gender }}" {{ $data['apl01']->gender == $gender ? 'selected' : '' }}>Laki-Laki</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nationality">Kebangsaan</label>
                                <input type="text" name="nationality" class="form-control" id="nationality" readonly value="{{ $data['apl01']->nationality }}">
                            </div>
                            <div class="form-group">
                                <label for="home_address">Alamat Rumah</label>
                                <input type="text" name="home_address" class="form-control" id="home_address" readonly value="{{ $data['apl01']->home_address }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label  for="post_code">Kode Pos</label>
                                    <input type="text" name="post_code" class="form-control" id="post_code" readonly value="{{ $data['apl01']->post_code }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Phone/Email :</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="rumah">Rumah</label>
                                    <input type="number" name="house_phone" class="form-control" id="rumah" readonly value="{{ $data['apl01']->house_phone }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="office">Kantor</label>
                                    <input type="number" name="office_phone" class="form-control" id="office" readonly value="{{ $data['apl01']->office_phone }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="handphone">HP</label>
                                    <input type="number" name="phone" class="form-control" id="handphone" readonly value="{{ $data['apl01']->phone }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="private_email">Email</label>
                                    <input type="email" name="private_email" class="form-control" id="private_email"readonly value="{{ $data['apl01']->private_email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="education">Kualifikasi/Pendidikan</label>
                                <input type="text" name="last_educ" class="form-control" id="last_educ" readonly value="{{ $data['apl01']->last_educ }}">
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 style="color:black;" class="card-title">B. Data Pekerjaan Sekarang</h5>
                            <div class="form-group">
                                <label for="company_name">Perusahaan/Lembaga</label>
                                <input type="text" name="company_name" class="form-control" id="company_name" readonly value="{{ $data['apl01']->company_name }}">
                            </div>
                            <div class="form-group">
                                <label for="position">Jabatan</label>
                                <input type="text" name="position" class="form-control" id="position" readonly value="{{ $data['apl01']->position }}">
                            </div>
                            <div class="form-group">
                                <label for="company_address">Alamat Kantor</label>
                                <input type="text" name="company_address" class="form-control" id="company_address" readonly value="{{ $data['apl01']->company_address }}">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_post_code">Kode Pos</label>
                                    <input type="text" name="company_post_code" class="form-control" id="company_post_code" readonly value="{{ $data['apl01']->company_post_code }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">No Telp/Fax/Email :</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="company_phone">Telepon</label>
                                    <input type="number" name="company_phone" class="form-control" id="company_phone" readonly value="{{ $data['apl01']->company_phone }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="company_fax">Fax</label>
                                    <input type="text" class="form-control" name="company_fax" id="company_fax" readonly value="{{ $data['apl01']->company_fax }}">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label for="company_email">Email</label>
                                    <input type="email" name="company_email" class="form-control" id="company_email" readonly value="{{ $data['apl01']->company_email }}">
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="" style="color:#6777EF;" class="card-title">Bagian 2 :  Data Sertifikasi </h3>
                            <h6 class="card-text">Tuliskan Judul dan Nomor Skema Sertifikasi, Tujuan Asesmen serta Daftar Unit Kompetensi sesuai kemasan pada skema sertifikasi yang anda ajukan untuk mendapatkan pengakuan sesuai dengan latar belakang pendidikan, pelatihan serta serta pengalaman kerja yang anda miliki.</h6>
                            <br>
                            <div class="form-group">
                                <label>Skema Sertifikasi</label>    <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="skema_sertifikasi" id="kkni" value="KKNI" readonly @if($data['apl01']->scheme_certification == 'KKNI') checked @else disabled @endif>
                                    <label class="form-check-label" for="kkni">KKNI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="skema_sertifikasi" id="okupasi" value="Okupasi" readonly @if($data['apl01']->scheme_certification == 'Okupasi') checked @else disabled @endif>
                                    <label class="form-check-label" for="okupasi">Okupasi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="skema_sertifikasi" id="klaster" value="Klaster" readonly @if($data['apl01']->scheme_certification == 'Klaster') checked @else disabled @endif>
                                    <label class="form-check-label" for="klaster">Klaster</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tujuan Asesmen</label>    <br>
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tujuan_asesmen" id="sertifikasi" value="Sertifikasi" readonly @if($data['apl01']->assessment_purpose == 'Sertifikasi') checked @else disabled @endif>
                                    <label class="form-check-label" for="sertifikasi">Sertifikasi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tujuan_asesmen" id="sertifikasi_ulang" value="Sertifikasi Ulang" readonly @if($data['apl01']->assessment_purpose == 'Sertifikasi Ulang') checked @else disabled @endif>
                                    <label class="form-check-label" for="sertifikasi_ulang">Sertifikasi Ulang</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="scheme">Skema</label>
                                <input type="text" name="scheme" class="form-control" id="scheme" readonly value="{{ $data['scheme']->name }}">
                            </div>
                            <div class="form-group">
                                <label>Daftar Unit</label>
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Unit</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Tahun</th>
                                        </tr>
                                    </thead>
                                    <tr></tr>
                                    <tbody>
                                        @foreach($data['unit'] as $unit)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $unit->code }}</td>
                                            <td>{{ $unit->name }}</td>
                                            <td>{{ $unit->pub_year }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="mt-5" style="color:#6777EF;" class="card-title">Bagian 3 :  Bukti Kelengkapan Pemohon </h3>
                            <br>
                            <h5 style="color:black;" class="card-title">A. Bukti kelengkapan persyaratan dasar pemohon :</h5>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bukti Persyaratan</th>
                                        <th>Status</th>
                                        <th>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($data['kelengkapan1']))
                                    <tr>
                                        <td>1</td>
                                        <td>Bukti kelengkapan 1</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control align-items-center" id="bukti_kelengkapan_1" required>
                                                    <option value="" hidden>-- Pilih Status --</option>
                                                    <option value="Memenuhi Syarat">Memenuhi Syarat</option>
                                                    <option value="Tidak Memenuhi Syarat">Tidak Memenuhi Syarat</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/kelengkapan1/'.$data['kelengkapan1']->file_name) }}" target="_blank" class="btn btn-primary">
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @if(isset($data['kelengkapan2']))
                                    <tr>
                                        <td>2</td>
                                        <td>Bukti kelengkapan 2</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="bukti_kelengkapan_2" required>
                                                    <option value="" hidden>-- Pilih Status --</option>
                                                    <option value="Memenuhi Syarat">Memenuhi Syarat</option>
                                                    <option value="Tidak Memenuhi Syarat">Tidak Memenuhi Syarat</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/kelengkapan2/'.$data['kelengkapan2']->file_name) }}" target="_blank" class="btn btn-primary">
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @if(isset($data['kelengkapan3']))
                                    <tr>
                                        <td>3</td>
                                        <td>Bukti kelengkapan 3</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="bukti_kelengkapan_3" required>
                                                    <option value="" hidden>-- Pilih Status --</option>
                                                    <option value="Memenuhi Syarat">Memenuhi Syarat</option>
                                                    <option value="Tidak Memenuhi Syarat">Tidak Memenuhi Syarat</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/kelengkapan3/'.$data['kelengkapan3']->file_name) }}" target="_blank" class="btn btn-primary">
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <h5 style="color:black;" class="card-title">B. Bukti kompetensi yang relavan :</h5>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bukti Persyaratan</th>
                                        <th>Status</th>
                                        <th>Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($data['kompetensi1']))
                                    <tr>
                                        <td>1</td>
                                        <td>Bukti Kompetensi 1</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="bukti_kompetensi_1" required>
                                                    <option value="" hidden>-- Pilih Status --</option>
                                                    <option value="Ada">Ada</option>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/kompetensi1/'.$data['kompetensi1']->file_name) }}" target="_blank" class="btn btn-primary">
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @if(isset($data['kompetensi2']))
                                    <tr>
                                        <td>2</td>
                                        <td>Bukti Kompetensi 2</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="bukti_kompetensi_2" required>
                                                    <option value="" hidden>-- Pilih Status --</option>
                                                    <option value="Ada">Ada</option>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/kompetensi2/'.$data['kompetensi2']->file_name) }}" target="_blank" class="btn btn-primary">
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @if(isset($data['kompetensi3']))
                                    <tr>
                                        <td>3</td>
                                        <td>Bukti Kompetensi 3</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="bukti_kompetensi_3" required>
                                                    <option value="" hidden>-- Pilih Status --</option>
                                                    <option value="Ada">Ada</option>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/kompetensi3/'.$data['kompetensi3']->file_name) }}" target="_blank" class="btn btn-primary">
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                    @if(isset($data['kompetensi4']))
                                    <tr>
                                        <td>4</td>
                                        <td>Bukti Kompetensi 4</td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" id="bukti_kompetensi_3" required>
                                                    <option value="" hidden>-- Pilih Status --</option>
                                                    <option value="Ada">Ada</option>
                                                    <option value="Tidak Ada">Tidak Ada</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ asset('images/kompetensi4/'.$data['kompetensi4']->file_name) }}" target="_blank" class="btn btn-primary">
                                                Lihat Bukti
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                        @if($data['apl01']->status == 1)
                            <div class="card-footer text-left">
                                <label for="check" class="form-check-label ">
                                    <input type="checkbox" id="check" name="check" value="on" class="form-check-input">
                                    Saya Sudah Memastikan Semua Data
                                </label>
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" id="submit" class="btn btn-primary" data-toggle="modal" data-target="#registant" disabled >Submit</button>
                            </div>
                        @else
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary">Close</button> -->
                                <button type="button" id="submit" class="btn btn-primary" onclick="getData(this)" data-toggle="modal" data-target="#participant" data-id="">Detail Asesi</button>
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="registant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tentukan Asesor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.form.apl01.store') }}">
                    @csrf
                    <input type="hidden" name="email">
                    <input type="hidden" name="id_form01" value="{{ $data['apl01']->id }}">
                    <div class="form-group">
                        <label for="asesor">Asesor</label>
                        <select class="form-control" id="asesor" name="id_asesor" required>
                            <option value="">-- Pilih Asesor --</option>
                            @foreach($data['asesor'] as $asesor)
                            <option value="{{$asesor->id}}">{{$asesor->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan Bukti Kelengkapan 1</label>
                        <input type="text" class="form-control" name="ket_bukti_kelengkapan_1" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Keterangan Bukti Kelengkapan 2</label>
                        <input type="text" class="form-control" name="ket_bukti_kelengkapan_2" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Keterangan Bukti Kelengkapan 3</label>
                        <input type="text" class="form-control" name="ket_bukti_kelengkapan_3" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label>Keterangan Bukti Kompetensi 1</label>
                        <input type="text" class="form-control" name="ket_bukti_kompetensi_1" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Keterangan Bukti Kompetensi 2</label>
                        <input type="text" class="form-control" name="ket_bukti_kompetensi_2" readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label>Keterangan Bukti Kompetensi 3</label>
                        <input type="text" class="form-control" name="ket_bukti_kompetensi_3" readonly="readonly">
                    </div>

                    <div class="form-group">
                        <label for="textarea-input" class=" form-control-label">Keterangan</label>
                        <textarea name="keterangan" id="textarea-input" style="height: 100%;" rows="4" placeholder="Keterangan..." class="form-control"></textarea>
                    </div>
                    <p style="color: red;" id="note"><i>Bukti-Bukti Kelengkapan Masih Kosong</i></p>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="storeSubmit" disabled>Save</button>
                    </form>
                </div>
                </div>
            </div>
        </div>


    @endsection
    @section('script')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script>
        $('#check').on('click',function(){
            if($(this).is(':checked')) {
                $('#submit').removeAttr('disabled')
            } else {
                $('#submit').attr('disabled', 'disabled')
            }
        });

        $('#submit').on('click', function() {
            $('#note').hide()
            var kelengkapan1 = $('#bukti_kelengkapan_1').val()
            var kelengkapan2 = $('#bukti_kelengkapan_2').val()
            var kelengkapan3 = $('#bukti_kelengkapan_3').val()
            var kompetensi1  = $('#bukti_kompetensi_1').val()
            var kompetensi2  = $('#bukti_kompetensi_2').val()
            var kompetensi3  = $('#bukti_kompetensi_3').val()

            $("input[name='ket_bukti_kelengkapan_1']").val(kelengkapan1)
            $("input[name='ket_bukti_kelengkapan_2']").val(kelengkapan2)
            $("input[name='ket_bukti_kelengkapan_3']").val(kelengkapan3)
            $("input[name='ket_bukti_kompetensi_1']").val(kompetensi1)
            $("input[name='ket_bukti_kompetensi_2']").val(kompetensi2)
            $("input[name='ket_bukti_kompetensi_3']").val(kompetensi3)

            if((kelengkapan1 == 'Memenuhi Syarat' && kelengkapan2 == 'Memenuhi Syarat' && kelengkapan3 == 'Memenuhi Syarat') && (kompetensi1 == 'Ada' && kompetensi2 == 'Ada' && kompetensi3 == 'Ada')) {
                $('#storeSubmit').removeAttr('disabled')
            } else {
                $('#note').show()
                $('#storeSubmit').attr('disabled', 'disabled')
            }
        });
    </script>
    @endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
@endsection
