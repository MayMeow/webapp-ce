@extends ('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'pTop-5rem')

@section ('content')
<h1 class="display-4">Roles</h1>
<div class="row">
    <div class="col-2">
        @include('admin.sidebar')
    </div>

    <div class="col-10">
        <form class="" action="/admin/roles" method="post">

            {{ csrf_field() }}

            <div class="form-group row">
                <label class="col-12 form-control-label" for="name">Name</label>
                <div class="col-9">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Role name">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-12 form-control-label" for="name">Label</label>
                <div class="col-9">
                    <input type="text" class="form-control" id="label" name="label" placeholder="Role label">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create role</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
