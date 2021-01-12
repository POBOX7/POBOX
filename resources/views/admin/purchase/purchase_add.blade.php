
@extends('admin.layouts.admin', ['pageTitle' => 'Add Vendor'])

@section('content')

<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD PURCHASE DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.purchase')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group row">
                <label for="image" class="col-sm-1 col-form-label">Supplier</label>
                <div class="col-sm-2">
                  <select class="form-control" id="supplier" name="supplier_id" style="width:100%" required >
                      <option value="">Select supplier</option>
                      @foreach($supplierList as $key => $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                      @endforeach
                  </select>
                  @if ($errors->has('supplier_id'))
                    <span style="color: red">Please select supplier</span>
                  @endif
                </div>
                
                <label class="col-sm-1 col-form-label">Bill No</label>
                <div class="col-sm-1">
                  <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="no" maxlength="10" required>
                  
                  @if ($errors->has('bill_no'))
                    <span style="color: red">{{ $errors->first('bill_no') }}</span>
                  @endif
                </div>

                <label class="col-sm-1 col-form-label">Bill Date</label>
                <div class="col-sm-2">
                  <input type="date" class="form-control" id="bill_date" name="bill_date" placeholder="date" required>
                  
                  @if ($errors->has('bill_date'))
                    <span style="color: red">{{ $errors->first('bill_date') }}</span>
                  @endif
                </div>

                <label class="col-sm-2 col-form-label">Payment Type</label>
                <div class="col-sm-2">
                  <select class="form-control" id="payment_type" name="payment_type" style="width:100%" required>
                      <option value="1">Cash</option>
                      <option value="2">Credit</option>
                  </select>
                </div>
              </div>

              {{-- <div class="form-group row" style="text-align: center;background-color: #15c1c3;color: white;">
                <h4 class="col-sm-12" style="margin-top: 5px;">All Product</h4>
              </div> --}}
              <div class="row">
                <div class="col-sm-3">
                  <label for="image" class="col-sm-12 col-form-label">Product</label>
                </div>
                <div class="col-sm-1">
                  <label for="image" class="col-sm-12 col-form-label">Image</label>
                </div>
                <div class="col-sm-1">
                  <label for="image" class="col-sm-12 col-form-label">Sku</label>
                </div>
                <div class="col-sm-1">
                  <label for="image" class="col-sm-12 col-form-label">Color</label>
                </div>
                <div class="col-sm-1">
                  <label for="image" class="col-sm-12 col-form-label">Size</label>
                </div>
                <div class="col-sm-1">
                  <label for="image" class="col-sm-12 col-form-label">Qty</label>
                </div>
                <div class="col-sm-2">
                  <label for="image" class="col-sm-12 col-form-label">Price</label>
                </div>
              </div>

              <div id="allProduct">
                <div class="row">
                  <div class="col-sm-3">
                    <select class="form-control product" name="product[]" id="product_0" style="width:100%" required="required">
                        <option value="">Select product</option>
                        @foreach($productList as $key => $product)
                          <option value="{{$product->id}}" color = "{{$product->hex_code}}" sku = "{{$product->sku}}" image = "{{$product->image}}">{{$product->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-sm-1">
                    <img src="" width="70px" id="image_0" style="border-radius: 100%;width:50px;height: 50px;">
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="sku_0" readonly>
                  </div>
                  <div class="col-sm-1">
                    <input type="text" class="form-control" id="color_0" readonly>
                  </div>
                  <div class="col-sm-1">
                    <select class="form-control" name="size[]" style="width:100%" required>
                        @foreach($sizeList as $key => $size)
                          <option value="{{$size->id}}">{{$size->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-sm-1">
                    <input type="number" class="form-control" name="qty[]" min="1" required>
                  </div>
                  
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="price_0" maxlength="30" name="price[]" required>
                  </div>
                  <div class="col-sm-2">
                      <button data-repeater-delete type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2 addProduct" >
                        <i class="mdi mdi-plus"></i>
                      </button>
                      <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusProduct" >
                        <i class="mdi mdi-delete"></i>
                      </button>
                  </div>
                </div>
              </div>
              <div class="row" style="margin-top: 20px;">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('purchase')}}"   class="btn btn-light">Cancel</a>
              </div>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin/js/select2.js') }}"></script>
<script type="text/javascript">
  var count  = 1;
  $("body").on("click",".addProduct", function(){
      $( ".addProduct" ).hide();
      var size = '';
      var product = '';
      $.ajax({
                'url' : "{{route('allproduct')}}",
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    if(data != false){
                        //var allData = JSON.parse(data);
                        $.each( data, function( key, value ) {
                          product += "<option value='"+value.id+"' image='"+value.image+"' sku='"+value.sku+"' ' color='"+value.hex_code+"' >"+value.name+"</option>"
                        });
                    }
                },
                async: false
            });

      $.ajax({
                'url' : "{{route('allsize','1')}}",
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    if(data != false){
                        //var allData = JSON.parse(data);
                        $.each( data, function( key, value ) {
                          size += "<option value='"+value.id+"'>"+value.name+"</option>"
                        });
                    }
                },
                async: false
            });

        var html = '<div class="row" style="margin-top: 15px;">'+
                      '<div class="col-sm-3">'+
                        '<select class="form-control product" name="product[]"  id="product_'+count+'" style="width:100%">'+
                          '<option value="">Select product</option>'+
                            product+
                        '</select>'+
                      '</div>'+
                      '<div class="col-sm-1">'+
                        '<img src="" style="" width="70px" id="image_'+count+'">'+
                      '</div>'+
                      '<div class="col-sm-1">'+
                        '<input type="text" class="form-control" id="sku_'+count+'" readonly>'+
                      '</div>'+
                      '<div class="col-sm-1">'+
                        '<input type="text" class="form-control" id="color_'+count+'" readonly>'+
                      '</div>'+
                      '<div class="col-sm-1">'+
                        '<select class="form-control" name="size[]" style="width:100%">'+
                          '<option value="">Select size</option>'+
                            size+
                        '</select>'+
                      '</div>'+
                      '<div class="col-sm-1">'+
                        '<input type="number" class="form-control" name="qty[]" min="1">'+
                      '</div>'+
                      '<div class="col-sm-2">'+
                        '<input type="number" class="form-control" name="price[]" id="price_'+count+'">'+
                      '</div>'+

                      '<div class="col-sm-2">'+
                         '<button data-repeater-delete type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2 addProduct" >'+
                            '<i class="mdi mdi-plus"></i>'+
                          '</button>'+
                          '<button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusProduct" >'+
                            '<i class="mdi mdi-delete"></i>'+
                          '</button>'+
                      '</div>'+
                    '</div>';
                        
        $( "#allProduct" ).append(html );
        count++;
  });

  $("body").on("click",".minusProduct", function(){
     $(this).parent().parent().remove();
  });

  $("body").on("change",".product", function(){
    var product = this.id;
    var image = $('option:selected', this).attr('image');
    var sku = $('option:selected', this).attr('sku');
    var color = $('option:selected', this).attr('color');
    var res = product.split("_");
    var url = "{{url('assets/upload_images/product')}}/"+image;
    //$('#price_'+res[1]).val(price);
    $('#image_'+res[1]).attr('src',url);
    $('#sku_'+res[1]).val(sku);
    $('#color_'+res[1]).css('background-color', color);
  });

  
</script>
<style type="text/css">
  div#allProduct img {
    border-radius: 100%!important;
    width: 50px;
    height: 50px;
}
</style>

@endsection