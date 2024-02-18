<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
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
     * The attributes that aren't mass assignable.
     *
     * @var array<int,string>
     */
    protected $guarded = [];

    /**
     * Cast the return values.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'card_set' => 'collection',
    ];

    /**
     * Get the rooms associated to the card set.
     *
     * @return HasMany<Room>
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'card_id', 'id');
    }
}
