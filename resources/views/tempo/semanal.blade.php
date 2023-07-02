@extends('layout.homeStyle')

@section('title', 'FIDRAM - Week')

@section('content')

<body>
    <div class="mid-block">
        <div class="nav-mid-block">
            <nav class="nav-item-mid-block">
                <a href="{{ url('home') }}"><button>Day</button></a>
            </nav>
            <nav class="nav-item-mid-block">
                <a><button style="text-decoration: underline;">Week</button></a>
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
                <textarea class="input-dados-not-dia" style="resize: none" readonly>{{$paragraphText}}</textarea>
            </div>

        </div>

    </div>
</body>

@endsection