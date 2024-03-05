@extends('layouts.dashboard')
@section('home1')
    <div class="cantainer">
        <div class="row">
            <div class="col-lg-8">
                     <div class="card">
                        <div class="card_header">
                           <h3> Promotions </h3>
                        </div>
                        <div class="card_body">
                            <table class="table table-bordered">
                                      <tr>
                                        <th>sl</th>
                                        <th>banner title</th>
                                        <th>banner sub_title</th>
                                        <th>banner details</th>
                                        <th>banner photo</th>
                                        <th>action</th>
                                        <th>active status</th>
                                      </tr>
                                      @foreach ($get_promotion as $key=> $promotion)
                                          
                                      <tr>
                                           <td>{{$key+1}}</td>
                                           <td>{{$promotion->promotion_title}}</td>
                                           <td>{{$promotion->promotion_subtitle}}</td>
                                           <td>{{$promotion->promotion_det}}</td>
                                           <td width="80"><img class="img-fluid" src="{{asset('/uploads/promotion')}}/{{ $promotion->promotion_preview }}" alt="No"></td>
                                           <td>
                                            <a href=""  type="button" class="btn btn-danger shadow btn-xs sharp delete"><i class="fa fa-trash"></i></a>
                                            <a href="" class="btn btn-info shadow btn-xs sharp mt-2"><i class="fa fa-pencil"></i></a>
                                           </td>
                                           <td>
                                            @if ($promotion->active_status == 1)
                                            <a href="{{route('promotion.status', $promotion->id)}}" class="btn btn-sm btn-success">Active</a>
                                            @else
                                            <a href="{{route('promotion.status', $promotion->id)}}" class="btn btn-sm btn-danger">Dective</a>
                                        @endif
                                           </td>
                                      </tr>
                                      @endforeach
                            </table>
                        </div>
                     </div>
            </div>
            <div class="col-lg-4">
                   <div class="card">
                    <div class="card-header">
                         <h3>Add Card</h3>
                    </div>
                    <div class="card-body">
                              <form action="{{route('add.promotion')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Promotion Title</label>
                                    <input type="text" name="promotion_title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">promotion subtails</label>
                                    <input type="text" name="promotion_subtitle" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">promotion Details</label>
                                    <input type="text" name="promotion_det" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Promotion Preview</label>
                                    <input type="file" name="promotion_preview" class="form-control">
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