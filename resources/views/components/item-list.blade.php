<div>
    @foreach ($items as $item)
    {{ $slot($item) }}
    @endforeach
</div>