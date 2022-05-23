@extends('layout.conquer')

@section('content')
<div class="container">
    <h2>Form Edit Products</h2>
    <div class="portlet">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-reorder"></i> Edit Data Products
            </div>
            <div class="tools">
                <a href="" class="collapse"></a>
                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                <a href="" class="reload"></a>
                <a href="" class="remove"></a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" method="POST" action="{{url('products/'.$data->id)}}">
                @csrf;
                @method("PUT")
                <div class="form-body">
                     <div class="form-group">
                        <label for="exampleInputEmail1">product_name</label>
                        <input value="{{$data->product_name}}" name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter text">
                        <span class="help-block">
                        product_name</span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">product_price</label>
                        <input value="{{$data->product_price}}" name="product_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter text">
                        <span class="help-block">
                        product_price</span>
                    </div>
          
           
                    <div class="form-group">
                        <label>Category</label>
                        <select name='category_id'>
                            @foreach($categories as  $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label>Suppliers</label>
                        <select name='supplier'>
                            @foreach($suppliers as  $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                 
             
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn btn-info">Submit</button>
                    <button type="button" class="btn btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection