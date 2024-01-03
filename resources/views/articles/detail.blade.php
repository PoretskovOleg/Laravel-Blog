@extends('layouts.app', ['title' => $article->title])

@section('content')
    <x-articles.detail :article="$article"></x-articles.detail>
@endsection
