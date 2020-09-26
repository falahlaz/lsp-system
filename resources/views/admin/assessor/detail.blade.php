@extends('admin.app')
@section('title', 'Detail Assessor')
@section('sub-judul', 'Detail Assessor')
@section('content')
   <div class="col-12">
      <div class="card">
         <div class="card-header">
            <h4>Detail Asesor</h4>
         </div>
         <div class="card-body">
            <div class="form-group">
               <label>Nama</label>
               <input type="text" class="form-control"/>
            </div>
            <div class="form-group">
               <label>No Registrasi</label>
               <input type="text" class="form-control"/>
            </div>
            <div class="form-group">
               <label>Email</label>
               <input type="email" class="form-control"/>
            </div>
            <div class="form-group">
               <label>No Telepon</label>
               <input type="number" class="form-control"/>
            </div>
            <div class="form-group">
               <label>TUK</label>
               <select class="form-control" data-height="100%">
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
               <input type="text" class="form-control"/>
            </div>
         </div>
         <div class="text-right">
            <button class="btn btn-icon icon-left btn-primary mr-1" type="submit"><i class="fas fa-save"></i> Save</button>
            <Link to="/asesor" class="btn btn-icon icon-left btn-outline-danger mr-1" type="submit"><i class="fas fa-arrow-left"></i> Back</Link>
         </div>
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
         <div class="text-right">
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
@endsection