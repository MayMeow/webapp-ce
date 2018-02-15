@extends ('layouts.master-with-sidebar')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'mt-5 pt-3 mb-3')

@section ('sidebar-content')
@include('projects.elements.sidebar')
@endsection

@section('javascripts')
<script src="{{ mix('/js/mix/projects/bundle.js') }}"></script>
@endsection

@section ('content')
<h1 class="h2" style="font-weight: 300">
    <svg class="octicon" width="24px" height="32px" viewBox="0 0 12 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <!-- Generator: Sketch 40.3 (33839) - http://www.bohemiancoding.com/sketch -->
        <title>repo</title>
        <desc>Created with Sketch.</desc>
        <defs></defs>
        <g id="Octicons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="repo" fill="#000000">
                <path d="M4,9 L3,9 L3,8 L4,8 L4,9 L4,9 Z M4,6 L3,6 L3,7 L4,7 L4,6 L4,6 Z M4,4 L3,4 L3,5 L4,5 L4,4 L4,4 Z M4,2 L3,2 L3,3 L4,3 L4,2 L4,2 Z M12,1 L12,13 C12,13.55 11.55,14 11,14 L6,14 L6,16 L4.5,14.5 L3,16 L3,14 L1,14 C0.45,14 0,13.55 0,13 L0,1 C0,0.45 0.45,0 1,0 L11,0 C11.55,0 12,0.45 12,1 L12,1 Z M11,11 L1,11 L1,13 L3,13 L3,12 L6,12 L6,13 L11,13 L11,11 L11,11 Z M11,1 L2,1 L2,10 L11,10 L11,1 L11,1 Z" id="Shape"></path>
            </g>
        </g>
    </svg>
    {{ $project->name }}<small> by {{ $project->user->profile->name }}</small>
</h1>

<div class="row">
    <div class="col-12"><p class="lead has-emoji">Merge requests</p></div>
</div>
<div class="row">
    <div class="col-2">
        @include('projects.elements.sidebar')
    </div>
    <div class="col-10">

        <div class="row" style="margin-bottom: 10px">
            <div class="col-12 text-right">
            <a href="/projects/{{ $project->id }}/merge-requests/new" class="btn btn-success">Create new request</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-vcenter">
                    @foreach ($project->mergeRequests as $mergeRequest)
                    <tr>
                        <td>#{{ $mergeRequest->id }} <a href="/merge-requests/{{ $mergeRequest->id }}" style="font-weight: 600" class="text-dark">{{ $mergeRequest->title }}</a> by {{ $mergeRequest->user->name }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>



    </div>
</div>


@endsection
