@extends('layouts.app-master')

@section('content')
    <div class="container">
        <p>Tất cả tác giả</p>
        <div class="list-group">
            @foreach ($authors as $author)
                <div class="list-group-item">
                    <div class="list-group-item-heading"><a href="{{ route('home.authorDetail', ['id' => $author->id])}}">{{ $author->name }}</a></div>
                    <div class="list-group-item-text">
                        <p>{{ $author->bio }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
