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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Create Purchase</h2>
        </div>

        <div class="box-content">

              <div class="control-group">
                <label class="control-label" for="date01">Date</label>
                 <div class="controls">
                     <input type="text" name="date" id="date" class="form-control datepicker"  placeholder="YYYY-MM-DD" readonly>
                 </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="date01">Purchase No</label>
                    <div class="controls">
                     <input type="text" name="purchase_no" id="purchase_no" placeholder="purchase no">
                 </div>
                </div>

                 <div class="control-group">
                    <label class="control-label" for="date01">Supplier</label>
                    <select name="supplier_id" id="supplier_id">
                        <option value="">Select Supplier</option>
                        @foreach ($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                 </div>

                 <div class="control-group">
                    <label class="control-label" for="date01">Category</label>
                    <div class="controls">
                       <select name="category_id" id="category_id">
                           <option value="">Select Category</option>

                       </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="date01">Product Name</label>
                    <div class="controls">
                       <select name="product_id" id="product_id">
                           <option value="">Select Product</option>

                       </select>
                    </div>
                </div>

                <div class="form-group">
                    <a class="btn btn-primary addeventmore"><i class="fa fa-plus-circle">+ Add Item</i></a>

                </div>
             </div>

        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{route('store-purchase')}}" method="POST" id="myForm">
                    @csrf
                    <table class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Pcs/KG</th>
                                <th>Unit Price</th>
                                <th>Description</th>
                                <th>Total Price</th>
                                <th style="text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="addRow" class="addRow">
                        </tbody>
                        <tbody>
                            <tr>
                                <td colspan="5"></td>
                                <td>
                                    <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" id="storeButton">Purchase Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
    </div>

    <script id="document-template" type="text/x-handlebars-template">
        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date[]" value="@{{date}}">
            <input type="hidden" name="purchase_no" value="@{{purchase_no}}">
            <input type="hidden" name="supplier_id" value="@{{supplier_id}}">
            <td>
                <input type="hidden" name="category_id[]" value="@{{category_id}}">
                @{{category_name}}
            </td>
            <td>
                <input type="hidden" name="product_id[]" value="@{{product_id}}">
                @{{product_name}}
            </td>

            <td>
                <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]" value="1">
            </td>
            <td>
                <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
            </td>
            <td>
                <input type="text" class="form-control form-control-sm" name="description[]">
            </td>
            <td>
                <input class="form-control form-control-sm text-right buying_price" name="buying_price[]" value="0" readonly>
            </td>
            <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>

        </tr>
    </script>

    <!--Extra add exist item -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click",".addeventmore",function(){
               var date = $('#date').val();
               var purchase_no = $('#purchase_no').val();
               var supplier_id = $('#supplier_id').val();
               var category_id = $('#category_id').val();
               var category_name = $('#category_id').find('option:selected').text();
               var product_id = $('#product_id').val();
               var product_name = $('#product_id').find('option:selected').text();

            if(date == ''){
                $.notify("Date is required",{globalPosition: 'top-right',className: 'error'});
                return false;
            }
            if(purchase_no == ''){
                $.notify("Date is required",{globalPosition: 'top-right',className: 'error'});
                return false;
            }
            if(supplier_id == ''){
                $.notify("Date is required",{globalPosition: 'top-right',className: 'error'});
                return false;
            }
            if(category_id == ''){
                $.notify("Date is required",{globalPosition: 'top-right',className: 'error'});
                return false;
            }
            if(product_id == ''){
                $.notify("Date is required",{globalPosition: 'top-right',className: 'error'});
                return false;
            }

            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var data = {
                date:date,
                purchase_no:purchase_no,
                supplier_id:supplier_id,
                category_id:category_id,
                category_name:category_name,
                product_id:product_id,
                product_name:product_name
            };

            var html = template(data);
            $("#addRow").append(html);
            });
            $(document).on("click",".removeeventmore",function(event){
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });
            $(document).on('keyup click','.unit_price,.buying_qty',function(){
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var qty = $(this).closest("tr").find("input.buying_qty").val();
                var total = unit_price * qty;
                $(this).closest("tr").find("input.buying_price").val(total);
                totalAmountPrice();
            });

            //Calculate sum of amount in invoice
            function totalAmountPrice(){
                var sum=0;
                $(".buying_price").each(function(){
                    var value = $(this).val();
                    if(!isNaN(value) && value.length != 0){
                        sum += parseFloat(value);
                    }
                });
                $('#estimated_amount').val(sum);
            }
        });

    </script>
    <script type="text/javascript">
        $(function(){
            $(document).on('change','#supplier_id',function(){
                var supplier_id = $(this).val();
                $.ajax({
                    url: "{{route('get-category')}}",
                    type:"GET",
                    data:{supplier_id:supplier_id},
                    success:function(data){
                        var html = '<option value=""> Select Category </option>';
                        $.each(data,function(key,v){
                            html += '<option value="'+v.category_id +'">'+v.category.name+'</option>';
                        });
                        $('#category_id').html(html);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#category_id',function(){
                var category_id = $(this).val();
                $.ajax({
                    url: "{{route('get-product')}}",
                    type:"GET",
                    data:{category_id:category_id},
                    success:function(data){
                        var html = '<option value=""> Select Product </option>';
                        $.each(data,function(key,v){
                            html += '<option value="'+v.id +'">'+v.name+'</option>';
                        });
                        $('#product_id').html(html);
                    }
                });
            });
        });
    </script>


    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap5',
            format : 'yyyy-mm-dd'
        });
    </script>
@endsection
