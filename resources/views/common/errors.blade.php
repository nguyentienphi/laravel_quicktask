
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
@if (count($errors))
    <div class="message"> 
        {{ trans('message.errors') }}
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li id="errors">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

