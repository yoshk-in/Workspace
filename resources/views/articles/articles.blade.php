@extends('app')

@section('title', 'Статьи')

@section('content')



<h1>Примеры работ:</h1>

<hr>

    @if($articles->first())
        @foreach ($articles as $article)
            <h3><a href="{{ action('ArticleController@show', [$article->id]) }}">{{ $article->title }}</a></h3>
            <p>{{ $article->body }}</p>
            {{--{{ dd($articles->image) }}--}}
        @endforeach
    @else <p>Новых статей пока нет </p>
    @endif
@endsection
