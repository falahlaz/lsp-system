@extends('admin.app')
@section('title', 'Detail Assessor')
@section('sub-judul', 'Detail Assessor')
@section('activeassessor','active')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Asesor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.assessor.index') }}">Asesor</a></div>
                <div class="breadcrumb-item">Detail</div>
            </div>
        </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Asesor</h4>
                    </div>
                    <div class="card-body">
                        @foreach($data['asesor'] as $asesor)
                        <form action="{{ route('admin.assessor.update',$asesor->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{ $asesor->name }}">
                            </div>
                            <div class="form-group">
                                <label>No Registrasi</label>
                                <input type="text" class="form-control" name="reg_num" value="{{ $asesor->reg_num }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="kjladfljl">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" class="form-control" name="phone" value="{{ $asesor->phone }}">
                            </div>
                            <div class="form-group">
                                <label>TUK</label>
                                <select class="form-control" name="id_tuk" data-height="100%">
                                @foreach($data['tuk'] as $tuk)
                                    <option value="{{ $tuk->id }}">{{ $tuk->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="address">{{ $asesor->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Jenis Kelamin</label>
                                @if($asesor->gender == 'laki-laki')
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Laki-Laki" checked value="{{ old('gender') }}">
                                    <label class="form-check-label" for="exampleRadios1">
                                            Pria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Perempuan" value="{{ old('gender') }}">
                                    <label class="form-check-label" for="exampleRadios2">
                                            Wanita
                                    </label>
                                </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Laki-Laki" value="{{ old('gender') }}">
                                        <label class="form-check-label" for="exampleRadios1">
                                                Pria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Perempuan" checked value="{{ old('gender') }}">
                                        <label class="form-check-label" for="exampleRadios2">
                                                Wanita
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="card-footer text-right">
                            <button class="btn btn-icon icon-left btn-primary mr-1" type="submit"><i class="fas fa-save"></i> Save</button>
                            <a href="{{ route('admin.assessor.index') }}" class="btn btn-icon icon-left btn-outline-danger mr-1" type="submit"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-lg-5">
            <div class="card">
                <div class="card-header">
                <h4>Add Assessor Scheme</h4>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <label>Skema</label>
                    <select class="form-control" data-height="100%">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <option>Option 3</option>
                    </select>
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
                <h4>List of Assessor Scheme</h4>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>Kode Skema</th>
                        <th>Nama Skema</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>1</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                        </tr>
                        <tr>
                        <td>2</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                        </tr>
                        <tr>
                        <td>3</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                        </tr>
                        <tr>
                        <td>4</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
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
