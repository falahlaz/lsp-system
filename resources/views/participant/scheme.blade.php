<label>Daftar Skema</label>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Unit</th>
            <th scope="col">Nama</th>
        </tr>
    </thead>
    <tr></tr>
    <tbody>
        @foreach($data as $skema)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $skema->code }}</td>
            <td>{{ $skema->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>    
