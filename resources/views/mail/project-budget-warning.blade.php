@component('mail::message')
# Buenas tardes desde Empact

Un proyecto ya a alcanzado el 90% del presupuesto experado.

@component('mail::button', ['url' => ''])
Revise el proyecto
@endcomponent

Gracias por su atención,<br>
{{ config('app.name') }}
@endcomponent
