<form method="POST" {{ $attributes->merge(['class' => 'space-y-3']) }}>
    @csrf
    {{ $slot }}
</form>
