<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    /**
     * Table Name: todo .Need to write it otherwise Laravel will assume DB name: todos
     */
    protected $table='todo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
