<?php

namespace App;

use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Foundation\Auth\User as Athenticatable;

class User extends Athenticatable
{
    use GeneratesUuid;

    protected $casts = [
        'id' => EfficientUuid::class,
        'room_id' => EfficientUuid::class,
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

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
     * Set the uuid columns.
     *
     * @return array
     */
    public function uuidColumns(): array
    {
        return ['id', 'room_id'];
    }
}
