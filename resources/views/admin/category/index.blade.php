

@extends('layouts.dashboard')


@section('home1')
@if(session()->has('message'))
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
    <div class="col-lg-8 col-sm-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Category Name</h3>
            </div>
            <div class="card-body">
                <form action="{{route('mark.delete')}}" method="POST">
                    @csrf
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input id="checkAll" type="checkbox">mark all
                                </th>
                                <td>Sl</td>
                                <td>added by</td>
                                <td>category name</td>
                                <td>ceated at</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($selectcat as $key=> $cat)
                            <tr>

                                <td>
                                    <input type="checkbox" class="xx" name="mark[]" value="{{$cat->id}}">
                                </td>
                                <td>{{$key+1}}</td>
                                <td>
                                    @php
                                    if(App\Models\User::where('id', $cat->user_id)->exists()){
                                    echo $cat->relation_user->name;
                                    }
                                    else{
                                    echo 'N\A';
                                    }
                                    @endphp
                                </td>
                                <td>{{$cat->category_name}}</td>
                                <td>{{$cat->created_at->diffForHumans()}}</td>
                                <td>
                                    <button value="{{route('cat.softdelete', $cat->id)}}" type="button"
                                        class="btn btn-danger shadow btn-xs sharp delete"><i
                                            class="fa fa-trash"></i></button>
                                    <a href="{{route('cat.edit', $cat->id)}}"
                                        class="btn btn-info shadow btn-xs sharp"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class='btn btn-danger'>Delete All</button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-lg-4 ">
        <div class="card h-auto">
            <div class="card-header">
                <h3>Add category</h3>
            </div>
            <!-- @if(session('seccess'))
                <div class="alart">

                </div>
            @endif -->

            <div class="card-body">
                <form action="{{route('insert.catagory')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="" clas="form-label">category Name</label>
                        <input type="text" class="form-control" name="category_name">
                        @error('category_name')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-10">
        <div class="card m-auto">
            <div class="card-header">
                <h3>Tresh Counter</h3>
                <p>deleted cetegoryes</p>
            </div>

            <div class="card-body">
                <form action="{{route('mart.restoreall')}}" method="POST">
                    @csrf
                    <table  class="table table-bordered">
                        <thead>
                            <tr>
                                <td><input id="trash_mark" type="checkbox">mark all</td>
                                <td>Sl</td>
                                <td>added by</td>
                                <td>category name</td>
                                <td>ceated at</td>
                                <td>Deleted at</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trash_cat as $key=> $trash)
                            <tr>

                                <td> <input type="checkbox" class="xxy" name="mark[]" value="{{$trash->id}}"></td>
                                <td>{{$key+1}}</td>
                                <td> @php
                                    if(App\Models\User::where('id', $trash->user_id)->exists()){
                                    echo $trash->relation_user->name;
                                    }
                                    else{
                                    echo 'N\A';
                                    }
                                    @endphp</td>
                                <td>{{$trash->category_name}}</td>
                                <td>{{$trash->created_at->diffForHumans()}}</td>
                                <td>{{$trash->deleted_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('cat.restore', $trash->id)}}"
                                        class="btn btn-success shadow btn-xs sharp mt-2">Re</a>
                                    <button value="{{route('cat.delete', $trash->id)}}" type="button"
                                        class="btn btn-danger shadow btn-xs sharp delete margin-top:3px;"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class='btn btn-primary'>Restore all</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection




@section('fotter_js')
<script>
    //  let table = new DataTable('#myTable');
</script>
<script>
    $(document).ready(function () {
        $('.delete').click(function () {
            var link = $(this).val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;

                }
            })
        })
    });

</script>
@if (session('delete'))
<script>
    Swal.fire(
        'Deleted!',
        '{{session('
        delete ')}}',
        'success'
    )

</script>
@endif


@if(session('succes'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '{{session('
        success ')}}'
    })

</script>
@endif

<!--=======------==== checked all js=========-----======== -->
<script>
    $("#checkAll").click(function () {
        $('.xx').not(this).prop('checked', this.checked);
    });

</script>

<script>
    $("#trash_mark").click(function () {
        $('.xxy').not(this).prop('checked', this.checked);
    });

</script>

@if (session('alldelete'))
<script>
    Swal.fire(
        'Deleted!',
        '{{session('
        delete ')}}',
        'success'
    )

</script>
@endif

@if (session('allrestore'))
<script>
    Swal.fire(
        'Deleted!',
        '{{session('
        allrestore ')}}',
        'success'
    )

</script>
@endif
<!-- ======== checked all js end=============== -->
@endsection
