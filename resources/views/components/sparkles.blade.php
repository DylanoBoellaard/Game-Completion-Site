<!-- Usage: add :percentage="$INTVariable" to the component -->
@props([
'percentage' => 0,
])

@php
$colour = match(true) {

// <!-- TO DO: Games like Spyro can have a completion percentage above 100%. Add logic to handle this case (controller logic?). -->
$percentage > 100 => 'rgba(0, 207, 189, 1)', // Platinum (light-blue)
$percentage == 100 => 'rgba(255, 215, 0, 1)', // gold
$percentage >= 50 => 'rgba(192, 192, 192, 1)', // silver
$percentage >= 25 => 'rgba(205, 127, 50, 1)', // bronze
default => '#FFC700'
};

// Doesn't work. Needs fixing. Colours via these classes aren't being applied properly.
$tier = match(true) {
$percentage > 100 => 'platinum',
$percentage == 100 => 'gold',
$percentage >= 50 => 'silver',
$percentage >= 25 => 'bronze',
default => 'none'
};
@endphp

<!-- If percentage is greater than 25%, display sparkles. Else, show the slot without sparkles. -->
@if ($percentage >= 25)
<span {{ $attributes->merge(['class' => "sparkles sparkle-$tier"]) }} class="sparkles" data-color="{{ $colour ?? '#FFC700' }}">
    <span class="sparkles-container"></span>
    <strong class="sparkles-text">
        {{ $slot }}
    </strong>
</span>
@else
    {{ $slot }}
@endif