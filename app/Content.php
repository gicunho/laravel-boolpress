<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}