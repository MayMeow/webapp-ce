@extends ('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'mt-5 pt-3 mb-3')

@section('javascripts')
<script src="{{ mix('/js/mix/app.js') }}"></script>
@endsection

@section ('content')

<div class="row justify-content-center">
    <div class="col-9">
        
    <h1 class="display-4">Create group</h1>
    @include('elements.errors')

    <form action="/groups" method="post">

        {{ csrf_field() }}

        <div class="row">
            <div class="col-6">
                <div class="form-group row">
                    <label class="col-12 form-control-label" for="name">Name</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Group name">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-12 form-control-label" for="description">Description</label>
            <div class="col-12">
                <textarea class="form-control" id="descriptiont" name="description" rows="6" placeholder="Content.."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Create group</button>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection