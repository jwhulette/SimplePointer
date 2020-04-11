<?php

namespace App;

use App\Casts\Json;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cards';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

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
     * Cast the return values.
     *
     * @var array
     */
    protected $casts = [
        'card_set'   => 'collection',
    ];

    /**
     * Get the rooms associated to the card set.
     */
    public function rooms()
    {
        return $this->hasMany(Room::class, 'card_id', 'id');
    }
}
