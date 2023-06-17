<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{WebName()}}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400&display=swap" rel="stylesheet">
        <meta name="description" content="{{WebName()}}">
        <link rel="shortcut icon" href="{{asset('logo.png')}}" type="image/x-icon">
        @if (LaravelLocalization::getCurrentLocale() == 'en')
        <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">

        @elseif (LaravelLocalization::getCurrentLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('front/ar/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/ar/css/ar.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}">
        @endif
        <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    </head>
    <body>
