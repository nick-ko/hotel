<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('back/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('back/')}}vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('back/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('back/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('back/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="{{URL::to('front/image/Logo.png')}}" alt="logo">
                        </a>
                    </div>
                    <div class="login-form">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('E-Mail Address') }}</label>
                                <input class="au-input au-input--full @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group">
                                <label>{{ __('Mot de passe') }}</label>
                                <input class="au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                            </div>

                            <div class="login-checkbox">
                                <label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Se souvenir de moi') }}
                                </label>
                                <label>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de Passe oublie ?') }}
                                        </a>
                                    @endif
                                </label>
                                <br><br>
                            </div>
                            <br>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">connexion</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- Jquery JS-->
<script src="{{asset('back/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->
<script src="{{asset('back/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('back/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<!-- Vendor JS       -->
<script src="{{asset('back/vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('back/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('back/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('back/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('back/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('back/vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('back/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('back/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('back/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('back/vendor/select2/select2.min.js')}}">
</script>

<!-- Main JS-->
<script src="{{asset('back/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->

