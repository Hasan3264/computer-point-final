@extends('layouts.dashboard')
@section('home1')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Orders</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Orders</h3>
            </div>
            <div class="card-body">
                <table id="myTabeesasadsle" class="table table-border">
                    <thead>
                        <tr>
                            <th>sl</th>
                            <th>Subtotal</th>
                            <th>Order position</th>
                            <th>Discount</th>
                            <th>Delivery Charge</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>See More</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key=> $item)
                        <tr id="tr_{{$item->id}}">
                            <td>{{$key+1}}</td>
                            <td>{{$item->subtotal}}</td>
                            <td class="{{($item->position == 'Canceled'?'text-danger':'text-info')}}">{{$item->position}}</td>
                            <td>{{$item->discount}}</td>
                            <td>{{$item->delivary_charge}}</td>
                            <td>{{$item->total}}</td>
                           <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d H:i:s') }}</td>


                            <td><a href="{{route('order.position',$item->id)}}">See</a></td>
                            <td ><a class="deleteRecord text-danger"style="cursor: pointer"  data-id="{{ $item->id }}"
                                    data-csrf-token="{{ csrf_token() }}"><i class="fa fa-trash"></i></a>
                                <a href="{{route('Invoice.Index',$item->id)}}">Invoice</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        title: '{{session('
        update ')}}',
        showConfirmButton: false,
        timer: 1500
    })
    //     Swal.fire(
    // 'done!',
    // '{{session('update')}}',
    // 'success'
    // )

</script>
@endif

<script>
    let table = new DataTable('#myTabeesasadsle');

    $('.deleteRecord').click(function () {
        var el = $(this);
        var del_id = el.data("id");
        var csrfToken = $(this).data('csrf-token');
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.ajax({
            url: "{{route('Delete.Order')}}",
            type: 'DELETE',
            data: {
                'order_id': del_id,
                '_token': csrfToken,
            },
            success: function (data) {
                $('#' + data['tr']).slideUp("slow");
            }
        });
    });

</script>

@endsection
