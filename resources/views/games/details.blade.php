<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Details</title>
    @vite(['resources/scss/games/details.scss', 'resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <!-- Game details -->
    <div class="container">
        <div class="game_details_container">
            <x-card-game-details
                :title="$game->name"
                :description="$game->description"
                :status="$userGame->status"
                :playtime="$userGame->playtime"
                :userNotes="$userGame->notes"
                :percentage="$totalGameProgress">
                <x-slot name="statusIcon">
                    <!-- star icon -->
                    <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="SVGStar">
                        <path d="M11.2691 4.41115C11.5006 3.89177 11.6164 3.63208 11.7776 3.55211C11.9176 3.48263 12.082 3.48263 12.222 3.55211C12.3832 3.63208 12.499 3.89177 12.7305 4.41115L14.5745 8.54808C14.643 8.70162 14.6772 8.77839 14.7302 8.83718C14.777 8.8892 14.8343 8.93081 14.8982 8.95929C14.9705 8.99149 15.0541 9.00031 15.2213 9.01795L19.7256 9.49336C20.2911 9.55304 20.5738 9.58288 20.6997 9.71147C20.809 9.82316 20.8598 9.97956 20.837 10.1342C20.8108 10.3122 20.5996 10.5025 20.1772 10.8832L16.8125 13.9154C16.6877 14.0279 16.6252 14.0842 16.5857 14.1527C16.5507 14.2134 16.5288 14.2807 16.5215 14.3503C16.5132 14.429 16.5306 14.5112 16.5655 14.6757L17.5053 19.1064C17.6233 19.6627 17.6823 19.9408 17.5989 20.1002C17.5264 20.2388 17.3934 20.3354 17.2393 20.3615C17.0619 20.3915 16.8156 20.2495 16.323 19.9654L12.3995 17.7024C12.2539 17.6184 12.1811 17.5765 12.1037 17.56C12.0352 17.5455 11.9644 17.5455 11.8959 17.56C11.8185 17.5765 11.7457 17.6184 11.6001 17.7024L7.67662 19.9654C7.18404 20.2495 6.93775 20.3915 6.76034 20.3615C6.60623 20.3354 6.47319 20.2388 6.40075 20.1002C6.31736 19.9408 6.37635 19.6627 6.49434 19.1064L7.4341 14.6757C7.46898 14.5112 7.48642 14.429 7.47814 14.3503C7.47081 14.2807 7.44894 14.2134 7.41394 14.1527C7.37439 14.0842 7.31195 14.0279 7.18708 13.9154L3.82246 10.8832C3.40005 10.5025 3.18884 10.3122 3.16258 10.1342C3.13978 9.97956 3.19059 9.82316 3.29993 9.71147C3.42581 9.58288 3.70856 9.55304 4.27406 9.49336L8.77835 9.01795C8.94553 9.00031 9.02911 8.99149 9.10139 8.95929C9.16534 8.93081 9.2226 8.8892 9.26946 8.83718C9.32241 8.77839 9.35663 8.70162 9.42508 8.54808L11.2691 4.41115Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </x-slot>

                <x-slot name="playtimeIcon">
                    <!-- watch icon -->
                    <svg width="35px" height="35px" viewBox="-4 -1 24 24" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin" class="SVGWatch">
                        <path d='M9 13h2a1 1 0 0 1 0 2H8a1 1 0 0 1-1-1v-4a1 1 0 1 1 2 0v3zM7 5.732V5a1 1 0 1 1 2 0v.732a2 2 0 1 0-2 0zm-2.041.866a4 4 0 1 1 6.082 0A8.002 8.002 0 0 1 8 22 8 8 0 0 1 4.959 6.598zM8 20A6 6 0 1 0 8 8a6 6 0 0 0 0 12z' />
                    </svg>
                </x-slot>
            </x-card-game-details>
            <x-sparkles :percentage="$totalGameProgress">
                <x-progress-bar
                    label="Overall Completion"
                    :value="$allQuests->where('status', 'completed')->count() + $allTrackables->where('status', 'completed')->count()"
                    :total="$allQuests->count() + $allTrackables->count()"
                    :percentage="$totalGameProgress">
                </x-progress-bar>
            </x-sparkles>
        </div>

        <!-- User tracked cards -->
        <!-- // Main Quests -->
        <x-card>
            <x-card-header title="Main Quests" subtitle="Primary questline">
                <x-slot name="icon">
                    <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.87868C20 3.75736 20 5.17157 20 8V16C20 18.8284 20 20.2426 19.1213 21.1213C18.2426 22 16.8284 22 14 22H10C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8Z" stroke="#1C274D" stroke-width="1.5" />
                        <path d="M19.8978 16H7.89778C6.96781 16 6.50282 16 6.12132 16.1022C5.08604 16.3796 4.2774 17.1883 4 18.2235" stroke="#1C274D" stroke-width="1.5" />
                        <path d="M8 7H16" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M8 10.5H13" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M13 16V19.5309C13 19.8065 13 19.9443 12.9051 20C12.8103 20.0557 12.6806 19.9941 12.4211 19.8708L11.1789 19.2808C11.0911 19.2391 11.0472 19.2182 11 19.2182C10.9528 19.2182 10.9089 19.2391 10.8211 19.2808L9.57889 19.8708C9.31943 19.9941 9.18971 20.0557 9.09485 20C9 19.9443 9 19.8065 9 19.5309V16.45" stroke="#1C274D" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </x-slot>
            </x-card-header>

            <x-sparkles :percentage="$mainQuestProgress">
                <x-progress-bar
                    label="Progress"
                    :value="$mainQuests->where('status', 'completed')->count()"
                    :total="$mainQuests->count()"
                    :percentage="$mainQuestProgress" />
            </x-sparkles>

            @foreach ($mainQuests as $uq)
            <x-item-row
                :title="$uq->quest->name"
                :status="$uq->status" />
            @endforeach
        </x-card>

        <!-- // Side Quests -->
        <x-card>
            <x-card-header title="Side Quests" subtitle="Optional quests">
                <x-slot name="icon">
                    <svg width="35px" height="35px" viewBox="0 0 24 24" id="_24x24_On_Light_Insights" data-name="24x24/On Light/Insights" xmlns="http://www.w3.org/2000/svg">
                        <rect id="view-box" width="24" height="24" fill="none" />
                        <path id="Shape" d="M10.75,1.5A2.25,2.25,0,0,1,13,3.75v9.028h1.5V3.75A3.75,3.75,0,0,0,10.75,0H.75a.75.75,0,0,0,0,1.5C1.669,1.5,2,1.831,2,2.75v11A3.75,3.75,0,0,0,5.75,17.5h8V16h-8A2.25,2.25,0,0,1,3.5,13.75v-11A3.392,3.392,0,0,0,3.285,1.5Z" transform="translate(4.25 3.25)" fill="#141124" />
                        <path id="Shape-2" data-name="Shape" d="M7.765,17.5A3.294,3.294,0,0,0,10.738,16H7.754C9.307,16,10,15,10,12.749a.751.751,0,0,1,.751-.75h8a.751.751,0,0,1,.75.75v1a3.755,3.755,0,0,1-3.75,3.75ZM10.738,16H15.75A2.253,2.253,0,0,0,18,13.749V13.5H11.472A5.4,5.4,0,0,1,10.738,16ZM7,16.75A.72.72,0,0,1,7.749,16h0v1.5A.719.719,0,0,1,7,16.75ZM.75,5.5A.751.751,0,0,1,0,4.75v-2a2.75,2.75,0,1,1,5.5,0v2a.751.751,0,0,1-.75.75ZM1.5,2.75V4H4V2.75a1.25,1.25,0,1,0-2.5,0Z" transform="translate(2.25 3.25)" fill="#141124" />
                    </svg>
                </x-slot>
            </x-card-header>

            <x-sparkles :percentage="$sideQuestProgress">
                <x-progress-bar
                    label="Side Quests Progress"
                    :value="$sideQuests->where('status', 'completed')->count()"
                    :total="$sideQuests->count()"
                    :percentage="$sideQuestProgress" />
            </x-sparkles>

            @foreach ($sideQuests as $uq)
            <x-item-row
                :title="$uq->quest->name"
                :status="$uq->status" />
            @endforeach
        </x-card>

        <!-- // All Quests -->
        <x-card>
            <x-card-header title="All Quests" subtitle="Total quest completion">
                <x-slot name="icon">
                    <svg fill="#000000" height="35px" width="35px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 512 512" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M490.667,369.47h-7.172c-0.031-1.704-0.264-3.43-0.725-5.151L398.994,51.68c-3.05-11.381-14.748-18.135-26.129-15.084
			                                l-78.165,20.949c-11.38,3.05-18.133,14.748-15.084,26.128l8.054,30.056c-1.75-0.167-3.52-0.269-5.316-0.269H64.006
			                                c-16.075,0-26.375,17.105-18.855,31.313l8.683,16.405c5.251,9.926,5.251,22.638-0.002,32.567l-2.672,5.048h-8.487
			                                c-16.075,0-26.375,17.105-18.855,31.313l8.683,16.405c5.251,9.926,5.251,22.638-0.002,32.567l-8.681,16.402
			                                c-7.52,14.208,2.78,31.313,18.855,31.313h8.487l2.673,5.051c5.251,9.926,5.251,22.638-0.002,32.567l-2.677,5.059H21.333
			                                C9.551,369.47,0,379.022,0,390.804v64c0,11.782,9.551,21.333,21.333,21.333h469.333c11.782,0,21.333-9.551,21.333-21.333v-64
			                                C512,379.022,502.449,369.47,490.667,369.47z M363.303,83.331l72.733,271.427l-36.953,9.904L326.35,93.235L363.303,83.331z
			                                M76.167,241.46H261.02c8.385,0,16.32,8.991,16.32,21.333c0,12.342-7.935,21.333-16.32,21.333H76.167
			                                C80.084,270.235,80.084,255.35,76.167,241.46z M97.5,156.126h184.853c8.385,0,16.32,8.991,16.32,21.333
			                                c0,12.342-7.935,21.333-16.32,21.333H261.02H97.5C101.417,184.902,101.417,170.016,97.5,156.126z M261.02,326.793h21.333
			                                c8.385,0,16.32,8.991,16.32,21.333s-7.935,21.333-16.32,21.333H97.5c3.917-13.891,3.917-28.777,0-42.667H261.02z M312.887,293.306
			                                c4.552-9.121,7.12-19.536,7.12-30.513c0-10.976-2.568-21.392-7.12-30.513c1.896-1.245,3.717-2.604,5.461-4.064l37.851,141.254
			                                h-18.23c2.182-6.705,3.371-13.894,3.371-21.344C341.34,325.139,330.092,304.604,312.887,293.306z M469.333,433.47H42.667v-21.333
			                                h426.667V433.47z" />
                            </g>
                        </g>
                    </svg>
                </x-slot>
            </x-card-header>

            <x-sparkles :percentage="$allQuestsProgress">
                <x-progress-bar
                    label="Total Quests Progress"
                    :value="$allQuests->where('status', 'completed')->count()"
                    :total="$allQuests->count()"
                    :percentage="$allQuestsProgress" />
            </x-sparkles>

            @foreach ($allQuests as $uq)
            <x-item-row
                :title="$uq->quest->name . ' (' . $uq->quest->type . ')'"
                :status="$uq->status" />
            @endforeach
        </x-card>

        <!-- // Trackables - Achievements -->
        <x-card>
            <x-card-header title="Achievements" subtitle="Unlocked milestones">
                <x-slot name="icon">
                    <svg width="35px" height="35px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 15C8.68629 15 6 12.3137 6 9V3.44444C6 3.0306 6 2.82367 6.06031 2.65798C6.16141 2.38021 6.38021 2.16141 6.65798 2.06031C6.82367 2 7.0306 2 7.44444 2H16.5556C16.9694 2 17.1763 2 17.342 2.06031C17.6198 2.16141 17.8386 2.38021 17.9397 2.65798C18 2.82367 18 3.0306 18 3.44444V9C18 12.3137 15.3137 15 12 15ZM12 15V18M18 4H20.5C20.9659 4 21.1989 4 21.3827 4.07612C21.6277 4.17761 21.8224 4.37229 21.9239 4.61732C22 4.80109 22 5.03406 22 5.5V6C22 6.92997 22 7.39496 21.8978 7.77646C21.6204 8.81173 20.8117 9.62038 19.7765 9.89778C19.395 10 18.93 10 18 10M6 4H3.5C3.03406 4 2.80109 4 2.61732 4.07612C2.37229 4.17761 2.17761 4.37229 2.07612 4.61732C2 4.80109 2 5.03406 2 5.5V6C2 6.92997 2 7.39496 2.10222 7.77646C2.37962 8.81173 3.18827 9.62038 4.22354 9.89778C4.60504 10 5.07003 10 6 10M7.44444 22H16.5556C16.801 22 17 21.801 17 21.5556C17 19.5919 15.4081 18 13.4444 18H10.5556C8.59188 18 7 19.5919 7 21.5556C7 21.801 7.19898 22 7.44444 22Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </x-slot>
            </x-card-header>

            <x-sparkles :percentage="$achievementProgress">
                <x-progress-bar
                    label="Achievements Progress"
                    :value="$achievements->where('status', 'completed')->count()"
                    :total="$achievements->count()"
                    :percentage="$achievementProgress" />
            </x-sparkles>

            @foreach ($achievements as $ut)
            <x-item-row
                :title="$ut->trackable->name"
                :status="$ut->status" />
            @endforeach
        </x-card>

        <!-- // Trackables - Collectables -->
        <x-card>
            <x-card-header title="Collectables" subtitle="Items found">
                <x-slot name="icon">
                    <svg fill="#000000" width="35px" height="35px" viewBox="0 -32 576 576" xmlns="http://www.w3.org/2000/svg">
                        <path d="M464 0H112c-4 0-7.8 2-10 5.4L2 152.6c-2.9 4.4-2.6 10.2.7 14.2l276 340.8c4.8 5.9 13.8 5.9 18.6 0l276-340.8c3.3-4.1 3.6-9.8.7-14.2L474.1 5.4C471.8 2 468.1 0 464 0zm-19.3 48l63.3 96h-68.4l-51.7-96h56.8zm-202.1 0h90.7l51.7 96H191l51.6-96zm-111.3 0h56.8l-51.7 96H68l63.3-96zm-43 144h51.4L208 352 88.3 192zm102.9 0h193.6L288 435.3 191.2 192zM368 352l68.2-160h51.4L368 352z" />
                    </svg>
                </x-slot>
            </x-card-header>

            <x-sparkles :percentage="$collectableProgress">
                <x-progress-bar
                    label="Collectables Progress"
                    :value="$collectables->where('status', 'completed')->count()"
                    :total="$collectables->count()"
                    :percentage="$collectableProgress" />
            </x-sparkles>

            @foreach ($collectables as $ut)
            <x-item-row
                :title="$ut->trackable->name"
                :status="$ut->status" />
            @endforeach
        </x-card>

        <!-- // Trackables - Secrets -->
        <x-card>
            <x-card-header title="Secrets" subtitle="Hidden discoveries">
                <x-slot name="icon">
                    <svg width="35px" height="35px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 18h14M5 14h14l1-9-4 3-4-5-4 5-4-3 1 9Z" />
                    </svg>
                </x-slot>
            </x-card-header>

            <x-sparkles :percentage="$secretProgress">
                <x-progress-bar
                    label="Secrets Progress"
                    :value="$secrets->where('status', 'completed')->count()"
                    :total="$secrets->count()"
                    :percentage="$secretProgress" />
            </x-sparkles>

            @foreach ($secrets as $ut)
            <x-item-row
                :title="$ut->trackable->name"
                :status="$ut->status" />
            @endforeach
        </x-card>
    </div>
</body>

</html>