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