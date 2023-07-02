@extends('layout.homeStyle')

@section('title', 'FIDRAM - Day')

@section('content')

<style media="print">
  @page {
    size: landscape; 
  }
</style>

<body>
    <div class="mid-block">
        <div class="nav-mid-block">
            <nav class="nav-item-mid-block">
                <a><button style="text-decoration: underline;">Day</button></a>
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
                <button class="btn-share-line" id="openModal"><img src="/img/share_icon.svg" alt=""></button>
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

    <?php
    $urlAtual = 'http://127.0.0.1:8000' . $_SERVER['REQUEST_URI'];
    ?>

    <dialog id="modal">
        <div class="headModal">
            <h2>Day</h2>
            <h2>Sharing</h2>
            <button class="btn-share-line" id="closeModal"><img src="/img/x_icon.svg" alt=""></button>
        </div>
        <div class="img-print">
            <span>Imagem Aqui</span>
        </div>
        <div class="url-print">
            <input type="text" id="urlPagina" value="{{$urlAtual}}" readonly>
            <button id="copyButton">Copy Link</button>
        </div>
        <div class="share-icons">
            <a href=""><img src="/img/whatsApp_icon.png" alt="WhatsApp Icon" style="height: 5em; width: 5em; border-radius: 20px;"></a>
            <a href=""><img src="/img/google_drive_icon.png" alt="Google Drive Icon" style="height: 5em; width: 5em; border-radius: 20px;"></a>
            <a href="" onclick="pressEscAndPrint()"><img src="/img/download_icon.svg" alt="Download Icon" style="height: 5em; width: 5em; border-radius: 20px;"></a>
        </div>
    </dialog>

    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            var input = document.getElementById("urlPagina");
            input.select();
            document.execCommand("copy");

            var copyButton = document.getElementById("copyButton");
            copyButton.textContent = "Copied";

            setTimeout(function() {
                copyButton.textContent = "Copy Link";
            }, 6000); //(6 segundos = 6000ms)
        });
    </script>

    <script>
        function pressEscAndPrint() {

            var dialog = document.getElementById("modal");
            dialog.close();

            var style = document.createElement('style');
            style.setAttribute('media', 'print');
            style.innerHTML = '@page { size: landscape; }'; // Define a orientação da página para horizontal
            document.head.appendChild(style);

            // Executar a função window.print()
            window.print();
        }
    </script>


    <script>
        const modal = document.querySelector("#modal");
        const openButton = document.querySelector("#openModal");
        const closeButton = document.querySelector("#closeModal");

        openButton.addEventListener("click", function() {
            modal.showModal();
        });

        closeButton.addEventListener("click", function() {
            modal.close();
        });
    </script>
</body>

@endsection