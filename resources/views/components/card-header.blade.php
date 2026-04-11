<div class="title_section">
    @isset($icon)
        <div class="icon">
            {{ $icon }}
        </div>
    @endisset

    <div class="column">
        <h2>{{ $title }}</h2>

        @if(isset($subtitle))
        <p>{{ $subtitle }}</p>
        @endif
    </div>
</div>