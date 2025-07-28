<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="keywords" content="smk texmaco">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/pesan.min.css') }}">
    @yield('styles')

</head>

<body>
    <div class="wrapper">
        {{-- nav sidebar --}}
        @include('partial.sidebar')
        <div class="main">
            {{-- nav --}}
            @include('partial.nav')
            <main class="content">
                <div class="bg">
                    <div class="container-fluid p-0">
                        <h1 class="mb-3">@yield('judul')</h1>
                        <div class="row">

                            @if ($message = Session::get('success'))
                            <div class="right" id="myAlert">
                                <div class="check">
                                    <i class="" data-feather="check-circle"></i> &nbsp; &nbsp;
                                    <span>{{ $message }}</span>

                                </div>
                            </div>
                            @endif
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script type="text/javascript">
        const message = document.getElementById("myAlert"),
            delay = 2e3;
        setTimeout((() => {
            message.style.display = "none"
        }), 2e3);
    </script>
    @yield('scripts')
</body>

</html>