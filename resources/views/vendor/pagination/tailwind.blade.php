@if ($paginator->hasPages())
    <nav class="mt-4">
        <ul class="flex flex-wrap items-center justify-center gap-3">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">
                                <a href="{{ $url }}"
                                   class="block p-3 text-sm font-black leading-none text-pink"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @else
                            <li class="">
                                <a href="{{ $url }}"
                                   class="block p-3 text-sm font-black leading-none text-white hover:text-pink"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>
@endif
