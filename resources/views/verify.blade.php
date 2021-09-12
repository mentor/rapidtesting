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

        }
        .clearfix {
            clear: both;
        }

        .form-control {
            background: #FFFFFF 0 0 no-repeat padding-box;
            border: 2px solid #05223B;
            border-radius: 20px;
        }

        .button {
            background: #ff8878 0 0 no-repeat padding-box;
            color: #FFFFFF;
            border-radius: 20px;
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
        <p class="paragraph">Pre zobrazenie a stiahnutie PDF certifikátu s výsledkom Vašeho testu zadajte heslo. Prístupové heslo pre stiahnutie certifikátu je Váš rezervačný kód v tvare ABC-DEF-GHI Kód Vašej rezervácie môže obsahovať písmená aj číslice a nerozlišuje medzi malými a veľkými písmenami.</p>

        <div class="form">
            @if($isPinRC)
                <input name="pinrc" type="text" class="form-control" id="pinrc" placeholder="123456/7890" required>
            @else
                <input name="pinid" type="text" class="form-control" id="pinid" placeholder="(občiansky preukaz alebo pas)" required>
            @endif

            <div class="button">
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
