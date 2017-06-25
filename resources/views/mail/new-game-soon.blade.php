@component('mail::message')
# {{$h1}}
<h3>{{$h3}}</h3>
{{$date}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
