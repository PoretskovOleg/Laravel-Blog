@extends('layouts.admin', ['title' => 'Категории статей'])

@section('content')
    <x-title>Категории статей</x-title>

    <a href="{{ route('admin.categories.create') }}" class="text-indigo-600 hover:text-indigo-900 my-5 block">
        Добавить категорию
    </a>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                @if($categories->total() > 0)
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Название категории
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Количество статей
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Дата создания
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Дата обновления
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Действия</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-gray-50 divide-y divide-gray-200">
                        @foreach($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $category->name }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $category->articles_count }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $category->created_at_format }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $category->updated_at_format }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end items-center space-x-3">
                                <a
                                    class="text-indigo-600 hover:text-indigo-900"
                                    href="{{ route('admin.categories.edit', ['category' => $category]) }}"
                                >Редактировать</a>

                                <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer"
                                    >Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
                @else
                <div class="text-center font-bold text-xl">
                    Категорий пока нет
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
