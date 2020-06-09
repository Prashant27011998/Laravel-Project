<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts';
    
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'pin',
        'created_at',
        'updated_at',
    ];
}
