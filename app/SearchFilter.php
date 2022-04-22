<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchFilter extends Model
{
    protected $table="zzz";
protected $primaryKey="id ";

public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('email', 'like', '%' .$searchTerm. '%')
                     ->orWhere('Designation', 'like', '%' .$searchTerm. '%');
    }
}
