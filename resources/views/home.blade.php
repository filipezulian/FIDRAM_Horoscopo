@extends('layout.homeStyle')

@section('title', 'FIDRAM - Day')

@section('content')

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
                <div class="data-share-line" style="background: red;">
                    <p>{{$data}}</p>
                </div>
                <div class="signo-share-line">
                    <p>{{$name_signo}}</p>
                </div>
                <button class="btn-share-line" id="openModal"><img src="/img/share_icon.svg" alt=""></button>
            </div>
            <div class="ta-info-mid-block">
                <div id="scrollable" class="input-dados-dia" contenteditable="false">{{$paragraphText}}</div>
                <div class="domestico">
                    <img src="/img/home.svg" class="icone-especifico" alt="casa">
                    <div id="scrollable" class="input-dados-especifo" contenteditable="false">{{$paragraphTextCarrer}}</div>
                </div>
                <div class="casa">
                    <img src="/img/food.svg" class="icone-especifico" alt="casa">
                    <div id="scrollable" class="input-dados-especifo" contenteditable="false">{{$paragraphTextHealth}}</div>
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
            <img src="/img/cap_day.png" style="height: 11em; width: 22em; border-radius: 20px;">
        </div>
        <div class="url-print">
            <input type="text" id="urlPagina" value="{{$urlAtual}}" readonly>
            <button id="copyButton">Copy Link</button>
        </div>
        <div class="share-icons">
            <a onclick="pressEscAndPrint()" style="cursor: pointer;"><img src="/img/pdf_icon.png" alt="PDF Icon" style="height: 5em; width: 5em; border-radius: 20px;"></a>
            <a id="downloadButton" style="cursor: pointer;"><img src="/img/download_icon.svg" alt="Download Icon" style="height: 5em; width: 5em; border-radius: 20px;"></a>
        </div>
    </dialog>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        const downloadButton = document.querySelector("#downloadButton");
        downloadButton.addEventListener("click", function() {
            // Selecionar o elemento que deseja capturar
            var elementToCapture = document.querySelector('.mid-block');

            // Adicionar quebra de linha no conteúdo do textarea
            var textAreas = elementToCapture.querySelectorAll('textarea');
            textAreas.forEach(function(textArea) {
                textArea.value = textArea.value.replace(/\n/g, '\r\n'); // Adicionar a quebra de linha no formato '\r\n'
            });

            html2canvas(elementToCapture).then(function(canvas) {
                // Converter a captura para imagem
                var screenshot = canvas.toDataURL("image/png");

                // Criar um link para download da imagem
                var link = document.createElement('a');
                link.href = screenshot;
                link.download = 'captura.png';
                link.click();
            });
        });
    </script>


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
            style.innerHTML = '@page { size: landscape; margin: 0 auto; }'; // Define a orientação da página para horizontal e centraliza o conteúdo
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