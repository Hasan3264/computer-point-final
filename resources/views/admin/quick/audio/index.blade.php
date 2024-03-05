@extends('layouts.dashboard')
@section('home1')
    <div class="cantainer">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                       <h3>Add Audio</h3>
                    </div>
                    <div class="card-body">
                       <form action="{{route('add.audio')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                             <input type="text" class="form-control" name="name" placeholder="type name">
                        </div>
                         <div class="form-group">
                                <label for="">Add Audio Photo</label>
                               <input type="file" name="audio_photo" class="form-control">
                         </div>
                         <button type="submit" class="btn btn-primary">submit</button>
                       </form>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-5">
                   <div class="card">
                    <div class="card-header">
                         <h3>Add audio list</h3>
                    </div>
                    <div class="card-body">
                              <form action="{{route('add.audiolist')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">List</label>
                                    <input type="text" name="audio_list" class="form-control">
                                </div>
                                <div class="form-group">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                    </div>
                   </div>
            </div>
        </div>
    </div>
@endsection
@section('fotter_js')
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
