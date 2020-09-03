<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="">
    <link rel="shortcut icon" href="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register APL 02</title>
  </head>
  <body>



    <div class="container mt-3">
        <h2>FR-APL-02. ASESMEN MANDIRI</h2>
        <br>
        <p> <b>
            Peserta diminta untuk:
            <br>
            1.	Mempelajari Kriteria Unjuk Kerja  (KUK), Batasan Variabel, Panduan Penilaian, dan Aspek Kritis seluruh Unit Kompetensi yang diminta untuk di Ases.
            <br>
            2.	Melaksanakan Penilaian Mandiri secara obyektif atas sejumlah pertanyaan yang diajukan, bilamana Anda menilai diri sudah kompeten atas pertanyaan tersebut, tuliskan tanda  pada kolom (K), dan bilamana Anda menilai diri belum kompeten tuliskan tanda  pada kolom (BK).
            <br>
            3.	Mengisi bukti-bukti kompetensi yang relevan atas sejumlah pertanyaan yang dinyatakan Kompeten (bila ada).
            <br>
            4.	Menandatangani form Asesmen Mandiri.
            </b>
        </p>
        <form action="" method="POST">
        <input type="hidden" name="id_participant" value="">
        <table class="table table-bordered text-center mt-5 table-primary">
            <thead>
                <tr>
                    <th rowspan="2" style="line-height: 100px;">Uji Kompetensi No. 123</th>
                    <th>Kode Unit</th>
                    <th>:</th>
                    <th>09238</th>
                </tr>
                <tr>
                    <th>Judul Unit</th>
                    <th>:</th>
                    <th>Lorem ipsum dolor sit amet consectetur.</th>
                </tr>
            </thead>
        </table>
        <table class="table table-bordered text-left mt-2 table-dark">
            <thead>
                <tr>
                    <th>Elemen Kompetensi</th>
                    <th style="text-align: center;">:</th>
                    <th></th>
                </tr>
            </thead>
        </table>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th rowspan="2" style="line-height: 100px;">No. KUK</th>
                    <th rowspan="2" style="line-height: 100px;">Daftar Pertanyaan (Asesmen Mandiri/Self  Assessment)</th>
                    <th colspan="2">Penilaian</th>
                </tr>
                <tr>
                    <th>K</th>
                    <th>BK</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td width="80%">Lorem ipsum dolor sit amet.</td>
                    <td><input type="radio" required name="penilaian" value="K"></td>
                    <td><input type="radio" required name="penilaian" value="BK"></td>
                </tr>
                <tr>
                    <th>1</th>
                    <td width="80%">Lorem ipsum dolor sit amet.</td>
                    <td><input type="radio" required name="penilaian" value="K"></td>
                    <td><input type="radio" required name="penilaian" value="BK"></td>
                </tr>
                <tr>
                    <th>1</th>
                    <td width="80%">Lorem ipsum dolor sit amet.</td>
                    <td><input type="radio" required name="penilaian" value="K"></td>
                    <td><input type="radio" required name="penilaian" value="BK"></td>
                </tr>
                <tr>
                    <th>1</th>
                    <td width="80%">Lorem ipsum dolor sit amet.</td>
                    <td><input type="radio" required name="penilaian" value="K"></td>
                    <td><input type="radio" required name="penilaian" value="BK"></td>
                </tr>
            </tbody>
        </table>
        <div class="text-right">
            <button class="btn btn-primary">Submit</button>
        </div>
        </form>
        <br><br>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpatd.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
