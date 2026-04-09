<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Details</title>
    @vite(['resources/scss/games/details.scss', 'resources/scss/app.scss'])
</head>

<body>
    <div id="game_details">
        <h1>{{ $game->name }}</h1>
        <p>Status: {{ $userGame->status }}</p>
        <p>Playtime: {{ $userGame->playtime }}</p>
        <p>Notes: {{ $userGame->notes }}</p>

        <div class="progress_bar">
            <p>Total game Progress: {{ $totalGameProgress }}%</p>
            <div class="bar">
                <div class="fill" style="width: {{ $totalGameProgress }}%"></div>
            </div>
        </div>


    </div>

    <div id="main_quests">
        <h2>Main Quests</h2>

        <div class="progress_bar">
            <p>Total Main Quest Progress: {{ $mainQuestProgress }}%</p>
            <div class="bar">
                <div class="fill" style="width: {{ $mainQuestProgress }}%"></div>
            </div>
        </div>

        @foreach ($mainQuests as $uq)
        <div>
            <p>{{ $uq->quest->name }}</p>
            <p>{{ $uq->status }}</p>
        </div>
        @endforeach
    </div>

    <!-- // Side Quests -->
    <div id="side_quests">
        <h2>Side Quests</h2>

        <div class="progress_bar">
            <p>Total side Quest Progress: {{ $sideQuestProgress }}%</p>
            <div class="bar">
                <div class="fill" style="width: {{ $sideQuestProgress }}%"></div>
            </div>
        </div>

        @foreach ($sideQuests as $uq)
        <div>
            <p>{{ $uq->quest->name }}</p>
            <p>{{ $uq->status }}</p>
        </div>
        @endforeach
    </div>

    <!-- // All Quests -->
    <div id="all_quests">
        <h2>All Quests</h2>

        <div class="progress_bar">
            <p>Total Quest Progress: {{ $allQuestsProgress }}%</p>
            <div class="bar">
                <div class="fill" style="width: {{ $allQuestsProgress }}%"></div>
            </div>
        </div>

        @foreach ($allQuests as $uq)
        <div>
            <p>{{ $uq->quest->name }} ({{ $uq->quest->type }})</p>
            <p>{{ $uq->status }}</p>
        </div>
        @endforeach
    </div>

    <!-- // Trackables - Achievements -->
    <div id="achievements">
        <h2>Achievements</h2>

        <div class="progress_bar">
            <p>Total Achievement Progress: {{ $achievementProgress }}%</p>
            <div class="bar">
                <div class="fill" style="width: {{ $achievementProgress }}%"></div>
            </div>
        </div>

        @foreach ($achievements as $ut)
        <div>
            <p>{{ $ut->trackable->name }}</p>
            <p>{{ $ut->status }}</p>
        </div>
        @endforeach
    </div>
    <!-- // Trackables - Collectables -->
    <div id="collectables">
        <h2>Collectables</h2>

        <div class="progress_bar">
            <p>Total Collectable Progress: {{ $collectableProgress }}%</p>
            <div class="bar">
                <div class="fill" style="width: {{ $collectableProgress }}%"></div>
            </div>
        </div>

        @foreach ($collectables as $ut)
        <div>
            <p>{{ $ut->trackable->name }}</p>
            <p>{{ $ut->status }}</p>
        </div>
        @endforeach
    </div>
    <!-- // Trackables - Secrets -->
    <div id="secrets">
        <h2>Secrets</h2>

        <div class="progress_bar">
            <p>Total Secret Progress: {{ $secretProgress }}%</p>
            <div class="bar">
                <div class="fill" style="width: {{ $secretProgress }}%"></div>
            </div>
        </div>

        @foreach ($secrets as $ut)
        <div>
            <p>{{ $ut->trackable->name }}</p>
            <p>{{ $ut->status }}</p>
        </div>
        @endforeach
    </div>
</body>

</html>