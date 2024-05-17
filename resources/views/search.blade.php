@extends('layouts.app-master')

@section('style')
<style>
    
</style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($books as $item)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail">
                        <a href="#">
                            <img style="width: 100%; height: 200px; display: block;" alt="100%x200"
                                src="{{ asset('storage/' . $item->image) }}"
                                data-holder-rendered="true">
                        </a>
                        <div class="caption">
                            <div class="text-left">{{ $item->title }}</div>
                            <div>
                                <span class="text-left text-danger">{{ $item->price }} VND</span>
                            </div>
                            <div class="small">
                                Lượt xem: {{ $item->view_count }}
                            </div>
                            <p>
                                <a class="btn btn-primary btn-block" role="button"
                                    href="{{ route('home.bookDetail', ['id' => $item->id]) }}">Chi tiết sách</a>
                            </p>
                            
                        </div>
                    </div>
                </div>
            @endforeach          
        </div>        
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-12">
            {{ $books->links() }}
        </div>
    </div>
@endsection
