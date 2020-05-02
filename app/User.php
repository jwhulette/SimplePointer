<?php

namespace App;

use Illuminate\Foundation\Auth\User as Athenticatable;

class User extends Athenticatable
{
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
}
