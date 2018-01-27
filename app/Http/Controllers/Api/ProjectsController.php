<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\Repositories\Projects;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;

class ProjectsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Projects $projects)
    {
        $projects = $projects->orderBy('created_at', 'desc');

        return ProjectResource::collection($projects);
    }
}