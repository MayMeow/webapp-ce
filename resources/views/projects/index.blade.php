@extends ('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'pTop-5rem')

@section ('projects-table')
<div class="row text-center loading" v-if="loading">
    <div class="col">
        <h3 style="font-weight: 300">Thinking ...</h3>
    </div>
</div>
<projects-table-component></projects-table-component>
@endsection

@section ('content')
<h1 class="h2" style="font-weight: 300">Projects</h1>
<div class="row" style="margin-bottom: 10px">
    <div class="col-12 text-right">
    <a href="/projects/create" class="btn btn-success">Create project</a>
    </div>
</div>



@yield ('projects-table')



@endsection
