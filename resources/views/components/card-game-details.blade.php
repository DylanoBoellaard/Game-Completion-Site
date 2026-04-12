<div class="game_details">
    <div class="title_description">
        <h1>{{ $title }}</h1>
        <p>{{ $description }}</p>
    </div>

    <div class="playtime_status">
        @php
        $color = match(true) {

        // <!-- TO DO: Games like Spyro can have a completion percentage above 100%. Add logic to handle this case (controller logic?). -->
        $percentage > 100 => 'rgba(0, 207, 189, 1) 100%', // Platinum (light-blue)
        $percentage == 100 => 'rgba(255, 215, 0, 1)', // gold
        $percentage >= 50 => 'rgba(192, 192, 192, 1)', // silver
        $percentage >= 25 => 'rgba(205, 127, 50, 1)', // bronze
        default => 'rgba(0, 0, 0, 1)'
        };
        @endphp

        <div class="statusContainer">
            @isset($statusIcon)
            <div class="icon" style="stroke: {{ $color }};">
                {{ $statusIcon }}
            </div>
            @endisset

            <div class="status">
                <p class="soft">Status</p>
                <p class="bold">{{ $status }}</p>
            </div>
        </div>

        <div class="playtimeContainer">
            @isset($playtimeIcon)
            <div class="icon" style="fill: {{ $color }};">
                {{ $playtimeIcon }}
            </div>
            @endisset

            <div class="playtime">
                <p class="soft">Playtime</p>
                @if ($playtime > 60)
                <p>{{ round($playtime / 60, 2) }} hours</p>
                @else
                <p>{{ $playtime }} minutes</p>
                @endif

            </div>
        </div>
    </div>
</div>
<p class="Usernotes"><span>Notes:</span> {{ $userNotes }}</p>
<!-- Universal slot for any content -->
@isset($slot)
{{ $slot }}
@endisset