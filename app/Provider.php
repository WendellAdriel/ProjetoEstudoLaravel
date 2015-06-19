<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * No timestamps for provider
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable fields for a Provider
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'copyright_email'
    ];
}
