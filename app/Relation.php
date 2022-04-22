<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    public function vote()
    {
        return $this->hasOne(App\Relation::class);
    }
}
