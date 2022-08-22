<!DOCTYPE html>
<html lang="en">
@extends('layouts.master')
<head>


@section('title', 'App - Top Page')
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <title>Document</title>

    @section('header')
    @include('partial.header')
@stop
</head>
<body>
    <div class="start">
        <h1>{{ trans('message.welcome') }}</h1>
        <div class="link">
            <a href="/user/login" class="button">{{ trans('message.login') }}</a>
            <a href="/user/create" class="button">{{ trans('message.register') }}</a>
            
            <a href="/cv/create" class="button">{{ trans('message.apply') }}</a>
            <a href="/confirm/confirm" class="button">{{ trans('message.confirm') }}</a>
                     
            <a href="/cv/list" class="button">{{ trans('message.manage') }}</a>
            <a href="/confirm/doneconfirm" class="button">{{ trans('message.participation') }}</a>

            

            
                        

                        
        </div>
    </div>
    <div class="column">
        <div class="article">
            <h1>Reduced development costs</h1>

           
            <section>
                By having Moa's SE stationed at your company, you can ensure quality and keep costs down to about half
                of the cost in Japan.
            </section>
            <p>M O R</p>
            <section>
                <ul>
                    <li>Đặng Lê Hùng</li>
                    <li>Vũ Văn Tú</li>
                    <li>Lê Mạnh Hùng</li>

                </ul>
            </section>
            <section> <button>APPLY</button> </section>
        </div>
    </div>
    <div class="column">
        <div class="article">
            <h1>human resources</h1>
            <section>
                Many of our employees graduated from prestigious universities in Vietnam, and are highly evaluated not
                only for their technical capabilities, but also for their management and communication skills.
            </section>
            <p>M O R</p>
            <section>
                <ul>
                    <li>Đặng Lê Hùng</li>
                    <li>Vũ Văn Tú</li>
                    <li>Lê Mạnh Hùng</li>
                </ul>
            </section>
            <section> <button>APPLY</button> </section>
        </div>
    </div>
    <div class="column">
        <div class="article">
            <h1>International environment</h1>
            <section>
                Many of our bridge SEs have experience studying or working in Japan, and are able to communicate with
                Japanese customers in Japanese without discomfort.
            </section>
            <p>M O R</p>
            <section>
                <ul>
                    <li>Đặng Lê Hùng</li>
                    <li>Vũ Văn Tú</li>
                    <li>Lê Mạnh Hùng</li>
                </ul>
            </section>
            <section> <button>APPLY</button></section>
        </div>
    </div>
    </div>
</body>


</html>