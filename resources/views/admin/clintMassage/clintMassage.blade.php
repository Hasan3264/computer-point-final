@extends('layouts.dashboard')


@section('home1')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}

        </div>
    @endif

    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Components</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3>Category Name</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <table id="myTable" class="table table-bordered w-full">
                            <thead>
                                <tr>
                                    <td>Sl</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Subject</td>
                                    <td>Massage</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all as $key => $cat)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->email }}</td>
                                        <td>{{ $cat->subject }}</td>
                                        <td>{{ $cat->massge }}</td>
                                        <td>
                                            <a href="{{ route('del.massage', $cat->id) }}"
                                                class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
