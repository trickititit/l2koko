<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'text', 'desc', 'keywords', 'alias', 'type'
    ];
}
