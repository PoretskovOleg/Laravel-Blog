@extends('layouts.admin', ['title' => $article->exists ? 'Редактирование статьи' : 'Создание статьи'])

@section('content')
    <x-title>{{ $article->exists ? 'Редактирование статьи' : 'Создание статьи' }}</x-title>

    <a href="{{ route('admin.articles.index') }}" class="text-indigo-600 hover:text-indigo-900 my-5 block">
        Вернуться назад
    </a>

    <form
        action="{{ $article->exists ? route('admin.articles.update', ['article' => $article]) : route('admin.articles.store')}}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method($article->exists ? 'PUT' : 'POST')

        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-gray-50 sm:p-6">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Категория</label>
                        <select
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-darkblue"
                            name="category_id"
                            required
                        >
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(old('category_id', $article->category_id) == $category->id)
                                >
                                {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Заголовок</label>
                        <input
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-darkblue"
                            type="text"
                            required
                            name="title"
                            value="{{ old('title', $article->title) }}"
                        >
                        @error('title')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Текст</label>
                        <textarea
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-darkblue"
                            type="text"
                            required
                            name="text"
                        >{{ old('text', $article->text) }}</textarea>

                        @error('text')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Изображение</label>
                        <input type="file" {{ $article->exists ? '' : 'required' }} name="image">
                        <img src="{{$article->exists ? $article->preview_img : '' }}">
                        @error('image')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{$article->exists ? 'Сохранить' : 'Добавить' }}
                </button>
            </div>
        </div>
    </form>

@endsection
