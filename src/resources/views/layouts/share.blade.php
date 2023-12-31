<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
    @yield('css')
</head>
<body class="body_zone">
    <div class="header">
        <div class="header_inner">
            <div class="humberger_flex">
                <div class="hamburger_menu">
                    <span class="hamburger_line line_SecondOne"></span>
                    <span class="hamburger_line line_FirstOne"></span>
                    <span class="hamburger_line line_ForthOne"></span>
                </div>
                <h1 class="site-title">Rese</h1>
            </div>
            @yield('search')
        </div>
    </div>
    @yield('main')

    <div class="modal">
        <div class="modal_links">
            @yield('modal_link_first')
            @yield('modal_link_second')
            @yield('modal_link_third')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/javascript/modal.js') }}"></script>
</body>
</html>