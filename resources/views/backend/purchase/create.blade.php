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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Purchase</h2>
        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{url('add-purchase')}}" method="post">
                @csrf
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Unit Name</label>
                        <div class="controls @error('name') is-invalid @enderror">
                            <input type="text" class="input-xlarge" name="name" value="{{old('name')}}" placeholder="unit name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Purchase</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->

    </div>

@endsection
