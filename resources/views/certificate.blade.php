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
            margin: 0;
            padding: 0 0 0 0;
        }

        h3 {
            font-size: 15px;
            margin: 10px 0 0 10px;
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
            width: 65%;
            font-weight: bold;
            vertical-align: top;
        }

        hr {
            border: none;
            border-top: 1px solid #555555;

            line-height: 1px;
            height: 1px;
        }

        ul li::marker {
            font-size: 10px;
        }

    </style>
</head>
<body style="background-color: #fff; margin: 0; padding: 0;">
<div class="container" style="height:106px; ">
    <div style="float: left; width: 86px; height:106px; padding-left: 20px; padding-right: 20px;">
        <img alt="" src="{{ asset('images/testy_mom-logo.png') }}"
             style="vertical-align: middle; height:66px; width:66px"/>
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
        <td>{{ \Carbon\Carbon::parse($payload->dob)->format('d.m.Y') }}</td>
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
        <td>{{ \App\Models\Test::RESULT_DIAGNOSIS_SELECT[$payload->result_diagnosis] }}</td>
    </tr>
    <tr>
        <td class="first">Type testu / Test type / Testart:</td>
        <td>{{ $payload->service->name }}</td>
    </tr>
    <tr>
        <td class="first">Názov testu / Test name / Testname:</td>
        <td>{{ \App\Models\Test::RESULT_TEST_NAME_SELECT[$payload->result_test_name] }}</td>
    </tr>
    <tr>
        <td class="first">Výrobca testu / Test manufacturer / Hersteller:</td>
        <td>{{ \App\Models\Test::RESULT_TEST_MANUFACTURER_SELECT[$payload->result_test_manufacturer] }}</td>
    </tr>
    <tr>
        <td class="first">Odberové miesto / Medical Centre / Medizinisches Zentrum:</td>
        <td>{{ $payload->centre->name }}</td>
    </tr>
    <tr>
        <td class="first">Čas odberu / Date & Time / Datum und Uhrzeit der Testung:</td>
        <td>{{ \Carbon\Carbon::parse($payload->end)->format('d.m.Y H:i:s') }}</td>
    </tr>
</table>

<hr/>

<table class="table" style="width:100%; border:0; padding: 10px 10px 10px 10px;">
    <tr>
        <td class="first">Vydal / Certificate issuer / Durchgeführt von:</td>
        <td><p>Firma XXX, s.r.o.<br/>
                Mobilné odberové stredisko<br/>
                Ulica 01, 123 45 Martin<br/>
                IČO: 12 345 678</p></td>
    </tr>
</table>

<div class="stripe text-center bold">
    <span>Výsledok / Result / Ergebnis:</span><span style="padding-left: 20px">@if($payload->result_status == 'positive')
            Pozitívny / Positive @else Negatívny / Negative @endif</span>
</div>



<table class="table" style="width:100%; border:0; padding: 30px 0 0 0;">
    <tr>
        <td style="width:30%; vertical-align: top; padding-right:20px"><img src="data:image/png;base64, {!! $qrcode !!}"></td>
        <td style="vertical-align: bottom; text-align: right;"><hr/>
            <p style="padding: 0 80px 0 0">Pečiatka a podpis lekára<br/>
                Doctor stamp and signature<br/>
                Stempel un Unterschrift</p></td>
    </tr>
</table>

<div class="page-break"></div>

<div class="container" style="height:106px; ">
    <div style="float: left; width: 86px; height:106px; padding-left: 20px; padding-right: 20px;">
        <img alt="" src="{{ asset('images/testy_mom-logo.png') }}"
             style="vertical-align: middle; height:66px; width:66px"/>
    </div>
    <div style=" height:106px">
        <h1 class="color-a">Testy MoM</h1>
        <h3 class="color-c">Rýchle a spoľahlivé antigénové a PCR testovanie</h3>
    </div>
</div>

<div class="stripe text-center bold">
    Poučenie pre osoby s pozitívnym výsledkom vyšetrenia a osoby žijúce s nimi v spoločnej domácnosti
</div>

