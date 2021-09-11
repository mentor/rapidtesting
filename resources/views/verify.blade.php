<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>

    <style>
        body {
            font-family: DejaVu Sans;
            color: #555555;
        }
        .page-break {
            page-break-after: always;
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

        .stripe {
            background-color: #ceecfc;
            padding: 15px 10px;
            font-size: 14px;
        }

        h1 {
            font-size: 23px;
            line-height: 120%;
            margin:0;
            padding:0 0 0 0;
        }

        h3 {
            font-size: 15px;
            margin:10px 0 0 10px;
        }

        .text-center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }
        .table td {
            font-size: 12px;
        }
        .table td.first {
            width:65%;
            font-weight: bold;
        }


    </style>
</head>
<body style="background-color: #fff; margin: 0; padding: 0;">
    <div class="container" style="height:106px; ">
        <div style="float: left; width: 86px; height:106px; padding-left: 20px; padding-right: 20px;">
            <img alt="" src="{{ asset('images/testy_mom-logo.png') }}" style="vertical-align: middle; height:66px; width:66px" />
        </div>
        <div style=" height:106px">
            <h1 class="color-a">Testy MoM</h1>
            <h3 class="color-c">Rýchle a spoľahlivé antigénové a PCR testovanie</h3>
        </div>
    </div>

    <div class="stripe text-center bold">
        Potvrdenie o vykonaní testu / Test Result Certificate / Testergebnis Bescheinigung
    </div>

    <table class="table" style="width:100%; border:0; padding: 10px 10px 10px 10px;">
        <tr>
            <td class="first">Meno / Name / Vor-und- Nachname:</td>
            <td>{{ $payload->firstname }} {{ $payload->lastname}}</td>
        </tr>
        <tr>
            <td class="first">Rodné číslo / Birth ID / Sozialversiecherungsnummer:</td>
            <td>@if($payload->pinrc) {{ $payload->pinrc }} @else &nbsp; @endif</td>
        </tr>
        <tr>
            <td class="first">Dátum narodenia / Date of birth / Geburtsdatum:</td>
            <td>{{ $payload->dob }}</td>
        </tr>
        <tr>
            <td class="first">Číslo dokladu / Person identifier / ID-Passnummer:</td>
            <td>{{ $payload->pinid }}</td>
        </tr>
    </table>

    <hr/>

    <table class="table" style="width:100%; border:0; padding: 10px 10px 10px 10px;">
        <tr>
            <td class="first">Diagnóza / Diagnosis / Diagnose:</td>
            <td>{{ $payload->firstname }} {{ $payload->lastname}}</td>
        </tr>
        <tr>
            <td class="first">Type testu / Test type / Testart:</td>
            <td>@if($payload->pinrc) {{ $payload->pinrc }} @else &nbsp; @endif</td>
        </tr>
        <tr>
            <td class="first">Názov testu / Test name / Testname:</td>
            <td>{{ $payload->dob }}</td>
        </tr>
        <tr>
            <td class="first">Výrobca testu / Test manufacturer / Hersteller:</td>
            <td>{{ $payload->pinid }}</td>
        </tr>
    </table>

    <div class="page-break"></div>

    <div class="container" style="height:106px; ">
        <div style="float: left; width: 86px; height:106px; padding-left: 20px; padding-right: 20px;">
            <img alt="" src="{{ asset('images/testy_mom-logo.png') }}" style="vertical-align: middle; height:66px; width:66px" />
        </div>
        <div style=" height:106px">
            <h1 class="color-a">Testy MoM</h1>
            <h3 class="color-c">Rýchle a spoľahlivé antigénové a PCR testovanie</h3>
        </div>

        <div class="stripe text-center bold">
            Potvrdenie o vykonaní testu / Test Result Certificate / Testergebnis Bescheinigung
        </div>
    </div>
</body>
</html>
