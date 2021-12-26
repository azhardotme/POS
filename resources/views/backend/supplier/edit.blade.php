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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Supplier</h2>
        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('update-supplier/'.$supplier->id)}}" method="post">
                @csrf
                @method('PUT')
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Supplier Name</label>
                        <div class="controls @error('name') is-invalid @enderror">
                            <input type="text" class="input-xlarge" name="name" value="{{$supplier->name}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Mobile No</label>
                        <div class="controls @error('mobile_no') is-invalid @enderror">
                            <input type="text" class="input-xlarge" name="mobile_no" value="{{$supplier->mobile_no}}">
                            @error('mobile_no')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group ">
                        <label class="control-label" for="date01">Email</label>
                        <div class="controls @error('email') is-invalid @enderror">
                            <input type="text" class="input-xlarge" name="email" value="{{$supplier->email}}">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="date01">Address</label>
                        <div class="controls @error('address') is-invalid @enderror">
                            <input type="text" class="input-xlarge" name="address" value="{{$supplier->address}}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Supplier</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->

    </div>

@endsection
