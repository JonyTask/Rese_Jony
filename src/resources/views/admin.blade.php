@extends('layouts.share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/gourmets.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
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
                        <form class="delete_form" method="post" action="/admin_delete">
                            @csrf
                            <input type="hidden" name="gourmet_id" value="{{ $gourmet->id }}" readonly>
                            <button class="delete_button" type="submit">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('modal_link_first')
    <form action="/admin_logout" method="post">
        @csrf
        <button type="submit" class="logout_button">Logout</button>
    </form>
@endsection