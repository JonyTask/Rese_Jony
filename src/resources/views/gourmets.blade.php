@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/gourmets.css') }}">
@endsection

@section('search')
    <div class="search_area">
        <form action="/Search" method="get" class="search_form">
            @csrf
            <select name="gourmet_area" class="area_select">
                <option value="">All Area</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->gourmet_area }}</option>
                @endforeach
            </select>
            <select name="gourmet_genre" class="genre_select">
                <option value="">All Genre</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->gourmet_genre }}</option>
                @endforeach
            </select>
            <input type="text" class="gourmet_name_input" name="gourmet_name" placeholder="Search..." autocomplete="off">
            <button type="submit" class="scope_search_button">検索</button>
            <a href="/" class="reset_link">リセット</a>
        </form>
    </div>
@endsection

@section('main')
    <div class="container">
        @foreach($gourmets as $gourmet)
            <div class="gourmet_card">
                <img class="gourmet_image" src="assets/image/{{$gourmet->image_path}}">
                <div class="gourmet_card_bottom">
                    <p class="gourmet_name">{{ $gourmet->name }}</p>
                    <span class="area_tag">#{{ $gourmet->areas->gourmet_area }}</span>
                    <span class="genre_tag">#{{ $gourmet->genres->gourmet_genre }}</span>
                    <div class="flex-area">
                        <form class="view_detail" method="get" action="/Detail">
                            @csrf
                            <input type="hidden" name="gourmet_id" value="{{ $gourmet->id }}" readonly>
                            <button class="detail_button" type="submit">詳しく見る</button>
                        </form>
                        <form action="/AddFavorite" method="post">
                            @csrf
                            <input type="hidden" name="gourmet_id" value="{{ $gourmet->id }}" readonly>
                            @php
                                if(!in_array( $gourmet->id , $favorites_array) ){
                                    echo "<button type='submit' class='heart'></button>";
                                }else{
                                    echo "<button type='submit' class='heart heart_favorite_state'></button>";
                                }
                            @endphp
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('modal_link_first')
    <a class="modal_hyperlink" href="/Mypage">Mypage</a>
@endsection

@section('modal_link_second')
    <a class="modal_hyperlink" href="/register">Registration</a>
@endsection

@section('modal_link_third')
    <a class="modal_hyperlink" href="/login">Login</a>
@endsection