<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home | Qixer</title>
    @include('frontend_new.includes.partials.head')
    <style>
        .body-image {
            background-image: url("../assets/frontend/bg/bg-asset-1.png");
            height: 100vh;
        }
        #navbarNav ul li a {
            color: white;
            font-size: 18px;
        }
    </style>
    @include('frontend_new.includes.partials.styles')
</head>
<body class="bg-image body-image" id="body-image">
{{--<body id="intro" class="bg-image shadow-2-strong">--}}
@include('frontend_new.includes.partials.header')
<div class="container">
    @yield('content')
</div><!-- End #main -->
@include('frontend_new.includes.partials.footer')
@include('frontend_new.includes.partials.scripts')
</body>
</html>

