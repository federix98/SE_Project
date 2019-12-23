<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function degree_group() {
        return $this->belongsTo(degree_group::class);
    }

    public function teachings() {
        return $this->hasMany(teaching::class);
    }
}
