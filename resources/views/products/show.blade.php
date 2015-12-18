@extends('layouts.master')

@section('title', 'Product | '.$product->name)

@inject('services', 'App\Services')

@section('body')
    <div>
        <h2>
            {!! Form::open(['route' => ['product.destroy', $product], 'method' => 'delete']) !!}
            <a href="{{route('product.index')}}" class="glyphicon glyphicon-chevron-left"></a>
            {{$product->name}}

            <div style="float: right">
                <a href="{{route('product.edit', $product)}}" class="btn btn-primary">Edit</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
            {!! Form::close() !!}
        </h2>

        <table class="table table-striped">
            <colgroup>
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 40%;">
                <col span="1" style="width: 10%;">
                <col span="1" style="width: 40%;">
            </colgroup>
            <tbody>
                <tr>
                    <td><strong>Price</strong></td>
                    <td>{{$services->displayCurrency($product->price)}}</td>

                    <td><strong>Suggested Price</strong></td>
                    <td>{{$services->displayCurrency($product->suggestedPrice())}}</td>
                </tr>
                <tr>
                    <td><strong>Profit Percentage</strong></td>
                    <td>{{$services->displayPercentage($product->profitPercentage())}}</td>

                    <td><strong>Stock</strong></td>
                    <td>{{$product->in_stock}}</td>
                </tr>
                <tr>
                    <td><strong>Profit Made</strong></td>
                    <td>{{$services->displayCurrency($product->profit())}}</td>

                    <td><strong>Average Daily Demand</strong></td>
                    <td>{{$services->displayAmount($product->averageDailyDemand())}}</td>
                </tr>
                <tr>
                    <td><strong>Profit Percentage Made</strong></td>
                    <td>{{$services->displayPercentage($product->profitPercentageMade())}}</td>

                    <td><strong>Reorder Point</strong></td>
                    <td>{{$product->reorderPoint()}}</td>
                </tr>
            </tbody>
        </table>

        <div>
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#stock">Stock</a></li>
                <li><a data-toggle="tab" href="#orders">Orders</a></li>
                <li><a data-toggle="tab" href="#sales">Sales</a></li>
            </ul>
            <div class="tab-content">
                <div id="stock" class="tab-pane fade in active">
                    @include('stocks.parts.stocks')

                    <a href="{{route('product.stock.create', ['product' => $product])}}" class="btn btn-primary">Add Stock Entry</a>
                </div>

                <div id="orders" class="tab-pane fade">
                    @include('orders.parts.orders')

                    <a href="{{route('product.order.create', ['product' => $product])}}" class="btn btn-primary">Add Order</a>
                </div>

                <div id="sales" class="tab-pane fade">
                    @include('sales.parts.sales')
                </div>
            </div>
        </div>
    </div>
@endsection