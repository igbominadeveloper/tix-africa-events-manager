<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $primaryKey = 'id';

    protected $casts = [
        'activeDate' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'description',
        'freemium',
        'activeDate',
        'createdBy'
    ];
}
