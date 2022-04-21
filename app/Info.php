<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table="zzz";
    protected $primaryKey="id";
    protected $fillable = [
        'id',
        'email',
        'attendance',
        'approved_requests'
    ];
    
}
