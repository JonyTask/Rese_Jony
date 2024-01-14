@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/thanks.css') }}">
@endsection

@section('main')
    <div class="thanks_area">
        <p class="thanks_sentence">
            ご予約ありがとうございます
        </p>
        <a href="/" class="back_to_home">戻る</a>
    </div>
@endsection

@if(Auth::check())
    @section('modal_link_first')
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="logout_button">Logout</button>
        </form>
    @endsection
    @section('modal_link_second')
        <a class="modal_hyperlink" href="/">Home</a>
    @endsection
    @section('modal_link_third')
        <a class="modal_hyperlink" href="/Mypage">Mypage</a>
    @endsection
@else
    @section('modal_link_first')
        <a class="modal_hyperlink" href="/register">Registration</a>
    @endsection
    @section('modal_link_second')
        <a class="modal_hyperlink" href="/login">Login</a>
    @endsection
@endif