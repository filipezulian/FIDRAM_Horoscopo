@extends('layout.homeStyle')

@section('title', 'home-page')

@section('content')

<body>
    <h1>
        <p> {{$user->id}}</p>
        <p> {{$paragraphText}}</p>
        </h1>
</body>

@endsection