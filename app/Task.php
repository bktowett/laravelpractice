<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'completed','description'
    ];
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function complete($completed = true)
    {
        return $this->update(['completed'=> $completed]);
        /*return $task->update([
            'completed' => $request->has('completed')
        ]);*/
    }

    public function incomplete(){
        return $this->complete(false);
    }
}
