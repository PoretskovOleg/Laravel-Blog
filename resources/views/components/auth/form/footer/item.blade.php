<div class="text-xxs md:text-xs">
    {{ $slot }}
    <a {{ $attributes->class(['text-white', 'hover:text-white/70', 'font-bold']) }}
       href="{{ $route }}"
    >
        {{ $name }}
    </a>
</div>
