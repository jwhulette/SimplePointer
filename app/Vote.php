<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;

class Vote extends Model
{
    use GeneratesUuid;

    protected $casts = [
        'room_id' => EfficientUuid::class,
        'player_id' => EfficientUuid::class,
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'votes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the room the votes belong to.
     */
    public function room()
    {
        return $this->hasOne(Room::class, 'uuid', 'room_id');
    }

    /**
     * Get the room the votes belong to.
     */
    public function player()
    {
        return $this->hasOne(Player::class, 'uuid', 'player_id');
    }
}
