@extends('layouts.dashboard')

@section('home1')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">sub_category</a></li>
    </ol>
</div>
{{--  --}}
<div class="row">
    <div class="col-lg-8">
        <div class="card h-auto">
            <div class="card-header">
                <h3>Role List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>sl</th>
                        <th>Role Name</th>
                        <th>Parmission</th>
                    </tr>
                    @foreach ($roles as $key=> $role)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$role->name}}</td>
                        <td>
                            <ul>
                                @foreach ($role->getPermissionNames() as $per)
                                <li>{{$per}}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
        <div class="card h-auto">
            <div class="card-header">
                <h3>User List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>sl</th>
                        <th>Role Name</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($users as $key=> $user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>  @foreach ($user->getRoleNames() as $rol)
                            <li>{{$rol}}</li>
                            @endforeach</td>
                        <td>  @foreach ($user->getAllPermissions() as $permissions)
                            <li>{{$permissions->name}}</li>
                            @endforeach</td>
                         <td><a href="{{route('edit.permition', $user->id)}}" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
      
    </div>
    <div class="col-lg-4">
        <div class="card h-auto">
            <div class="card-header">
                <h3>Add Parmission</h3>
            </div>
            <div class="card-body">
                <form action="{{route('add.parmission')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" class="form-control" name="parmission_name" placeholder="Parmission name">
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="rol2">
            <div class="card">
                <div class="card-header">
                    <h3>Add Role</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('add.role')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" class="form-control" name="role_name" placeholder="Role Name">
                        </div>
                        <div class="mb-4">
                            @foreach ($parmissions as $key=> $parmission)
                            <input type="checkbox" name="parmission[]"
                                value="{{$parmission->id}}">{{$parmission->name}}<br>
                            @endforeach
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="rol">
            <div class="card">
                <div class="card-header">
                    <h3>Assign Role to User</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('assign.role')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <select name="user_id" class="form-control">
                                <option value="">---- select user-------</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                 @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <select name="role_id" class="form-control">
                                <option value="">---- select role-------</option>
                                @foreach ($roles as  $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                 @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
