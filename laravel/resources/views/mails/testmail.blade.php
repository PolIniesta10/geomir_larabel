
@component('mail::message')
Hello {{$content['name'}},

{{$content['body']}}

@component('mail::button', ['url' => $content['url']])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent



