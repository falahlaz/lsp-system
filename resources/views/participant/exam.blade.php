<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <title>Ujian Mandiri</title>
    <style>
        .time-section h3 {
            margin-bottom: 0px;
        }

        .time-section h3 small {
            display: block;
            font-size: .55em;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container pt-4">
        <section class="section">
            <div class="section-header">
                <h1 style="text-transform: capitalize">
                    Ujian Mandiri : <span style="font-weight: normal">{{ strtolower($data["schema"]->name) }}</span>
                </h1>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="section-body time-section text-center">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="mx-auto">
                                    <small>
                                    Waktu pengerjaan
                                    </small>
                                    <span id="timer">00:00:00</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table>
                                            <tr>
                                                <th class="pr-3">
                                                    Nama
                                                </th>
                                                <td class="px-2">
                                                    :
                                                </td>
                                                <td class="pl-2">
                                                    {{ $data['apl01']->name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pr-3">
                                                    No KTP/NIK/PASSPORT
                                                </th>
                                                <td class="px-2">
                                                    :
                                                </td>
                                                <td class="pl-2">
                                                    {{ $data['apl01']->nik }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pr-3">
                                                    Tempat Lahir
                                                </th>
                                                <td class="px-2">
                                                    :
                                                </td>
                                                <td class="pl-2">
                                                    {{ $data['apl01']->birth_place }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pr-3">
                                                    Tanggal Lahir
                                                </th>
                                                <td class="px-2">
                                                    :
                                                </td>
                                                <td class="pl-2">
                                                    {{ $data['apl01']->birth_date }}
                                                </td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <form action="">
                                            <table class="w-100">
                                                @foreach ($data["questionList"] as $idx => $question)
                                                    <tr>
                                                        <td class="pt-2 d-none d-md-block">
                                                            {{ $idx + 1 }}.
                                                        </td>
                                                        <td class="pt-2">
                                                            {{ $question->question }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pb-2 d-none d-md-block"></td>
                                                        <td class="pb-2">
                                                            <input type="hidden" name="answerList[{{ $idx }}][question]" value="{{ $question->id }}">
                                                            @foreach ($question["answerList"] as $answer)
                                                                <div class="form-check d-flex pl-0">
                                                                    <input type="radio" name="answerList[{{ $idx }}][answer]" id="idx{{$idx}}answer{{ $answer->id }}" required value="{{ $answer->id }}">
                                                                    <label class="form-check-label pl-2" for="idx{{$idx}}answer{{ $answer->id }}">
                                                                        {{ $answer->answer }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            <hr>
                                            <div class="text-right">
                                                <button class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
    <script>
        var countDownDate = new Date(`{{ date("Y-m-d H:i:s", strtotime($data['exam']->end_exam)) }}`.replace(/-/g, "/")).getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            hours = ("0" + hours).slice(-2);
            minutes = ("0" + minutes).slice(-2);
            seconds = ("0" + seconds).slice(-2);
            
            document.getElementById("timer").innerHTML = hours + ":" + minutes + ":" + seconds;

            if (distance < 0) {
                clearInterval(x);
                document.getElementById("timer").innerHTML = "00:00:00";
            }
        }, 1000);
    </script>
</body>
</html>
