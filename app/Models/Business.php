<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    // protected fillables
    protected $fillable = [
        'name',
        'slug',
        'type',
        'currency',
        'active'
    ];

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('role');
    }
}
