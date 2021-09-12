Dobrý deň {{ $payload->firstname }} {{ $payload->lastname }},

Váš výsledok vyšetrenia SARS-COV-2 zobrazíte na adrese: {{ url(route('verify', $payload->code_ref)) }}

@if($payload->pinrc)
Ako heslo použite číslo rodné číslo, ktorý ste zadali počas rezervácie termínu testovania.
@else
Ako heslo použite číslo dokladu, ktorý ste zadali počas rezervácie termínu testovania.
@endif

Na email neodpovedajte.

Ďakujeme a prajeme pekný deň,

Testy MoM
