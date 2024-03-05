@extends('layouts.dashboard')

@section('home1')
@can('edit-category')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Components</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Select2</a></li>
    </ol>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3>Update Category</h3>
                </div>

                <div class="card-body">
                    <form action="{{route('update.Cat')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="" clas="form-label">category Name</label>
                            <input type="hidden" class="form-control" name="id" value="{{$cat_info->id}}">
                            <input type="text" class="form-control" name="category_name"
                                value="{{$cat_info->category_add}}">
                            @error('category_name')
                            <strong class="text-danger">{{$message}}</strong>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary edit">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
 <div class="alert alert-warning">you have no parmission</div>
@endcan
@endsection
<!-- @section('fotter_js')
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
@if (session('delete'))
<script>
Swal.fire(
'Deleted!',
'{{session('delete')}}',
'success'
)
</script>
@endif



@endsection -->
