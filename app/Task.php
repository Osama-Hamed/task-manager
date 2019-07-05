<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $touches = ['project'];
    protected $casts = ['completed' => 'boolean'];

    public function project()
    {
    	return $this->belongsTo(Project::class);
    }

    public function path()
    {
    	return "{$this->project->path()}/tasks/{$this->id}";
    }

    public function complete()
    {
        $this->setDescription('completed_task');

        $this->update(['completed' => true]);
    }

    public function incomplete()
    {
        $this->setDescription('incompleted_task');

        $this->update(['completed' => false]);
    }

    protected function setDescription($description)
    {
        $status = $this->completed;

        $status == request('completed') ? $this->recordActivity('updated_task') : $this->recordActivity($description);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    public function recordActivity($description)
    {
        $this->activity()->create([
            'user_id' => $this->project->owner_id,
            'project_id' => $this->project_id,
            'description' => $description
        ]);
    }
}
