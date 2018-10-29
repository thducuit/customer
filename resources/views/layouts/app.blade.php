<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TQ Tecom') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datepicker.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.tagsinput.min.css">
    <link rel="stylesheet" type="text/css" href="/js/colorpicker/css/colorpicker.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="/images/logo.svg" class="img-responsive">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/gui-mail" >Gửi mail</a>
                        </li>
						<li>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quản lý<span class="caret"></span>
                            <ul class="dropdown-menu">								
                                <li><a href="/quan-ly-dich-vu">Danh mục các dịch vụ</a></li>
                                <li><a href="/quan-ly-khach-hang">Danh sách khách hàng</a></li>
                                <li><a href="/quan-ly-nha-cung-cap">Danh sách nhà cung cấp</a></li>
                                <li><a href="/quan-ly-mau-email">Mẫu Email</a></li>
                            </ul>
						</li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cấu hình <span class="caret"></span>
                            <ul class="dropdown-menu">
                                <li><a href="/them-cc">Thêm email cc</a></li>
                                <li><a href="/quan-ly-logs">Nhật ký gửi email</a></li>
                                <li><a href="/quan-ly-tasks">Tiến trình gửi email</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="col-sm-12">
            @if ( session('success') )
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

            @if ( session('error') )
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
            @endif

            @if ( session('warning') )
            <div class="alert alert-warning">
              {{ session('warning') }}
            </div>
            @endif

            @if ( session('info') )
            <div class="alert alert-info">
              {{ session('info') }}
            </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        @yield('content')
    </div>
    
</body>
</html>
<!-- Scripts -->
<script src="/js/app.js"></script>
<script src="/js/jquery-3.3.1.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="/js/bootbox.min.js" type="text/javascript"></script>
<script src="/js/jquery.tagsinput.min.js"></script>                        
<script src="/js/Chart.js"></script>
<script src="/js/ckeditor/ckeditor.js"></script>
<script src="/js/colorpicker/js/colorpicker.js"></script>
<script src="/js/jscolor.js"></script>
<script src="/js/tq/custom.js"></script>
<script src="/js/tq/chart.js"></script> 

<!-- Scripts -->
<script type="text/javascript">

    if(chartdata1 && chartdata2) {
        new TQ_Chart('chart-category', 'Expected Sales 2018', chartdata1);
        new TQ_Chart('chart-supplier', 'Expected Cost 2018', chartdata2);
    }
    
    CKEDITOR.replace( 'editor' );
</script> 