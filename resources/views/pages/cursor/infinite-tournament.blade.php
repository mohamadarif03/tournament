@php
    use App\Enums\ProductStatusEnum;
    use App\Enums\UserRoleEnum;
    use App\Helpers\CurrencyHelper;
    use App\Helpers\RatingHelper;
    use App\Helpers\UserHelper;
@endphp
@foreach ($tournamentlist as $tournament)
    <a href="{{ route('tournament-detail', $tournament->id) }}" class="loopTournament row justify-content-center">
        <div class="tournament__box-wrap" style="padding-bottom: 30px">
            <svg class="main-bg" x="0px" y="0px" viewBox="0 0 357 533" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M2.00021 63H103C103 63 114.994 62.778 128 50C141.006 37.222 168.042 13.916 176 10C183.958 6.084 193 1.9 213 2C233 2.1 345 1 345 1C347.917 1.66957 350.51 3.33285 352.334 5.70471C354.159 8.07658 355.101 11.0093 355 14C355.093 25.1 356 515 356 515C356 515 357.368 529.61 343 530C328.632 530.39 15.0002 532 15.0002 532C15.0002 532 0.937211 535.85 1.00021 522C1.06321 508.15 2.00021 63 2.00021 63Z"
                    fill="#19222B" stroke="#4C4C4C" stroke-width="0.25" />
            </svg>
            <svg class="price-bg" viewBox="0 0 166 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M0.00792892 55V11C0.00792892 11 -0.729072 0.988 12.0079 1C24.7449 1.012 160.008 0 160.008 0C160.008 0 172.491 1.863 161.008 10C148.995 18.512 115.008 48 115.008 48C115.008 48 110.021 55.238 90.0079 55C69.9949 54.762 0.00792892 55 0.00792892 55Z"
                    fill="currentcolor" />
            </svg>
            <div class="tournament__box-price">
                <span class="sub">Slot</span>
                <span>{{ $tournament->slot }}</span>
            </div>
            <div class="tournament__box-countdown">
                <div class="coming-time font-bold text-xs">
                    {{ \Carbon\Carbon::parse($tournament->starter_at)->format('d F Y H:i') }}
                </div>


            </div>
            <div class="tournament__box-caption">
                <h4 class="title" style="font-size: 20px">{{ $tournament->name }}
                </h4>
            </div>
            <ul class="tournament__box-list list-wrap mb-3">
                <li class="flex justify-center">
                    <img src="{{ asset('storage/' . $tournament->live_image_url) }}"
                        style="min-height: 50px; min-width:100px; max-height:100px; max-width: 200px" alt="img">
                </li>
            </ul>
            <div class="tournament__box-prize" style="height: 20px">
                <i class="fas fa-trophy"></i>
                <span class="text-sm">Rp.
                    {{ number_format($tournament->price_pool, 0, ',', '.') }}</span>
            </div>
            <div class="font-bold text-sm flex justify-center mb-2">
                <span class="cursor-pointer bg-[#ffbe18] text-sm font-medium px-2.5 py-0.5 rounded"
                    style="color: white">By: {{ $tournament->user->name }}</span>
            </div>
        </div>
    </a>
@endforeach
