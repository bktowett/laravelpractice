<?php

namespace App;

use App\Mail\ProjectCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'owner_id'
    ];

    /*protected static function boot()
    {
        parent::boot();

        //code shall be exceuted only after a new project has been created
        static::created(function ($project) {
            //send mail when a new project is create
            Mail::to($project->owner->email)->queue(
                new ProjectCreated($project)
            );
        });
    }*/

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        return $this->tasks()->create($task);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
