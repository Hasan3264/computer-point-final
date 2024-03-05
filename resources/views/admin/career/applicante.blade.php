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
                <form action="" method="POST">
                    @csrf
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Sl</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Expected Sellary</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all as $key=> $cat)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->email}}</td>
                                <td>{{$cat->Expected_salary}}</td>
                                <td>
                                    <a href="{{route('del.app',$cat->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-info shadow btn-xs sharp" href="{{route('cv.download',$cat->id)}}">CV</a>
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
