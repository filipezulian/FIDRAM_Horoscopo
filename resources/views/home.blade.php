@extends('layout.homeStyle')

@section('title', 'home-page')

@section('content')

<body>
    <!--
    <div class="mid-block">
        <h1>
            <p> {{$user->id}}</p>
            <p> {{$paragraphText}}</p>
        </h1>
    </div>
-->
    <div class="mid-block">
        <div class="nav-mid-block">
            <nav class="nav-item-mid-block">
                <button>Diário</button>                
            </nav>
            <nav class="nav-item-mid-block">
                <button>Semanal</button>                
            </nav>
            <nav class="nav-item-mid-block">
                <button>Mensal</button>                
            </nav>
            <nav class="nav-item-mid-block">
                <button>Anual</button>                
            </nav>
        </div>
        <div class="info-mid-block">
            <p>blocao</p>
            <div class="share-line">
                <p>linha</p>
            </div>
        </div>
        
    </div>
</body>

@endsection