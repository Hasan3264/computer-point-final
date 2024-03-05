@extends('layouts.dashboard')
@section('home1')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">sub_category</a></li>
    </ol>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Inventory</h3>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Peoduct Name</th>
                                <th>color name</th>
                                <th>Size name</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory as $key=> $inventoryes)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $inventoryes->relation_product->product_name }}</td>
                                <td>{{ $inventoryes->relation_color->color_name}}</td>
                                <td>{{ $inventoryes->relation_size->size_name}}</td>
                                <td>{{ $inventoryes->quantity}}</td>
                                <td>
                                    <button value="" type="button" class="btn btn-danger shadow btn-xs sharp delete"><i
                                            class="fa fa-trash"></i></button>
                                    <a href="" class="btn btn-info shadow btn-xs sharp mt-2"><i
                                            class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Add Inventory</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('insert.inventory') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <input type="hidden" name="product_id" class="form-control" value="{{ $product->id }}">
                            <input type="text" readonly class="form-control" value="{{ $product->product_name }}">
                        </div>
                        <div class="mt-3">
                            <select name="color_id" class="form-control">
                                <label for="" class="form-label">select Color</label>
                                @foreach ($color as $colors)
                                <option value="{{ $colors->id }}">{{ $colors->color_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <select name="size_id" class="form-control">
                                <label for="" class="form-label">Select Size</label>
                                @foreach ($size as $sizes)
                                <option value="{{ $sizes->id }}">{{ $sizes->size_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <input type="text" class="form-control" placeholder="Quantity" name="quantity" value="10">
                        </div>
                        <div class="mt-3">
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

<script>
     let table = new DataTable('#myTable');
</script>
@endsection
