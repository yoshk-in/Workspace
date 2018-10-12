@extends('app')

@section('title', 'Создание статьи')

@section('content')
<h1>Создание статьи</h1>
<hr>

    <form action="{{ action('ArticleController@store') }}" class="container-fluid" method="post"
          enctype="multipart/form-data">
        {{ csrf_field() }}

        @include('articles.partials.form', ['submitButtonText' => 'Сохранить статью'])

    </form>

    @include('articles.partials.errors')

@endsection
