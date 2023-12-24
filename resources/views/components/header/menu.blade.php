<div class="header-menu grow hidden lg:flex items-center ml-8 mr-8 gap-8">
    <nav class="2xl:flex gap-8">
        @foreach($menuItems as $item)
            <a href="{{ $item['route'] }}" class="ml-4 mr-4 text-white hover:text-pink">
                {{ $item['name'] }}
            </a>
        @endforeach
    </nav>
</div>
