<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'id', 'name',
    ];

    public function tasks() {

        return $this->hasMany('App\Task', 'project_id', 'id');
    }

    public function participants() {
        return $this->belongsToMany(User::class, 'project_participants');
    }
}
