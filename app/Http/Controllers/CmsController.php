<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Page;

class CmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Project $project)
    {
        if (license_check('pages') == false) abort(403, 'License required');

        return view('cms.index', compact('project'));
    }

    public function create(Project $project)
    {
        if (license_check('pages') == false) abort(403, 'License required');

        return view('cms.pages.create', compact('project'));
    }

    public function edit(Page $page)
    {
        return ('cms.pages.edit');
    }

    public function store(Project $project)
    {
        if (license_check('pages') == false) abort(403, 'License required');
        
        $project->createPage(new Page([
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'description' => request('description'),
            'user_id' => auth()->user()->id
        ]));
        
        return back();
    }
}
