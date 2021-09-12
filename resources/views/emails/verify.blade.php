Dobrý deň {{ $payload->firstname }} {{ $payload->lastname }},


<br/><br/>
Váš výsledok vyšetrenia SARS-COV-2 zobrazíte na adrese: {{ url(route('verify', $payload->code_ref)) }}


<br/><br/>
@if($payload->pinrc)
Ako heslo použite číslo rodné číslo, ktorý ste zadali počas rezervácie termínu testovania.
@else
Ako heslo použite číslo dokladu, ktorý ste zadali počas rezervácie termínu testovania.
@endif


<br/><br/>
Na email neodpovedajte.<br/><br/>


Ďakujeme a prajeme pekný deň,
<br/><br/>


Testy MoM
