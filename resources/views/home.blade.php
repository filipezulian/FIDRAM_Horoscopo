@extends('layout.homeStyle')

@section('title', 'FIDRAM - Day')

@section('content')

<body>
    <div class="mid-block">
        <div class="nav-mid-block">
            <nav class="nav-item-mid-block">
                <a><button>Day</button></a>
            </nav>
            <nav class="nav-item-mid-block">
                <a href="{{ url('semanal') }}"><button>Week</button></a>
            </nav>
            <nav class="nav-item-mid-block">
                <a href="{{ url('mensal') }}"><button>Month</button></a>
            </nav>
            <nav class="nav-item-mid-block">
                <a href="{{ url('anual') }}"><button>Year</button></a>
            </nav>
        </div>
        <div class="info-mid-block">
            <div class="share-line">
                <div class="data-share-line">
                    <p>{{$data}}</p>
                </div>
                <div class="signo-share-line">
                    <p>{{$name_signo}}</p>
                </div>
                <button class="btn-share-line"><img src="/img/share_icon.svg" alt=""></button>
            </div>
            <div class="ta-info-mid-block">
                <textarea class="input-dados-dia" style="resize: none" readonly>{{$paragraphText}}</textarea>
                <div>
                    <img src="/img/home.svg" class="icone-casa" alt="casa">
                    <textarea class="input-dados-domestico" style="resize: none" readonly>{{$paragraphTextCarrer}}</textarea>
                </div>
                <div>
                    <img src="/img/food.svg" class="icone-comida" alt="casa">
                    <textarea class="input-dados-alimentar" style="resize: none" readonly>{{$paragraphTextHealth}}</textarea>
                </div>
            </div>

        </div>

    </div>
</body>

@endsection