<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
</head>
<body>

    <?php if (Auth::check() && Auth::user()->superuser): ?>
        <nav class="navbar navbar-light bg-faded">
            <a class="navbar-brand" href="{{route('home')}}">
                Fetcher Admin
            </a>
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('settings')}}">Account Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.index')}}">Categories</a>
                </li>
            </ul>
        </nav>
    <?php endif ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @include('flash::message')
            </div>
        </div>
        @if ($errors->any())
            <div class="row">
                <div class="col-md-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @yield('content')
    </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
</body>
</html>