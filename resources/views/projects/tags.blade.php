@extends ('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'pTop-5rem')

@section ('content')
<h1 class="h2" style="font-weight: 300">
<i class="far fa-book"></i>
    {{ $project->name }}<small> by {{ $project->user->name }}</small>
</h1>

<div class="row">
    <div class="col-12">
        <p class="lead has-emoji">{{ $project->description }}</p>
    </div>

</div>

<div class="row" style="margin-bottom: 3rem">
    <div class="col-2">
    @include('projects.elements.sidebar')
    </div>
    <div class="col-10">

        @if (null != $tags)
        <div class="row">
            <div class="col-12">
                <div class="card border-secondary">
                    <div class="card-header">
                        Tags
                    </div>
                    <table class="table table-hover">
                       @foreach ($tags as $tag)

                        <tr>
                            <td>
                                {{ $tag->getName() }}
                            </td>
                            <td><a href="#">{{ $tag->getSha() }}</a></td>
                        </tr>


                       @endforeach
                   </table>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
