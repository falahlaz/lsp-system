@extends('template.index')
@section('sub-judul', 'Scheme')
@section('content')
   <div class="col-12 col-md-5 col-lg-5">
      <div class="card">
         <div class="card-header">
            <h4>Add New Scheme</h4>
         </div>
         <div class="card-body">
            <div class="form-group">
               <label>Kode</label>
               <input type="text" class="form-control">
            </div>
            <div class="form-group">
               <label>Nama</label>
               <input type="text" class="form-control">
            </div>
            <div class="form-group">
               <label>Kategori</label>
               <input type="text" class="form-control">
            </div>
            <div class="form-group">
               <label>Bidang</label>
               <input type="text" class="form-control">
            </div>
            <div class="form-group">
               <label>Status Mea</label>
               <input type="text" class="form-control">
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
            <h4>List of Scheme</h4>
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
                        <th width="20%">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
                        <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                     </tr>
                     <tr>
                        <td>2</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
                        <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                     </tr>
                     <tr>
                        <td>3</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
                        <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                        </td>
                     </tr>
                     <tr>
                        <td>4</td>
                        <td>SKM/0101/00006/3/2019/001-SS-MEKANIK-IAB-001-2016</td>
                        <td>Klaster Perawatan Pencegahan (Preventive Maintenance) Alat Berat Small Bulldozer</td>
                        <td>
                        <a href="skema-detail.html" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
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