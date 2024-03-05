@extends('layouts.dashboard')

@section('home1')
<div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Components</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Select2</a></li>
					</ol>
</div>
<div class="container">
     <div class="row">
        <div class="col-lg-8 col-sm-8 m-auto">
            <div class="card">
                <div class="card-header">
                     <h3>Sub Category Name</h3>
                </div>
                <div class="card-body">

                   <form action="{{ route('update.subcategory') }}" method="POST">
                       @csrf
                       <div class="form-group">
                          <label for="" class="form-label">Select Category</label>
                           <select name="category_id" class="form-control">
                               <option value="">-- select category --</option>
                               @foreach($categoryes as  $subcategory)
                                 <option value="{{$subcategory->id}}" {{($subcategory->id == $subcategory_info->category_id?'selected':'')}}>{{$subcategory->category_name}}</option>
                               @endforeach
                           </select>
                           @error('category_id')
                               <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                       </div>
                       <div class="form-group">
                          <label for="" class="form-label">SubCategory name</label>
                          <input type="hidden" class="form-control" name="subcategory_id" value="{{ $subcategory_info->id}}">
                          <input type="text" class="form-control" name="subcategory_name" value="{{ $subcategory_info->subcategory_name }}">
                          @if (session('exist'))
                          <strong class="text-danger">{{ session('exist') }}</strong>
                          @endif
                       </div>
                       @error('subcategory_name')
                       <strong class="text-danger">{{ $message }}</strong>
                   @enderror
                       <div class="form-group">
                         <button tupr="submit" class="btn btn-primary">Update</button>
                       </div>
                   </form>
                </div>
            </div>

      </div>
     </div>
</div>
@endsection
{{-- @section('fotter_js')
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


@endsection  --}}
