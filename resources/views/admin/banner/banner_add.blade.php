@extends('layouts.dashboard')

@section('home1')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add Card</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('banner.insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mt-2">
                            <label>Banner Link</label>
                            <input type="text" class="form-control" name="banner_link">
                        </div>
                        <div class="form-group mt-2">
                            <label>Add bannar Image</label>
                            <input type="file" name="banner_preview" class="form-control">
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
                    <th>SL</th>
                    <th>link</th>
                    <th>Active Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($get_banners as $key=> $banner)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$banner->banner_link}}</td>
                    <td width="80"><img class="img-fluid"
                            src="{{asset('uploads/banner')}}/{{ $banner->banner_preview }}" alt="No"></td>
                    <td>
                        <a href="{{route('delete.banner', $banner->id)}}" type="button"
                            class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
@section('fotter_js')
@endsection
