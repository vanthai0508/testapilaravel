<!doctype html>
<html>
@extends('layouts.master')

<head>
    <title>Đăng kí</title>
    <link rel="stylesheet" href="{{asset('css/apply.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>

<body>
    <form name="apply" method="POST" action="{{ url('/cv/create')  }}" enctype="multipart/form-data">
        <div class="to">

            <div class="form">

                <h2>APPLY</h2>
                @if(session('error'))
                <ul>
                    <li class="text-danger">{{ session('error') }} </li>
                </ul>

                @endif

                <i class="fab fa-app-store-ios"></i>

                <label style="margin-left: -150px;"> {{ trans("message.name")}} </label>
                <input type="text" name="name" id="name">

                <label style="margin-left: -190px;"> {{trans("message.position")}}</label>
                <input type="text" name="position" id="position">

                <label>{{trans("message.phone")}}</label>
                <input style="margin-left: -130px;" type=" text" name="phone" id="phone">

                <label style="margin-left: -200px;">File</label>
                <input style="margin-left: -30px;" type="file" name="file" id="file" accept="image/png/jpg/jpeg">

                <input id="submit" type="submit" name="create">
                
            </div>

            @csrf

        </div>
    </form>
</body>

</html>