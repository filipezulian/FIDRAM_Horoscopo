<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- CSS -->
    <link rel="stylesheet" href="\css\homeStyle.css">

     <!-- CSS Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>

<body>
    <header>
        <div class="nav-bar">
            <div class="nav-item-text">
                <a class="nav-text" href="">Fidram</a>
                <img src="/img/faceSVG.svg" alt="icone rosto">          
            </div>            
            <div class="nav-item-logout">
                <button class="btn-nav-logout"><a href="{{url('')}}"><img src="/img/logout.svg" alt="icone logout"></a></button>
            </div>
        </div>
        
    </header>
    @yield('content')
</body>

</html>