@extends('layout.homeStyle')

@section('title', 'home-page')

@section('content')

<body>
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
            <div class="share-line">
                <div class="data-share-line"><p>{{$data}}</p></div>                
                <button class="btn-share-line"><img src="/img/share_icon.svg" alt=""></button>
            </div>
            <div class="ta-info-mid-block">
                <textarea class="input-dados-dia" style="resize: none" readonly>{{$paragraphText}}</textarea>
                <div>
                    <img src="/img/home.svg" class="icone-casa" alt="casa">
                    <textarea class="input-dados-domestico" style="resize: none" readonly>Pegar Dados Domestico</textarea>
                </div>                
                <div>
                    <img src="/img/food.svg" class="icone-comida" alt="casa">
                    <textarea class="input-dados-alimentar" style="resize: none" readonly>Pegar Dados Alimentar</textarea>
                </div>                
            </div>            
            
        </div>
        
    </div>
</body>

@endsection