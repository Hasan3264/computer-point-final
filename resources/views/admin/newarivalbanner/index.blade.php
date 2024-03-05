@extends('layouts.dashboard')
@section('home1')
    <div class="cantainer">
        <div class="row">
            <div class="col-lg-7">
                 <table class="table table-bordered">
                     <tr>
                        <th>sl</th>
                        <th>Title 1</th>
                        <th>Title 2</th>
                        <th>Title 3</th>
                        <th>Details</th>
                        <th>Photo</th>
                        <th>Action</th>
                        <th>Active status</th>
                     </tr>
                     @foreach ($getbanners as $key=> $item)
                     <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$item->title1}}</td>
                          <td>{{$item->title2}}</td>
                          <td>{{$item->title3}}</td>
                          <td>{{$item->details}}</td>
                          <td width="80"><img class="img-fluid" src="{{asset('/uploads/arivalbanner')}}/{{ $item->photo }}" alt="No"></td>
                          <td>
                          <a href=""  type="button" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                          <a href="" class="btn btn-info shadow btn-xs sharp mt-2"><i class="fa fa-pencil"></i></a>
                          </td>
                          <td>
                            @if ($item->active_status == 1)
                            <a href="{{route('arivalbanner.status', $item->id)}}" class="btn btn-sm btn-success">Active</a>
                            @else
                            <a href="{{route('arivalbanner.status', $item->id)}}" class="btn btn-sm btn-danger">Dective</a>
                        @endif
                           </td>
                        </tr>
                     @endforeach

                 </table>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                       <h3>add banner</h3>
                    </div>
                    <div class="card-body">
                       <form action="{{route('add.arival')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                             <input type="text" class="form-control" name="title1" placeholder="type title1">
                        </div>
                        <div class="form-group">
                             <input type="text" class="form-control" name="title2" placeholder="type title2">
                        </div>
                        <div class="form-group">
                             <input type="text" class="form-control" name="title3" placeholder="type title3">
                        </div>
                        <div class="form-group">
                             <input type="text" class="form-control" name="details" placeholder="type details">
                        </div>
                         <div class="form-group">
                                <label for="">Add Photo</label>
                               <input type="file" name="photo" class="form-control">
                         </div>
                         <button type="submit" class="btn btn-primary">submit</button>
                       </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@section('name')
    
@if (session('update'))
<script>
    Swal.fire({
 position: 'top-end',
 icon: 'success',
 title: '{{session('update')}}',
 showConfirmButton: false,
 timer: 1500
})
</script>
@endif
@endsection

