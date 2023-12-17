@extends('layouts.app')

@section('content')
    <x-title>Лучшие статьи</x-title>

    <x-articles>
        @foreach($articles as $article)
            <x-articles.card :article="$article"></x-articles.card>
        @endforeach
    </x-articles>
@endsection
