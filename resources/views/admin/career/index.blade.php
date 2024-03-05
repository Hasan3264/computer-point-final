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
                    <form action="{{route('input.career')}}" method="POST">
                        @csrf
                        <label>Add  Details</label>
                        <div class="form-group mt-2">
                             <textarea required id="summernote"  name="job_details"></textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Designation</label>
                            <input required type="text" class="form-control" name="designation">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Last Date</label>
                            <input required type="date" class="form-control" name="last_date">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add Vacancy</label>
                            <input required type="number" class="form-control" name="vacancy">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add  Salary</label>
                            <input required type="number" name="salary" class="form-control" name="">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tr>
                    <th>Details</th>
                    <th>Designation</th>
                    <th>Last Date</th>
                    <th>Salary</th>
                    <th>Vacancy</th>
                    <th>Active</th>
                </tr>
                @foreach (App\Models\creear::latest()->get() as $career)
                       <tr>
                           <td>{!!$career->job_details!!}</td>
                           <td>{{$career->designation}}</td>
                           <td>{{$career->last_date}}</td>
                           <td>{{$career->vacancy}}</td>
                           <td>{{$career->salary}}</td>
                           <td><a href="{{route('delete.carrer', $career->id)}}">Delete</a>
                            <a href="{{route('edit.carrer', $career->id)}}">Edit</a>
                        </td>
                       </tr>
                @endforeach

            </table>
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
