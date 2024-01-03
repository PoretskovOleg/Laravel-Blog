@extends('layouts.admin', ['title' => $category->exists ? 'Редактирование категории' : 'Создание категории'])

@section('content')
    <x-title>{{ $category->exists ? 'Редактирование категории' : 'Создание категории' }}</x-title>

    <a href="{{ route('admin.categories.index') }}" class="text-indigo-600 hover:text-indigo-900 my-5 block">
        Вернуться назад
    </a>

    <form
        action="{{ $category->exists ? route('admin.categories.update', ['category' => $category]) : route('admin.categories.store')}}"
        method="POST"
    >
        @csrf
        @method($category->exists ? 'PUT' : 'POST')

        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-gray-50 sm:p-6">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700">Название</label>
                        <input
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md bg-darkblue"
                            type="text"
                            required
                            name="name"
                            value="{{ old('name', $category->name) }}"
                        >
                        @error('name')
                        <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ $category->exists ? 'Сохранить' : 'Добавить' }}
                </button>
            </div>
        </div>
    </form>

@endsection
