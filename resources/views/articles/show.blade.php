@extends('app')



@section('content')


    <h3> {{ $article->title }}</h3>
    <hr>
    @isset($tags)
        <small> Категории: @foreach($tags as $tag) {{ $tag->name }} @endforeach</small>
        <hr>
    @endisset



    <p> {{ $article->body }}</p>

    <br>

    <small class="float-right">Обновлено:{{ $article->updated_at }} </small>


    <hr>





    @isset($article->images->first()->path)
        @foreach($article->images as $image)
            <img src="{{ asset('/storage/'.$image->path) }}" alt="" class="img-fluid"> <br>
            <i> Размер файла: {{ $image->size }} байт</i>
            <br>
        @endforeach
    @endisset

@endsection
