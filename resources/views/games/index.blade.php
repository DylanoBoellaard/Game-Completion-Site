<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Completion Site</title>
    @vite(['resources/scss/games/index.scss', 'resources/scss/app.scss'])
</head>

<body>
    <h1>My Game Collection</h1>

    <div class="grid_container">
        @foreach ($gameDetails as $item)
        <div class="container">
            <a href="{{ route('games.details', $item['user_game']) }}">
                <div class="game_thumbnail">
                    <!-- Display game name
                            .auto-scale uses the fitty.js library to scale the text to fit the container
                            .fit is neccessary to increase performance of the fitty.js library
                     -->
                    <h3 class="auto-scale fit">{{ $item['game']->name }}</h3>

                    <!-- Game thumbnail image -->
                    <img src="img/Skyrim_AE_Cover_Art.jpg" alt="Game Thumbnail">

                    <!-- // Display game release date and category -->
                    <div class="sub_details">
                        <p>{{ $item['game']->release_date }}</p>
                        <p>{{ $item['categories']->first()->name }}</p>
                    </div>
                </div>
            </a>
            <div class="game_details">
                <div class="game_details_container" id="around">
                    <!-- // Display platform -->
                    <p> {{ $item['platforms']->first()->name }}</p>

                    <!-- // Display game status and add a class to the status text based on the game status -->
                    <p class="status-{{ str_replace('_', '-', $item['user_game']->status) }}">
                        {{ $item['user_game']->status }}
                    </p>

                    <!-- // Calculate playtime in hours from minutes if playtime is greater than 60 minutes, otherwise display in minutes -->
                    @if ($item['user_game']->playtime > 60)
                    <p>{{ round($item['user_game']->playtime / 60, 2) }} hours</p>
                    @else
                    <p>{{ $item['user_game']->playtime }} minutes</p>
                    @endif
                </div>

                <!-- // Display amount of quests and trackables -->
                <div class="game_details_container" id="around">
                    <p><span>Quests:</span> {{ $item['quests']->count() }}</p>
                    <p><span>Trackables:</span> {{ $item['trackables']->count() }}</p>
                </div>

                <!-- // Display user notes -->
                <div class="game_details_container" id="center">
                    <p>{{ $item['user_game']->notes }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <script src="js/fitty.min.js"></script>
    <script>
        fitty('.auto-scale', {
            minSize: 19,
            maxSize: 24,
            // multiLine: true
        });

        let myFittyElement = document.querySelector('.auto-scale');
        myFittyElement.addEventListener('fit', function(e) {
            // log the detail property to the console
            console.log(e.detail);
        });
    </script>
</body>

</html>