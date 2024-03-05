@extends('layouts.dashboard')
@section('home1')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">sub_category</a></li>
    </ol>
</div>
<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>COLORS</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Color Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($colors as $key=> $color)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td><span style="padding:5px 5px; border:1px solid white; border-radius:30px; color:white; background-color:#{{ $color->color_code }}">
                            {{ $color->color_name }}</span></td>
                        <td>
                              <button value="{{route('color.delete', $color->id)}}" type="button"  class="btn btn-danger delete">Delete</button>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>add color</h3>
            </div>
            <div class="card-body">
                <form action="{{route('insert.color')}}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="" class="form-label">Color Name</label>
                        <input type="text" class="form-control" name="color_name">
                    </div>
                    <div class="mt-3">
                        <label for="" class="form-label">Color code</label>
                        <input type="text" class="form-control" name="color_code">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="row">

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Sizes</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sl</th>
                        <th>Size Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($sizes as $key=> $size)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $size->size_name }}</td>
                        <td>
                            <button value="{{route('size.delete', $size->id)}}" type="button"  class="btn btn-danger delete">Delete</button>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>add Size</h3>
            </div>
            <div class="card-body">
                <form action="{{route('insert.size')}}" method="POST">
                    @csrf
                    <div class="mt-3">
                        <label for="" class="form-label">size Name</label>
                        <input type="text" class="form-control" name="size_name">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
@section('fotter_js')
@if (session('success'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session('
        success ')}}',
        showConfirmButton: false,
        timer: 1500
    })
        Swal.fire(
    'done!',
    '{{session('success')}}',
    'success'
    )

</script>
@endif
@if (session('deleted'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{session('
        deleted ')}}',
        showConfirmButton: false,
        timer: 1500
    })
        Swal.fire(
    'done!',
    '{{session('update')}}',
    'deleted'
    )

</script>
@endif

<script>
    $(document).ready(function(){
         $('.delete').click(function(){
            var link=$(this).val();
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

@endsection
