<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    public function todos(){
        return $this->hasMany(Todo::class);
    }
}
