@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/gourmets.css') }}">
@endsection

@section('main')
    <div class="container">
        @foreach($gourmets as $gourmet)
            <div class="gourmet_card">
                <img class="gourmet_image" src="assets/image/{{$gourmet->image_path}}">
                <div class="gourmet_card_bottom">
                    <p class="gourmet_name">{{ $gourmet->gourmet_name }}</p>
                    <span class="area_tag">#{{ $gourmet->areas->gourmet_area }}</span>
                    <span class="genre_tag">#{{ $gourmet->genres->gourmet_genre }}</span>
                    <div class="flex-area">
                        <form class="view_detail" method="post" action="/gourmet_detail">
                            @csrf
                            <input type="hidden" name="gourmet_id" value="{{ $gourmet->id }}" readonly>
                            <button class="detail_button" type="submit">詳しく見る</button>
                        </form>
                        <form action="/favorite_gourmet" method="post">
                            @csrf
                            <input type="hidden" name="gourmet_id" value="{{ $gourmet->id }}" readonly>
                            <button type="submit" class="heart"></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection