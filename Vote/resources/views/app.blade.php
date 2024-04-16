<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title' , $title)</title>
</head>
<body style="background: hsla(0, 0%, 12%, 0.698) url(public/images/vott.webp);background-size: cover;background-blend-mode: darken;:no repeat;color:white; width=100vw;height:100vh;display: flex; align-items: center; justify-content: center;flex-direction:column">

    <div class="container">
        <h1>@yield('title' , $title)</h1>
        @yield('content')
    </div>
</body>
</html>