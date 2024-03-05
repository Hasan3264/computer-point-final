@extends('layouts.dashboard')

@section('home1')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Spacification</a></li>
        </ol>
    </div>
    {{--  --}}
    <div class="row">
        <div class="col-lg-8">
            <div class="card h-auto">
                <div class="card-header">
                    <h3>spec List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>sl</th>
                            <th>Name</th>
                            <th>SpacCate</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($specific as $key => $role)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->relation_specCat->name }}</td>
                                <td>
                                    <a href=""  type="button" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>

                                    <a href="" class="btn btn-info shadow btn-xs sharp mt-2"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Specific</h3>
                </div>
                @include('components.success')
                <div class="card-body">
                    <form action="{{route('add.Spacific')}}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label>Add Specific</label>
                            <input required type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Specific Category</label>

                            <select required name="catid" class="form-control">
                                @foreach (App\Models\specificscategory::all() as $key => $speccat)
                                <option value="{{$speccat->id}}">{{$speccat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="card h-auto">
                <div class="card-header">
                    <h3>Spac Category List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>sl</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach (App\Models\specificscategory::all() as $key => $Cat)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $Cat->name }}</td>
                                <td>
                                    <a href=""  type="button" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>

                                    <a href="" class="btn btn-info shadow btn-xs sharp mt-2"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Specific Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('add.SpacCategory')}}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label>Add Specific Category</label>
                            <input required type="text" class="form-control" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">
            <div class="card h-auto">
                <div class="card-header">
                    <h3>Spac Value List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>sl</th>
                            <th>Name</th>
                            <th>Spac</th>
                            <th>Action</th>
                        </tr>
                        @foreach (App\Models\spacvalue::all() as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->relation_spec->name }}</td>
                                <td>
                                    <a href=""  type="button" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>

                                    <a href="" class="btn btn-info shadow btn-xs sharp mt-2"><i class="fa fa-pencil"></i></a></td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Specific Value</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('add.specValue')}}" method="POST">
                        @csrf
                        <div class="form-group mt-2">
                            <label>Add Specific</label>

                            <select required name="spec" id="" class="form-control">
                                @foreach ($specific as $key => $spec)
                                 <option value="{{$spec->id}}">{{$spec->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Specific Value</label>
                            <input required type="text" class="form-control" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
