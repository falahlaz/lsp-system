@extends('admin.app')
@section('title','TUK')
@section('sub-judul', 'TUK')
@section('content')
   <div class="col-12 col-md-5 col-lg-5">
      <div class="card">
      <div class="card-header">
         <h4>Add New TUK</h4>
      </div>
      <div class="card-body">
         <div class="form-group">
            <label>Kode TUK</label>
            <input type="text" class="form-control">
         </div>
         <div class="form-group">
            <label>Jenis TUK</label>
            <input type="text" class="form-control">
         </div>
         <div class="form-group">
            <label>Nama TUK</label>
            <input type="text" class="form-control">
         </div>
         <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control"></textarea>
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
            <h4>List of TUK</h4>
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
                        <th>Jenis</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>070-TUKS-LSPABI</td>
                        <td>Sewaktu</td>
                        <td>PT Pamapersada Nusantara Cileungsi</td>
                        <td>
                        <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td>070-TUKS-LSPABI</td>
                        <td>Sewaktu</td>
                        <td>PT Pamapersada Nusantara Cileungsi</td>
                        <td>
                        <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td>070-TUKS-LSPABI</td>
                        <td>Sewaktu</td>
                        <td>PT Pamapersada Nusantara Cileungsi</td>
                        <td>
                        <a href="#" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                     </tr>
                     <tr>
                        <td>4</td>
                        <td>070-TUKS-LSPABI</td>
                        <td>Sewaktu</td>
                        <td>PT Pamapersada Nusantara Cileungsi</td>
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