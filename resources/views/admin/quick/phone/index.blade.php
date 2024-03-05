@extends('layouts.dashboard')
@section('home1')
    <div class="cantainer">
        <div class="row">
            <div class="col-lg-7">

            </div>
            <div class="col-lg-5">
                   <div class="card">
                    <div class="card-header">
                         <h3>Add Card</h3>
                    </div>
                    <div class="card-body">
                              <form action="{{route('add.phone')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Product Title</label>
                                    <input type="text" name="product_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Details</label>
                                    <input type="text" name="product_det" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Preview</label>
                                    <input type="file" name="product_preview" class="form-control">
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