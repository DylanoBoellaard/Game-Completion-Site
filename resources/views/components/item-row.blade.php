<div class="card_items">
    <div class="row">
        <!-- Users won't know what colours mean what status. Add an info table somewhere? -->
        <div class="statusIcon status-{{ str_replace('_', '-', $status) }}"></div>

        <p @class([
            'strikethrough' => $status === 'completed'
        ])>
            {{ $title }}
        </p>
    </div>
</div>