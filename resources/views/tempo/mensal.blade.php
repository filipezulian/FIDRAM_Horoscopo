@extends('layout.homeStyle')

@section('title', 'FIDRAM - Mensal')

@section('content')

<body>
    <div class="mid-block">
        <div class="nav-mid-block">
            <nav class="nav-item-mid-block">
                <button><a href="{{ url('home') }}">Diário</button>                
            </nav>
            <nav class="nav-item-mid-block">
                <button><a href="{{ url('semanal') }}">Semanal</a></button>                
            </nav>
            <nav class="nav-item-mid-block">
                <button><a>Mensal</a></button>                
            </nav>
            <nav class="nav-item-mid-block">
                <button><a>Anual</a></button>                
            </nav>
        </div>
        <div class="info-mid-block">
            <div class="share-line">
                <div class="data-share-line"><p>{{$data}}</p></div> 
                <p>{{signoName}}</p>               
                <button class="btn-share-line"><img src="/img/share_icon.svg" alt=""></button>
            </div>
            <div class="ta-info-mid-block">
                <textarea class="input-dados-not-dia" style="resize: none" readonly>{{$paragraphText}}</textarea>                             
            </div>            
            
        </div>
        
    </div>
</body>

@endsection