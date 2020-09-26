@extends('admin.app')
@section('title', 'Users')
@section('sub-judul', 'Users')
@section('content')
    <div class="col-12 col-md-5 col-lg-5">
        <div class="card">
            <div class="card-header">
            <h4>Add New User</h4>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Position</label>
                <select class="form-control">
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
                </select>
            </div>
            </div>
            <div class="text-right">
            <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
        </div>
        </div>
        <div class="col-12 col-md-7 col-lg-7">
        <div class="card">
            <div class="card-header">
            <h4>List of User</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>1</td>
                    <td>falahlaz</td>
                    <td>alfalahlazuardi@gmail.com</td>
                    <td>Admin</td>
                    <td>
                        <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td>falahlaz</td>
                    <td>alfalahlazuardi@gmail.com</td>
                    <td>Asesor</td>
                    <td>
                        <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                    </td>
                    </tr>
                    <tr>
                    <td>3</td>
                    <td>falahlaz</td>
                    <td>alfalahlazuardi@gmail.com</td>
                    <td>TUK</td>
                    <td>
                        <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                    </td>
                    </tr>
                    <tr>
                    <td>4</td>
                    <td>falahlaz</td>
                    <td>alfalahlazuardi@gmail.com</td>
                    <td>Asesor</td>
                    <td>
                        <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
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
