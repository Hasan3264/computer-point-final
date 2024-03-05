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
                    <h3>Sub Category</h3>
                  </div>
                  <div class="card-body">
                        <form action="">
                            @csrf
                            <table class="table table-bordered">
                               <tr>
                                   <th>Sl</th>
                                   <th>Category name</th>
                                   <th>Sub category name</th>
                                   <th>Created at</th>
                                   <th>Action</th>
                               </tr>
                               @foreach ($subcategory as $key=> $sub)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                           @php
                                               if(App\Models\categoryadd::where('id', $sub->category_id)->exists()){
                                                echo $sub->rel_to_category->category_name;
                                               }else{
                                                   echo 'N\A';
                                               }
                                           @endphp
                                        </td>
                                        <td>{{$sub->subcategory_name}}</td>
                                        <td>{{ $sub->created_at->diffForHumans()}}</td>
                                        <td>
                                            <button value="{{route('sub.delete', $sub->id)}}" type="button" class="btn btn-danger shadow btn-xs sharp delete margin-top:3px;"><i class="fa fa-trash"></i></button>

                                            <a href="{{route('edit.subcategory', $sub->id) }}" class="btn btn-info shadow btn-xs sharp"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                               @endforeach

                            </table>
                        </form>
                  </div>
              </div>
        </div>
        <div class="col-lg-4 col-sm-4 m-auto" width="50">
              <div class="card">
                  <div class="card-header">
                       <h3>Sub Category Name</h3>
                  </div>
                  <div class="card-body">

                     <form action="{{ route('insert.subcategory') }}" method="POST">
                         @csrf
                         <div class="form-group">
                            <label for="" class="form-label">Select Category</label>
                             <select name="category_id" class="form-control">
                                 <option value="">-- select category --</option>
                                 @foreach($categoryes as  $subcategory)
                                   <option value="{{$subcategory->id}}">{{$subcategory->category_name}}</option>
                                 @endforeach
                             </select>
                             @error('category_id')
                                 <strong class="text-danger">{{ $message }}</strong>
                             @enderror
                         </div>
                         <div class="form-group">
                            <label for="" class="form-label">SubCategory name</label>
                            <input type="text" class="form-control" name="subcategory_name">
                            @if (session('exist'))
                            <strong class="text-danger">{{ session('exist') }}</strong>
                            @endif
                         </div>
                         @error('subcategory_name')
                         <strong class="text-danger">{{ $message }}</strong>
                         @enderror
                         <div class="form-group">
                           <button tupr="submit" class="btn btn-primary">Submit</button>
                         </div>
                     </form>
                  </div>
              </div>

        </div>
    </div>

@endsection
@section('fotter_js')

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



@if (session('success'))
    <script>
        Swal.fire(
    'done!',
    '{{session('success')}}',
    'success'
    )
    </script>
@endif
@endsection
