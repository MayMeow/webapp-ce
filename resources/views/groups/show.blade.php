@extends ('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'pTop-5rem')

@inject('markdown', 'Parsedown')

@section ('content')

<div class="row">
    <div class="col-md-12 text-center">
    <div class="text-right">
    @auth
    @if (Auth::user()->id == $group->user_id)
        <a class="btn btn-light my-2 my-sm-0" href="#">Edit</a>
    @endif
    @endauth
    </div>
        <h2 style="font-weight: 300" class="has-emoji">{{ $group->name }}</h2>
        <p class="lead has-emoji">{{ $group->description }}</p>
    </div>
</div>

<ul class="nav nav-tabs nav-links" style="margin-bottom: 7px">
    <li class="nav-item">
    <a class="nav-link active" href="#">Projects</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="#">Epics</a>
    </li>
</ul>

@auth
@if (Auth::user()->id == $group->user_id)
<div class="d-flex flex-row">
    <div class="ml-auto">
        <form class="form-inline" action="/groups/{{ $group->id }}/projects" method="post">
        {{ csrf_field() }}
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" id="project_id" name="project_id" placeholder="Enter project id">
            </div>
            <button type="submit" class="btn btn-outline-secondary mb-2">Add Project to group</button>
        </form>
    </div>
</div>
@endif
@endauth

<div class="row text-center loading" v-if="loading">
    <div class="col">
        <div class="loader" style="margin:0 auto;"></div>
    </div>
</div>

<group-projects-table-component group-id="{{ $group->id }}"></group-projects-table-component>

@endsection