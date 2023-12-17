@extends('layouts.app', ['title' => $article->name])

@section('content')
    <x-articles.detail :article="$article"></x-articles.detail>
@endsection
