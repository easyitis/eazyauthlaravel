<!DOCTYPE html>
<html class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="d-flex flex-column h-100">
    <main role="main" class="container" style="padding:60px 0 0">
        <section>
            <br>
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@yield('cardtitle')</h5>
                        @yield('content')
                    </div>
                </div>
            </div>
            <br>
        </section>
    </main>
    <script src="/js/app.js"></script>
</body>

</html>