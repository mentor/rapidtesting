<html>
<head>
    <title>{{ env('APP_NAME') }} - Certifikát</title>
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
            padding-top: 5%;
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
            line-height: 120%;
            margin: 0;
            padding: 0 0 0 0;
        }

        h3 {
            font-size: 15px;
            margin: 10px 0 0 10px;
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
        <div class="float-right">
            <h1>Testy MoM</h1>
            <h3>Výsledky</h3>
        </div>
        <p class="paragraph">Pre zobrazenie a stiahnutie PDF certifikátu s výsledkom Vašeho testu zadajte heslo. Prístupové heslo pre stiahnutie certifikátu je Váš rezervačný kód v tvare ABC-DEF-GHI Kód Vašej rezervácie môže obsahovať písmená aj číslice a nerozlišuje medzi malými a veľkými písmenami.</p>

        <div class="form">
            @if($isPinRC)
                <input name="pinrc" type="text" class="form-control" id="pinrc" placeholder="123456/7890" required>
            @else
                <input name="pinid" type="text" class="form-control" id="pinid" placeholder="(občiansky preukaz alebo pas)" required>
            @endif

            <div class="form-group row">
                <button type="submit">Odoslať</button>
            </div>
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
