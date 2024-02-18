<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\RoomFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Room.
 *
 * @property mixed $uuid
 * @property string $name
 * @property int $card_id
 * @property string $last_used_at
 * @property-read Card|null $cardSet
 * @method static RoomFactory factory($count = null, $state = [])
 * @method static Builder|Room newModelQuery()
 * @method static Builder|Room newQuery()
 * @method static Builder|Room query()
 * @method static Builder|Room whereCardId($value)
 * @method static Builder|Room whereLastUsedAt($value)
 * @method static Builder|Room whereName($value)
 * @method static Builder|Room whereUuid($value)
 * @mixin Eloquent
 */
class Room extends Model
{
    /** @use HasFactory<RoomFactory> */
    use HasFactory;

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
    protected $table = 'rooms';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<int,string>
     */
    protected $guarded = [];

    /**
     * Get the cardset record associated with the room.
     *
     * @return HasOne<Card, $this>
     */
    public function cardSet(): HasOne
    {
        return $this->hasOne(Card::class, 'id', 'card_id');
    }
}
