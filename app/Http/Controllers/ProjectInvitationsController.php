<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use App\Http\Requests\ProjectInvitationRequest;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project, ProjectInvitationRequest $request)
    {
    	$project->invite(User::whereEmail(request('email'))->first());

    	return redirect($project->path());
    }
}
