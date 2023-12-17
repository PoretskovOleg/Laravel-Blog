@extends('layouts.app', ['title' => 'Статьи'])

@section('content')
    <x-title>Статьи</x-title>

    <x-articles.categories>
        @foreach($categories as $category)
            <x-articles.category :category="$category" :activeCategory="$activeCategory"></x-articles.category>
        @endforeach
    </x-articles.categories>

    <x-articles>
        @foreach($articles as $article)
            <x-articles.card :article="$article"></x-articles.card>
        @endforeach
    </x-articles>

    {{ $articles->links() }}

@endsection
