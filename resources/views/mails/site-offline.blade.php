@component('mail::message')
<div class="alert alert-danger">
    Alert!
</div>

<p>The Server {{$server}} is {{$status}}</p>

Thanks for<br>
{{ config('app.name') }}
@endcomponent