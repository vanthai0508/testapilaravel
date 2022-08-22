<!doctype html>
<html>

<head>
    <title>CONFIRM</title>
    <link rel="stylesheet" href="{{asset('css/apply.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,400i|Noto+Sans:400,400i,700"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
</head>

<body>
    <form name="confirm" method="POST" action="" enctype="multipart/form-data">
        <div class="to">

            <div class="form">

                <h2>APPLY</h2>
                @if(session('error'))
                <ul>
                    <li class="text-danger">{{ session('error') }} </li>
                </ul>

                @else

               
               
                <i class="fab fa-app-store-ios"></i>

                <label style="margin-left: -150px;">Họ và tên</label>
                <input type="text" name="name" id="name" value="{{ $cv->name }}">

                <label style="margin-left: -190px;">Vị trí</label>
                <input type="text" name="position" id="position" value="{{ $cv->position }}">

                <label style="margin-left: -190px;">Số điện thoại</label>
                <input style="margin-left: -130px;" type=" text" name="phone" id="phone" value="{{ $cv->phone }}">

                <label style="margin-left: -190px;">Date Interview</label>
                <input type="text" name="dateinterview" id="dateinterview" value="{{ $confirm->dateinterview }}">

                <input id="submit" type="submit" name="confirm">

                @endif
            </div>

            @csrf

        </div>
    </form>
</body>

</html>