Dear {{ $form01->name }},
<br>
<p>
    Dari hasil ujian tertulis yang sudah kamu laksanakan pada {{ $exam_date }}, kami menyatakan bahwa :
</p>
<table border="0" style="text-align: left">
    <tr>
        <th>Nama</th>
        <th>:</th>
        <td>{{ $form01->name }}</td>
    </tr>
    <tr>
        <th>Tempat, Tanggal Lahir</th>
        <th>:</th>
        <td>{{ $form01->birth_place }}, {{ date('d-m-Y', strtotime($form01->birth_date)) }}</td>
    </tr>
    <tr>
        <th>Skema</th>
        <th>:</th>
        <td>{{ $scheme }}</td>
    </tr>
    <tr>
        <th>Tanggal Ujian</th>
        <th>:</th>
        <td>{{ $exam_date }}</td>
    </tr>
    <tr>
        <th>Status Kelulusan</th>
        <th>:</th>
        <td>
            @if($graduation == "Lulus") 
                <strong>Lulus</strong> / <s>Tidak Lulus</s> 
            @else 
                <s>Lulus</s> / <strong>Tidak Lulus</strong> 
            @endif
        </td>
    </tr>
</table>
@if ($graduation == "Lulus")
<p>
    Dan akan melaksanakan ujian praktek pada :
</p>
<table border="0" style="text-align: left">
    <tr>
        <th>Tempat</th>
        <th>:</th>
        <td>{{ $tuk->name }}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <th>:</th>
        <td>{{ $tuk->address }}</td>
    </tr>
    <tr>
        <th>Waktu Ujian</th>
        <th>:</th>
        <td>{{ $practical_time }} WIB</td>
    </tr>
    <tr>
        <th>Tanggal Ujian</th>
        <th>:</th>
        <td>{{ $practical_date }}</td>
    </tr>
</table>
@endif
<p>
    Demikian informasi yang kami berikan.
</p>
Hormat Kami, 
<br>LSP System
<br>
<br>Email ini dikirimkan secara otomatis oleh sistem, mohon untuk tidak mereply.