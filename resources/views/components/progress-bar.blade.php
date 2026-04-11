<div class="progress_bar">
    <div class="progress_text">
        <p>{{ $label }}</p>

        <p>
            @if($value !== null && $total !== null)
            {{ $value }} / {{ $total }} ({{ $percentage }}%)
            @else
            {{ $percentage }}%
            @endif
        </p>
    </div>

    <div class="bar">
        @php
        $color = match(true) {

        // <!-- TO DO: Games like Spyro can have a completion percentage above 100%. Add logic to handle this case (controller logic?). -->
        $percentage > 100 => 'linear-gradient(90deg,rgba(118, 199, 192, 1) 0%, rgba(0, 207, 189, 1) 100%)', // Platinum (light-blue)
        $percentage == 100 => 'linear-gradient(90deg,rgba(255, 215, 0, 1) 0%, rgba(204, 186, 82, 1) 100%)', // gold
        $percentage >= 50 => 'linear-gradient(90deg,rgba(192, 192, 192, 1) 0%, rgba(145, 145, 145, 1) 100%)', // silver
        $percentage >= 25 => 'linear-gradient(90deg,rgba(205, 127, 50, 1) 0%, rgba(178, 142, 102, 1) 100%)', // bronze
        default => 'linear-gradient(90deg,rgba(0, 0, 0, 1) 0%, rgba(74, 74, 74, 1) 100%)'
        };
        @endphp

        <div class="fill" style="width: {{ $percentage }}%; background: {{ $color }}"></div>
    </div>
</div>