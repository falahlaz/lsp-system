<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <title>Register APL 02</title>
</head>
<body>
    <div class="container pt-5">
        <section class="section">
            <div class="section-header">
                <h1>Form APL 02. ASESMEN MANDIRI</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if (isset($data['isSubmitted']))
                                    <p class="mb-0">
                                        <b>
                                            Form APL 02 berhasil dikirim, tunggu konfirmasi admin melalu WA atau SMS!
                                        </b>
                                    </p>
                                @elseif ($data["apl02"]->status == 2)
                                    <p class="mb-0">
                                        <b>
                                            Form APL 02 telah dikirim, tunggu konfirmasi admin melalu WA atau SMS!
                                        </b>
                                    </p>
                                @else
                                    <p>
                                        <b>
                                            Peserta diminta untuk:
                                            <br>
                                            1.	Mempelajari Kriteria Unjuk Kerja  (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta untuk di Ases.
                                            <br>
                                            2.	Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas pertanyaan tersebut, tuliskan tanda v pada kolom (K), dan bilamana Anda menilai diri belum kompeten tuliskan tanda  pada kolom (BK).
                                            <br>
                                            3.	Mengisi bukti-bukti kompetensi yang relevan atas sejumlah pertanyaan yang dinyatakan Kompeten (bila ada).
                                            <br>
                                            4.	Menandatangani form Asesmen Mandiri.
                                        </b>
                                    </p>
                                    <form action="" method="post">
                                        <input type="hidden" name="id_form02" value="{{ $data['id_form02'] }}">
                                        {{ csrf_field() }}
                                        @php
                                            $idx = 0;
                                        @endphp
                                        @foreach($data['unit_scheme'] as $unitScheme)
                                            <table class="table text-white-all text-center mt-5 table-dark">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="line-height: 100px;">Unit Kompetensi No.</th>
                                                        <th>Kode Unit</th>
                                                        <th>:</th>
                                                        <th>{{ $unitScheme->code }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Judul Unit</th>
                                                        <th>:</th>
                                                        <th>{{ $unitScheme->name }}</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            @foreach($unitScheme->element as $element)
                                                <table class="table table-bordered mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Elemen Kompetensi</th>
                                                            <th>:</th>
                                                            <th>{{ $element->name }}</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                <table class="table table-bordered text-center">
                                                    <thead>
                                                        <tr>
                                                            <th style="background: rgb(251,251,251); " rowspan="2" >No. KUK </th>
                                                            <th style="background: rgb(251,251,251); line-height: 100px" rowspan="2" >Daftar Pertanyaan (Asesmen Mandiri/Self Assessment)</th>
                                                            <th style="background: rgb(251,251,251); " colspan="2">Penilaian</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="background: rgb(251,251,251); ">K</th>
                                                            <th style="background: rgb(251,251,251); ">BK</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($element->question as $question)
                                                            <tr>
                                                                <th>
                                                                    {{ $question->id }}
                                                                    <input type="hidden" name="question[{{ $idx }}][id_unit_question]" value="{{ $question->id }}">
                                                                </th>
                                                                <td width="80%">
                                                                    {{ $question->question }}
                                                                </td>
                                                                <td>
                                                                    <input type="radio" name="question[{{ $idx }}][answer]" required value="K"></td>
                                                                <td>
                                                                    <input type="radio" name="question[{{ $idx }}][answer]" required value="BK">
                                                                    {{ old("question[" . $idx . "][answer]") }}
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $idx++;
                                                            @endphp
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endforeach
                                        @endforeach
                                        <div class="text-right">
                                            <button class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
                                    <br><br>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
</body>
</html>
