@extends('layouts.dashboard')

@section('home1')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Edit Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{route('update.permission')}}" mathod="POST">
                       @csrf
                       <div class="mb-4">
                        <input type="hidden" name="user_id" value="{{$user_info->id}}">
                       </div>
                       <div class="md-4">
                        <label for="">User</label>
                      
                        <input type="text" class="form-control" readonly value="{{$user_info->name}}">
                       </div>
                       <div class="mb-4 mt-2">
                        <label for="">Parmissions</label>
                       </div>
                        <div class="mb-4">
                            @foreach ($parmissions as $key=> $parmission)
                            <input type="checkbox" {{($user_info->hasPermissionTo($parmission->name))? "checked":''}} name="parmission[]"
                                value="{{$parmission->id}}">{{$parmission->name}}<br>
                            @endforeach
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
