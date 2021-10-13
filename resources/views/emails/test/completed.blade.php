Dobrý deň {{ $test->firstname }} {{ $test->lastname }},
<br/><br/>
Výsledok Vášho vyšetrenia SARS-COV-2 si zobrazíte na adrese:
<br/><br/>
<br/><br/>
<a href="{{ url(route('verify', $test->code_ref)) }}">{{ url(route('verify', $test->code_ref)) }}</a>
<br/><br/>
<br/><br/>
@if($test->pinrc)
Ako heslo použite <b>rodné číslo</b>, ktoré ste zadali počas rezervácie termínu testovania.
@else
        Ako heslo použite <b>číslo dokladu</b>, ktorý ste zadali počas rezervácie termínu testovania.
@endif
<br/><br/>
Na email prosím neodpovedajte.
<br/><br/>
Ďakujeme Vám za využitie našich služieb a prajeme pekný deň,
<br/><br/>
Testy MoM
