<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Workhorse;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'user_id', 'slug'];

    public function user() // $project->user->name
    {
        return $this->belongsTo(User::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    public function mergeRequests()
    {
        return $this->hasMany(MergeRequest::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function createPage(Page $page)
    {
        return $this->pages()->save($page);
    }

    public function scopePrivate($query)
    {
        return $query->where('private', 1);
    }

    // for example App\Project::public()->get() or App\Project::public()->where('namespace_id',1)->get()
    public function scopePublic($query)
    {
        return $query->where('private', 0);
    }

    public function createOnServer()
    {
        $user = User::find($this->user_id);
        try {
            $unicorn = new Workhorse();
            $response = $unicorn
                ->setAction('git:init:bare')
                ->setData([
                    'hooks' => Repo::hooks(),
                    'path' => Repo::path($user->username, $this->slug)
                ])->run();
        } catch (\Exception $e) {
            dd($e);
            $response = null;
            report($e);
        }

        if (null != $response && (json_decode($response))->code == 200) {
            $this->created = true;
            $this->save();
        }
    }
}
