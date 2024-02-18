<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * App\Card.
 *
 * @property int $id
 * @property string $description
 * @property Collection<int,mixed> $card_set
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Room> $rooms
 * @property-read int|null $rooms_count
 * @method static Builder|Card newModelQuery()
 * @method static Builder|Card newQuery()
 * @method static Builder|Card query()
 * @method static Builder|Card whereCardSet($value)
 * @method static Builder|Card whereDescription($value)
 * @method static Builder|Card whereId($value)
 * @mixin Eloquent
 */
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
     * Get the rooms associated to the card set.
     *
     * @return HasMany<Room, $this>
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'card_id', 'id');
    }

    /**
     * Cast the return values.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'card_set' => 'collection',
        ];
    }
}
