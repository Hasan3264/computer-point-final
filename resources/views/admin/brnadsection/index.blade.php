@extends('layouts.dashboard')
@section('home1')
    <div class="cantainer">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                       <h3>Add brand</h3>
                    </div>
                    <div class="card-body">
                       <form action="{{route('add.brand')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="form-group">
                                <label for="">Add brand Photo</label>
                               <input type="file" name="img_name" class="form-control">
                         </div>
                         <button type="submit" class="btn btn-primary">submit</button>
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
