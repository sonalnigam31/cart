@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success"  role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <div class="alert alert-success" id="showmsg" style="display: none;" role="alert">
                           Product Added Successfully In Cart!
                        </div>

                    You are logged in!
                </div>
                
            </div>
        </div>
        <?php //echo "<pre>";print_r(Session::get('cart')); ?>
        <div class="col-md-10">
            <div class="card">
            <div class="card-header">Product Listing</div>

                <div class="card-body">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Add To Cart</th>
            </tr>
        </thead>
        <tbody>
            @if (count($productList) > 0)
            @foreach($productList as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->product_detail }}</td>
                    <td><input type="button" class="CartButton" name="AddToCart" id="AddToCart" data-selector="{{ $item->id }}" value="AddToCart" ></td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="3">No Product Available</td>                 
                </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>S.No.</th>
                <th>Product Name</th>
                <th>Description</th> 
                <th>Add To Cart</th>      
            </tr>
        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                