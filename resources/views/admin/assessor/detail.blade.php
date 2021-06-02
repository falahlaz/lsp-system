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
                        <form action="{{ route('admin.assessor.update',$data['asesor']->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ $data['asesor']->name }}">
                            </div>
                            <div class="form-group">
                                <label>No Registrasi</label>
                                <input type="text" class="form-control" name="reg_num" value="{{ $data['asesor']->reg_num }}">
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="number" class="form-control" name="phone" value="{{ $data['asesor']->phone }}">
                            </div>
                            <div class="form-group">
                                <label>TUK</label>
                                <select class="form-control" name="id_tuk" data-height="100%">
                                    <option value="{{ $data['asesor']->id_tuk }}">{{ $data['asesor']->tuk->name }}</option>
                                    @foreach($data['tuk'] as $tuk)
                                        @if ($tuk->id != $data['asesor']->id_tuk)
                                            <option value="{{ $tuk->id }}">{{ $tuk->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="address" style="height: 100%;" rows="4">{{ $data['asesor']->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="radio" 
                                        name="gender" 
                                        id="exampleRadios1" 
                                        @if($data['asesor']->gender == "Laki-Laki") checked @endif 
                                        value="Laki-Laki">
                                    <label class="form-check-label" for="exampleRadios1">
                                            Pria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input 
                                        class="form-check-input" 
                                        type="radio" 
                                        name="gender" 
                                        id="exampleRadios2" 
                                        @if($data['asesor']->gender == "Perempuan") checked @endif 
                                        value="Perempuan">
                                    <label class="form-check-label" for="exampleRadios2">
                                            Wanita
                                    </label>
                                </div>
                            </div>
                        </div>
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
                    <form action="{{ route("admin.assessor.add.scheme") }}" method="post">
                        @csrf
                        <input type="hidden" name="id_asesor" value="{{ $data['asesor']->id }}">
                        <div class="form-group">
                            <label>Skema</label>
                            <select class="form-control" name="id_scheme" data-height="100%" required>
                                <option value="">-- Pilih Skema --</option>
                                @foreach ($data['scheme'] as $scheme)
                                    <option value="{{ $scheme->id }}">{{ $scheme->name }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </form>
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
                        @foreach ($data['asesor_scheme'] as $asesor_scheme)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $asesor_scheme->scheme->code }}</td>
                                <td>{{ $asesor_scheme->scheme->name }}</td>
                                <td>
                                    <form action="{{ route("admin.assessor.destroy.scheme", ["id" => $asesor_scheme->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button 
                                            type="submit"
                                            class="btn btn-icon btn-danger">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
