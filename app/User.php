<?php

namespace App;

use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Foundation\Auth\User as Athenticatable;

class User extends Athenticatable
{
    use GeneratesUuid;

    protected $casts = [
        'uuid' => EfficientUuid::class,
        'room_id' => EfficientUuid::class,
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Set the uuid columns.
     *
     * @return array
     */
    public function uuidColumns(): array
    {
        return ['uuid', 'room_id'];
    }
}
