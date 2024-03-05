@extends('layouts.dashboard')

@section('home1')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Components</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Select2</a></li>
    </ol>
</div>
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>User List</h3>
                    <h6>Total users {{$total_user}}</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>sl</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Created at</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($select as $key =>$users)
                            <tr>
                                <td>{{$select->firstitem()+$key}}</td>
                                <td>{{$users->name}}</td>
                                <td>{{$users->email}}</td>
                                <td>{{$users->created_at->diffForHumans()}}</td>
                                <td>
                                <a href="{{route('user.delete', $users->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$select->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
