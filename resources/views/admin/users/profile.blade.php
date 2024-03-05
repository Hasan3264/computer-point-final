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
        <div class="col-lg-4">
           <div class="card h-auto">
           <div class="card-header">
                <h3>User Name</h3>
            </div>

            <div class="card-body">
                 <form action="{{route('update.name')}}" method="POST">
                     @csrf
                     <div class="form-group">
                         <label for="" class="form-label">name</label>
                          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                          @error('name')
                              <p class="alert alert-danger">Name Not Valid</p>
                          @enderror
                     </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                 </form>
            </div>
           </div>
        </div>


        <div class="col-lg-4">
           <div class="card h-auto">
           <div class="card-header">
                <h3>User Password</h3>
            </div>

            <div class="card-body">
                 <form action="{{route('update.password')}}" method="POST">
                     @csrf
                     @if (session('updated_pass'))
                      <strong class="text-danger pt-3">{{session('updated_pass')}}</strong>
                     @endif
                     <div class="form-group">
                         <label for="" class="form-label">Current Password</label>
                          <input type="password" class="form-control" name="old_password">
                          @if (session('wrong_pass'))
                           <strong class="text-danger pt-3">{{session('wrong_pass')}}</strong>
                          @endif
                          @error('old_password')
                          <strong class="text-danger pt-3">{{$message}}</strong>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <p class="alert alert_danger">password Not Valid</p>
                            @enderror
                            @if (session('exiest_pass'))
                             <strong class="text-danger pt-3">{{session('exiest_pass')}}</strong>
                            @endif
                          @error('password')
                          <strong class="text-danger pt-3">{{$message}}</strong>
                          @enderror
                          </div>
                          <div class="form-group">
                          <label for="" class="form-label">Confirm Password</label>
                          <input type="password" class="form-control" name="password_confirmation">
                          @error('password_confirmation')
                          <strong class="text-danger pt-3">{{$message}}</strong>
                          @enderror
                     </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                 </form>
            </div>
           </div>
        </div>
        <div class="col-lg-4">
           <div class="card h-auto">
           <div class="card-header">
                <h3>User Photo</h3>
            </div>

            <div class="card-body">
                 <form action="{{route('photo.update')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                         <label for="" class="form-label">Update Photo</label>
                          <input type="file" class="form-control" name="profile_photo" placeholder="Your Photo">
                          @if (session('profile_photo'))
                           <strong class="text-danger pt-3">{{session('profile_photo')}}</strong>
                          @endif
                     </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                 </form>
            </div>
           </div>
        </div>
    </div>
</div>

@endsection
@section('fotter_js')
<!-- <script>
    $(document).ready(function(){
         $('.update').click(function(){
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
</script> -->
@if (session('Updated'))
  <script>
      Swal.fire(
    'Updated!',
    '{{session('Updatename')}}',
    'success'
   )
  </script>
@endif
@if (session('update_photo_f'))
  <script>
      Swal.fire(
    'Updated!',
    '{{session('update_photo_f')}}',
    'success'
   )
  </script>
@endif
@if (session('update_photo'))
  <script>
      Swal.fire(
    'Updated!',
    '{{session('update_photo')}}',
    'success'
   )
  </script>
@endif
@if (session('updated_pass'))
  <script>
      Swal.fire(
    'Updated!',
    '{{session('updated_pass')}}',
    'success'
   )
  </script>
@endif


@endsection
