@extends('backend.admin.admin_master')
@section('content')
<div class="container">

    <div class="row-fluid sortable">
    <div class="box span12">
        <p class="alert-success">
            @php
            $message=Session::get('message');
            if($message){
                echo "$message";
                Session::put('message',null);
                }
              @endphp
        </p>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('add-product')}}" method="post">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls @error('name') is-invalid @enderror">
                            <input type="text" class="input-xlarge" name="name" value="{{old('name')}}" placeholder="product name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Supplier</label>
                        <div class="controls">
                           <select name="supplier_id" id="">
                               <option value="">Select Supplier</option>
                               @foreach ($suppliers as $supplier)
                               <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Category</label>
                        <div class="controls">
                           <select name="category_id" id="">
                               <option value="">Select Category</option>
                               @foreach ($categories as $category)
                               <option value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Unit Name</label>
                        <div class="controls">
                           <select name="unit_id" id="">
                               <option value="">Select Unit</option>
                               @foreach ($units as $unit)
                               <option value="{{$unit->id}}">{{$unit->name}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->

    </div>

@endsection
