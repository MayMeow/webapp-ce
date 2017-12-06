@extends('layouts.master')

@section ('layout-main-classes', 'container')
@section ('layout-body-classes', 'pTop-5rem')

@section('content')

<h1 class="h2" style="font-weight: 300">{{ $user->name }}</h1>
<p class="lead">{{ $user->email }}, Member from: {{ $user->created_at->diffForHumans() }}</p>

<div class="card" style="margin-bottom: 20px">
    <div class="card-header">
        Assigned roles
    </div>
    <table class="table table-vcenter">
        @foreach($user->roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->label }}</td>
            <td><a href="" class="text-danger">Remove</a></td>
        </tr>
        @endforeach
    </table>
</div>

<div class="card">
    <div class="card-body">
        <form class="" action="/admin/users/{{ $user->id }}/roles" method="post">

            {{ csrf_field() }}

            <div class="form-group row">
                <div class="col-12">
                    <label for="permission">Assign role</label>
                </div>
                <div class="col-9">
                    <select class="form-control" name="role_name" id="role_name">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Give permission</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
