<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ env('APP_NAME') }} - Certifikát</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <style>
        body {
            font-family: DejaVu Sans;
            color: #555555;
            font-size:14px;
        }
        .corona {
            background-attachment: fixed;
            background-image: url('{{ asset('images/virus.svg') }}');
            background-repeat: no-repeat;
            background-position: 115% 210%;
            background-size: 40%;
        }

        .box {
            padding-left: 10%;
            padding-right: 10%;
            padding-top: 10%;
            max-width: 600px;
        }

        .color-a {
            color: #05223b;
        }

        .color-b {
            color: #555555;
        }

        .color-c {
            color: #ff8878;
        }

        h1 {
            font-size: 23px;
            margin-bottom: 5px;
        }

        h3 {
            font-size: 15px;
            margin-top: 0px;
        }

        .logo {
            width: 80px;
            height: 80px;
            float:left;
        }

        .logo-sidebar {
            float:left;
            margin-left:25px;
        }
        .paragraph {
            margin-top: 25px;
            margin-bottom: 25px;
        }
        .clearfix {
            clear: both;
        }

        .form-control {
            background: #FFFFFF 0 0 no-repeat padding-box;
            border: 2px solid #05223B;
            border-radius: 20px;
            display:inline;
            padding: 5px 10px;
            margin-right: 15px;
        }

        .button {
            display:inline;
            background: #ff8878 0 0 no-repeat padding-box;
            color: #FFFFFF;
            border-radius: 20px;
            border: 2px solid #ff8878;
            padding: 5px 10px;
            font-size: 15px;
        }

         .alert {
             margin-top: 10px;
             font-size: 12px;
             color: red;
         }

         label {
             display: block;
             margin-bottom: 5px;
             padding-left: 10px;
             font-size: 13px;
         }
    </style>
</head>
<body class="corona">
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="box">
        <div class="logo-wrapper">
            <img class="logo" alt="" src="{{ asset('images/testy_mom-logo.png') }}"/>
        </div>
        <div class="logo-sidebar">
            <h1 class="color-a">Testy MoM</h1>
            <h3 class="color-c">Výsledky</h3>
        </div>
        <div class="clearfix"></div>
        @if($isPinRC)
            <p class="paragraph">Pre zobrazenie a stiahnutie PDF certifikátu s výsledkom Vašeho testu zadajte heslo.
                Prístupové heslo pre stiahnutie certifikátu je Vaše rodné číslo.</p>
        @else
            <p class="paragraph">Pre zobrazenie a stiahnutie PDF certifikátu s výsledkom Vašeho testu zadajte heslo.
                Prístupové heslo pre stiahnutie certifikátu je číslo Vašeho dokladu, ktoré ste zadali pri registrácií.</p>
        @endif

        <div class="form">
            @if($isPinRC)
                <label for="pinrc"><strong>Rodné číslo</strong></label>
                <input name="pinrc" type="text" class="form-control" id="pinrc" placeholder="123456/7890" required>
            @else
                <label for="pinid"><strong>Číslo dokladu</strong></label>
                <input name="pinid" type="text" class="form-control" id="pinid" placeholder="(občiansky preukaz alebo pas)" required>
            @endif
            <button class="button" type="submit">Odoslať</button>
        </div>

        @error('pinid')
            <div class="alert">{{ $message }}</div>
        @enderror
        @error('pinrc')
            <div class="alert">{{ $message }}</div>
        @enderror

    </div>
</form>
</body>
</html>
