@extends('layouts.dashboard')
@section('home1')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Career</h3>
                </div>
                @include('components.success')
                <div class="card-body">
                    <form action="{{route('update.career')}}" method="POST">
                        @csrf
                        <label>Add  Details</label>
                        <div class="form-group mt-2">
                             <textarea required id="summernote"   name="job_details">{{$findId->job_details}}</textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Designation</label>
                            <input required type="text" value="{{$findId->designation}}" class="form-control" name="designation">
                            <input  type="hidden" value="{{$findId->id}}" class="form-control" name="editId">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Last Date</label>
                            <input required type="date" value="{{$findId->last_date}}"  class="form-control" name="last_date">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Vacancy</label>
                            <input required type="number" value="{{$findId->vacancy}}"  class="form-control" name="vacancy">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add  Salary</label>
                            <input required type="number" value="{{$findId->salary}}"  name="salary" class="form-control" name="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('fotter_js')
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });

</script>
@endsection
