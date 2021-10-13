Dobrý deň {{ $test->firstname }} {{ $test->lastname }},

Výsledok Vášho vyšetrenia SARS-COV-2 si zobrazíte na adrese:


{{ url(route('verify', $test->code_ref)) }}


@if($test->pinrc)
Ako heslo použite rodné číslo, ktoré ste zadali počas rezervácie termínu testovania.
@else
        Ako heslo použite číslo dokladu, ktorý ste zadali počas rezervácie termínu testovania.
@endif

Na email prosím neodpovedajte.

Ďakujeme Vám za využitie našich služieb a prajeme pekný deň,

Testy MoM
