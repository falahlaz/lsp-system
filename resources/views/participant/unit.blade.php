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
