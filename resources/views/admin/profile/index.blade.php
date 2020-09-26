@extends('admin.app')
@section('title','Profile')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Profile</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
				<div class="breadcrumb-item"><a href="#"></a>Profile</div>
			</div>
        </div>

		<div class="section-body">
			<div class="row">
                <div class="col-12 col-md-5 col-lg-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profil Anda</h4>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table>
                                    @foreach($data as $profil)

                                    @endforeach
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{ $profil->name }}</td>

                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $profil->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>No. Telp</th>
                                        <td>{{ $profil->phone }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control"  name="email">
                                </div>
                                <div class="form-group">
                                    <label>No Telepon</label>
                                    <input type="number" class="form-control"  name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="img">Foto Profil</label>
                                    <input type="file" name="img_profile" id="img" class="form-control">
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
