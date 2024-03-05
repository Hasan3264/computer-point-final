@extends('layouts.dashboard')
@section('home1')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Order Position</a></li>
    </ol>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Billing Details</h3>
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <tr>
                        <th>Customer Name</th>
                        <th>Customer Phone</th>
                        <th>Customer Email</th>
                        <th>Customer Location</th>
                        <th>Customer Address</th>
                        <th>Customer Massage</th>
                    </tr>
                    @foreach ($BillingDetails as $BillDetails)

                    @endforeach
                    <tr>
                        <td>{{$BillDetails->name}}</td>
                        <td>{{$BillDetails->phone}}</td>
                        <td>{{$BillDetails->email}}</td>
                        <td>{{$BillDetails->relation_district->name}}</td>
                        <td>{{$BillDetails->address}}</td>
                        <td>{{$BillDetails->notes}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Order Product</h3>
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($OrderProduct as $Products)


                    <tr id="tr_{{$Products->id}}">
                        <td width="80"><img class="img-fluid"
                                src="{{asset('/uploads/product/preview')}}/{{ $Products->relation_product->Product_preview}}"
                                alt=""></td>
                        <td>{{$Products->relation_product->product_name}}</td>
                        <td>{{$Products->price}} Tk</td>
                        <td>{{$Products->quentity}}</td>
                        <td>{{$Products->quentity*$Products->price}} Tk</td>
                        <td ><a class="deleteRecord text-danger"style="cursor: pointer"  data-id="{{ $Products->id }}"
                            data-csrf-token="{{ csrf_token() }}"><i class="fa fa-trash"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
{{-- {{$order_position}} --}}
<div class="row">
    <div class="col-lg-4">
        <div class="card-body">
            <form action="{{route('Update.Position')}}" method="POST">
                @csrf
                <div class="form-group">
                    <h2 class="form-label" for="">Update Position</h2>
                    <!-- Pending radio button -->
                    <input type="radio" id="Pending" name="position" value="Pending" {{($Order->position == 'Pending' ? 'checked' : '')}} autocomplete="off">
                    <label for="Pending">Pending</label><br>

                    <!-- Canceled radio button -->
                    <input type="radio" id="Canceled" name="position" value="Canceled" {{($Order->position == 'Canceled' ? 'checked' : '')}} autocomplete="off">
                    <label for="Canceled">Canceled</label><br>

                    <!-- Hidden input for order ID -->
                    <input type="hidden" name="edit_id" value="{{$Order->id}}">

                    <!-- Processing radio button -->
                    <input type="radio" id="Processing" name="position" value="Processing" {{($Order->position == 'Processing' ? 'checked' : '')}} autocomplete="off">
                    <label for="Processing">Processing</label><br>

                    <!-- Delivered radio button -->
                    <input type="radio" id="Delivered" name="position" value="Delivered" {{($Order->position == 'Delivered' ? 'checked' : '')}} autocomplete="off">
                    <label for="Delivered">Delivered</label><br>

                    <!-- Complete radio button -->
                    <input type="radio" id="Complete" name="position" value="Complete" {{($Order->position == 'Complete' ? 'checked' : '')}} autocomplete="off">
                    <label for="Complete">Complete</label>

                    <!-- Error message for position -->
                    @error('position')
                        <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>


                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-body">
            <form action="{{route('Order.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <h2 for="" class="form-label">Update Order</h2>
                    <div class="form-group">
                        <label for="" clas="form-label">Sub Total</label>
                        <input type="text" class="form-control" id="subtotal" name="subtotal"
                            value="{{$Order->subtotal}}">
                        @error('subtotal')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" clas="form-label">Delivery Charge</label>
                        <input type="text" class="form-control" id="delivary_charge" name="delivary_charge"
                            value="{{$Order->delivary_charge}}">
                        <input type="hidden" class="form-control" name="order_id"
                            value="{{$Order->id}}">
                        @error('delivary_charge')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" clas="form-label">Discount</label>
                        <input type="text" readonly class="form-control" id="discount" name="discount"
                            value="{{$Order->discount}}">
                        @error('category_name')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" clas="form-label">Total</label>
                        <input type="text" id="total"  class="form-control" name="total"
                            value="{{$Order->total}}">
                        @error('category_name')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>

                    <!-- Error message for category_name (Note: You might want to change this to 'position' based on your intended use) -->
                    @error('category_name')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card-body">
            <form action="{{route('quantity.update')}}" method="POST">
                @csrf
                <div class="form-group">
                    <h2 for="" class="form-label">Update Quantity</h2>
                    @foreach ($OrderProduct as $Products)

                    <div class="form-group">
                        <label for="" clas="form-label">{{$Products->relation_product->product_name}}</label>

                        <input type="text" class="form-control" id="quentity" name="quentity[{{ $Products->id }}]"
                            value="{{$Products->quentity}}">

                        {{-- <input type="hidden" class="form-control" id="delivary_charge" name="edit_id"
                            value="{{$Products->id}}"> --}}
                        @error('delivary_charge')
                        <strong class="text-danger">{{$message}}</strong>
                        @enderror
                    </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

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
            url: "{{route('Delete.OrderProduct')}}",
            type: 'DELETE',
            data: {
                'del_id': del_id,
                '_token': csrfToken,
            },
            success: function (data) {
                $('#' + data['tr']).slideUp("slow");
            }
        });
    });
</script>
@endsection
