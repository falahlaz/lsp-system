<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Bukti Kelengkapan</title>
</head>
<body>
    @if($data['index'] == 1)
    <img src="{{ asset('/upload/kelengkapan/kelengkapan1/'.$data['kelengkapan']) }}" alt="" width="100%">
@elseif($data['index'] == 2)
    <img src="{{ asset('/upload/kelengkapan/kelengkapan2/'.$data['kelengkapan']) }}" alt="" width="100%">
@else
    <img src="{{ asset('/upload/kelengkapan/kelengkapan3/'.$data['kelengkapan']) }}" alt="" width="100%">
@endif
</body>
</html>
