<?php

namespace App\Services;

use App\Base\Interfaces\uploads\CustomUploadValidation;
use App\Base\Interfaces\uploads\ShouldHandleFileUpload;
use App\Contracts\Interfaces\HomeTournamentListInterface;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\TournamentRequest;
use App\Http\Requests\TournamentUpdateRequest;
use App\Models\Team;
use App\Models\Tournament;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Pagination\Cursor;
use Illuminate\Support\Facades\Storage;

class TournamentService implements ShouldHandleFileUpload, CustomUploadValidation
{
    use UploadTrait;

    private HomeTournamentListInterface $tournamentlist;


    public function __construct(HomeTournamentListInterface $tournamentlist)
    {
        $this->tournamentlist = $tournamentlist;
    }
    /**
     * Handle custom upload validation.
     *
     * @param string $disk
     * @param object $file
     * @param string|null $old_file
     * @return string
     */
    public function validateAndUpload(string $disk, object $file, string $old_file = null): string
    {
        if ($old_file) $this->remove($old_file);

        return $this->upload($disk, $file);
    }

    
    /**
     * Handle store data event to models.
     *
     * @param TeamRequest $request
     *
     * @return array|bool
     */
    public function store(TournamentRequest $request): array|bool
    {
        $data = $request->validated();

        $live_image_url = $this->upload(UploadDiskEnum::TOURNAMENT->value, $request->file('live_image_url'));

        return [
            'name' => $data['name'],
            'description' => $data['description'],
            'completed_at' => $data['completed_at'],
            'slot' => $data['slot'],
            'price_pool' => $data['price_pool'],
            'game_id' => $data['game_id'],
            'starter_at' => $data['starter_at'],
            'location' => $data['location'],
            'registration_fee' => $data['registration_fee'],
            'live_image_url' => $live_image_url
        ];
    }

    /**
     * Handle update data event to models.
     *
     * @param TeamUpdateReqyyest $request
     * @param Team $team
     * @return array|bool
     */

    public function update(TournamentUpdateRequest $request, Tournament $tournament): array|bool
    {
        $data = $request->validated();

        $old_image = $tournament->live_image_url;

        if ($request->hasFile('live_image_url')) {
            $this->remove($old_image);
            $old_image = $request->file('live_image_url')->store(UploadDiskEnum::TOURNAMENT->value, 'public');
        }
        return [
            'name' => $data['name'],
            'description' => $data['description'],
            'completed_at' => $data['completed_at'],
            'slot' => $data['slot'],
            'price_pool' => $data['price_pool'],
            'game_id' => $data['game_id'],
            'starter_at' => $data['starter_at'],
            'is_open_signup' => $data['is_open_signup'],
            'location' => $data['location'],
            'registration_fee' => $data['registration_fee'],
            'live_image_url' => $old_image,
        ];
    }

    public function HandleTournamentFilter(Request $request): array
    {
        $nextCursor = $request->query('nextCursor') ? Cursor::fromEncoded($request->query('nextCursor')) : null;

        $tournamentlist = $this->tournamentlist->cursorPaginate(15, ['*'], 'cursor', $nextCursor, $request);

        if ($tournamentlist->hasMorePages()) $nextCursor = $tournamentlist->nextCursor()->encode();

        return [
            'tournamentlist' => $tournamentlist,
            'nextCursor' => $nextCursor
        ];
    }

}
