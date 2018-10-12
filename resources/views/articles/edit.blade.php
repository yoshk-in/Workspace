@extends('app')

@section('title', 'Редактирование статьи')

@section('content')
<h1>Редактирование статьи</h1>
<hr>

    <form action="{{ action('ArticleController@update', [$article->id]) }}" class="container-fluid" method="post"
          enctype="multipart/form-data"><input type="hidden" name="_method" type="hidden" value="PATCH">
        {{ csrf_field() }}
        @include('articles.partials.form', ['submitButtonText' => 'Сохранить изменения'])

    </form>

    @include('articles.partials.errors')

    @isset( $images)
        @foreach( $images as $image )
            <img src="{{ asset('/storage/'.$image->path) }}" alt="" class="image-fluid">
        @endforeach
    @endisset


@endsection
