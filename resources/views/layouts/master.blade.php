<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <script src="https://kit.fontawesome.com/1e7fe5f742.js" crossorigin="anonymous"></script>
    <title>Cửa Hàng</title>
    <link rel = "icon" href =
        "https://product.hstatic.net/200000321981/product/777_e253d1d3898d4adfa460d0b4cd04f956_master.jpg"
          type = "image/x-icon">
</head>
<body class="container-fluid flex-column d-flex vh-100">
<header>
    @include("layouts.header")
</header>
<br>
<main class="container btn-dark">
    <div class="row d-flex justify-content-center">
           @include("layouts.sidebar")
        <div class="col-10">
            @yield('main')
        </div>
    </div>
<hr>
</main>

<footer class="row mt-auto bg-dark bg">
  @include("layouts.footer")
</footer>
<script>
    // setInputFilter(document.getElementById("search"), function(value) {
    //     return /^\d*\.?\d*$/.test(value); // Allow digits and '.' only, using a RegExp.
    // });
</script>
</body>
</html>
