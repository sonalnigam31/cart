@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cart</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif   
                
    <?php //echo "<pre>";print_r(Session::get('cart')); ?>
  {!! Form::open(['route' => ['updatecart'] ]) !!}
                <table id="example1" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>            
                
            </tr>
        </thead>
        <tbody>
            @php $sum = 0; 
                if(is_array(Session::get('cart')) && count(Session::get('cart'))>0)
                    {
             @endphp
            @foreach(Session::get('cart') as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['price']*$item['qty'] }}</td>
                    <td><input type="number" name="{{ $item['id'] }}" min="0" max="5" value="{{ $item['qty'] }}"></td> 
                    
                </tr>
                @php $sum = $sum + ($item['price']*$item['qty']) @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total Amount</th>
                <th >{{ $sum }}</th>
                <th colspan="2">
                    {!! Form::submit('Update Cart', ['class' => 'btn btn-primary']) !!}
                </th>      
            </tr>
             <tr>
                <th colspan="2">Apply Coupon Code</th>
                <th >
                    <input type="text" name="Coupon" id="Coupon" >
                     <div id="couponerror" style="color:red;"></div>
                </th>
                <th colspan="2">
                    <input type="button" class="ApplyCoupon" name="ApplyCoupon" id="ApplyCoupon"  value="ApplyCoupon" >
                </th>      
            </tr>
            <tr>
                <th colspan="3">Payable Amount(In Rs)</th>                
                <th colspan="2" id="payable">
                    {{ $sum}}
                </th>      
            </tr>
        </tfoot>
        @php } @endphp
    </table>
    
            {!! Form::close() !!}            
            </div>



             <table id="example3" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.No.</th>
                <th>Promocode</th>
                <th>Amount</th>
                
            </tr>
        </thead>
        <tbody>
            @if (count($couponList) > 0)
            @foreach($couponList as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->promocode }}</td>
                    <td>{{ $item->amount }}</td>
                </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="3">No coupon Available</td>                 
                </tr>
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>S.No.</th>
                <th>Promocode</th>
                <th>Amount</th>      
            </tr>
        </tfoot>
                    </table>
        </div>
       </div> 
       
    </div>
</div>
@endsection


                