<div style="font-size: 12px; margin-top:10px; padding-left:10px; padding-right:10px; line-height: 1.2;">
    <p>Musíte zostať v domácej izolácii a ostatní členovia spoločnej domácnosti v karanténe minimálne 14 dní (aj keď
        boli testovaní ako negatívni).</p>
    <ul>
        <li>Informujte o pozitivite Vášho všeobecného lekára (v prípade detí všeobecného lekára pre deti a dorast),
            alebo lekára miestne príslušného VUC, ak Váš lekár nie je k dispozícii.
        </li>
        <li>Už pri miernych klinických príznakoch bezokladne telefonicky kontaktujte svojho príslušného všeobecného
            lekára, dohodnite sa na ďalšom postupe a dodržujte jeho pokyny, najmä ohľadom liečby.
        </li>
        <li>Ak máte závažné príznaky: opakované vzostupy teploty nad 39 °C, ťažkosti s dýchaním, tlak alebo bolesť na
            hrudníku, volajte záchrannú zdravotnú službu na čísle 155.
        </li>
        <li>Informujte o svojej pozitivite všetky osoby, s ktorými ste boli v úzkom kontakte 2 dni pred odberom výteru z
            nosohltana (alebo pred začiatkom klinických príznakov, ak tieto vznikli ešte pred odberom). Všetky kontakty
            musia ostať v karanténe (aj v prípade negatívneho výsledku v čase práve prebiehajúceho testovania) 10 dní od
            kontaktu s Vami. Za úzky kontakt sa považuje kontakt dlhší ako 15 minút vo vnútornom priestore.
        </li>
        <li>Vaša domáca izolácie trvá minimálne 14 dní od odberu na COVID-19, pokiaš sa v posledných troch dňoch tejto
            doby nevyskytol ani jeden z klinických príznakov ochorenia (teplota, kašeľ, dýchavičnosť, strata čuchu,
            chuti...). O konečnej dĺžke karantény rozhodne Váš všeobecný lekár.
        </li>
        <li>Karanténa osôb žijúcich s Vami v spoločnej domácnosti trvá po celú dobu Vašej izolácie. (Odporúčame im
            prihlásiť sa na testovanie prostredníctvom webovej stránky korona.gov.sk, najskôr 8. deň od kontaktu s Vami.
            Aj v prípade negatívneho výsledku však ostávajú v karanténe počas celej doby Vašej izolácie).
        </li>
        <li>Ak ste COVID-19 pozitívny, Vy ani osoby žijúce s Vami v spoločnej domácnosti a Vaše úzke kontakty nesmiete
            opustiť miesto, kde ste sa rozhodli zdržiavať počas izloácie a karantény okrem: prípadu núdze, pri potrebe
            základnej zdravotnej starostlivosti. Nesmiete: chodiť na verejné miesta, kultúrne spoločenské a športové
            udalosti, ani sa zúčastňovať súkromných akcií (rodinné oslavy, a pod. s výnimkou pohrebov), používať
            hromadnú dopravu alebo taxík, nikoho navštevovať, prijímať návštevy.
        </li>
        <li>Vstup do domu / bytu, kde ste v izolácii, majú len: osoby, ktoré tam bývajú, poskytovateľ zdravotnej
            starostlivosti v prípade potreby.
        </li>
        <li>Ak bývate v rodinnom dome, môžete ísť do svojej súkromnej záhrady alebo na dvor. Ak bývate v byte, môžete
            ísť na súkromný balkón.
        </li>
        <li>V prípade, že potrebujete kúpiť potraviny, iný tovar a lieky, požiadajte inú osobu o pomoc (ktorá nie je v
            karanténe), aby Vám doniesla nákup k Vašim vchodovým dverám.
        </li>
        <li>Nákup si môžete objednať aj telefonicky alebo e-mailom. V prípade núdze môžete opustiť izoláciu
            prizabezpečovaní nevyhnutných zivotných potrieb s prekrytýmí hornými dýchacími cestami respirátorom FFP2 a
            dodržaním hygieny rúk.
        </li>
        <li>Viac informácií na stránke: www.korona.gov.sk, www.uvzsr.sk</li>
    </ul>
</div>

<div class="page-break"></div>

<div class="container" style="height:106px; ">
    <div style="float: left; width: 86px; height:106px; padding-left: 20px; padding-right: 20px;">
        <img alt="" src="{{ asset('images/testy_mom-logo.png') }}"
             style="vertical-align: middle; height:66px; width:66px"/>
    </div>
    <div style=" height:106px">
        <h1 class="color-a">Testy MoM</h1>
        <h3 class="color-c">Rýchle a spoľahlivé antigénové a PCR testovanie</h3>
    </div>
</div>

<div class="stripe text-center bold" style="margin-top:20px">
    Poučenie pre osoby s negatívnym výsledkom vyšetrenia
</div>

<div style="font-size: 12px; margin-top:10px; padding-left:10px; padding-right:10px; line-height: 1.2;">
    <p>Správajte sa zodpovedne, dodržujte všetky odporúčania: </p>
    <ul>
        <li>noste rúško</li>
        <li>dodržujte odstupy</li>
        <li>poyžívajte dezinfekciu na ruky</li>
        <li>často vetrajte priestory, kde sa zdržiavate</li>
        <li>čo najviac obmedzte stretávanie sa s inými ľuďmi - aj v exteriéri</li>
    </ul>

    <ul>
        <li>Váš negatívny test neznamená, že nie ste infikovaný, môžete už byť v inkubačnej dobe ochordenia.</li>
        <li>Sledujte svoj zdravotný stav a aj pri miernych klinických príznakoch (teplota, kašeľ, strata šuchu, chuti, dýchavičnosť...) bezodkladne kontaktujte telefonicky svojho príslušného všeobecného lekára, dohodnite sa sa na ďalšom postupe a dodržujte jeho pokyny.</li>
        <li>Ak ste boli v úzkom kontakte s pozitívne testovanou osobou (2 dni pred jej pozitívnym testovaním, alebo pred začiatkom jej klinických príznakov), musíte ostať v karanténe, aj keď výsledok Vášho vyšetrenia pri aktuálne prebiehajúcom testovaní bol negatívny. </li>
        <li>Informujte o svojom kontakte Vášho všeobecného lekára (v prípade detí všeobecného lekára pre deti a dorast) alebo lekára miestne príslušného VUC, ak Váš lekár nie je k dispozícii, dohodnite sa na ďalšom postupe a dodržujte jeho pokyny.</li>
        <li>Riaďte sa pokynmi - Čo mám robiť, ak som bol v úzkom kontakte s Covid-19. </li>
        <li>Viac informácií na stránke: www.korona.gov.sk, www.uvzsr.sk</li>
    </ul>
</div>
</body>
</html>

