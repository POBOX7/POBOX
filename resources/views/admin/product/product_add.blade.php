
@extends('admin.layouts.admin', ['pageTitle' => 'Add Vendor'])

@section('content')
<center><div id="result_product"></div></center>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD PRODUCT DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group row">
                <label for="image" class="col-sm-1 col-form-label">Category</label>
                <div class="col-sm-3">
                  <select class="form-control" id="category" name="category_id" style="width:100%" required>
                      <option value="">Select category</option>
                      @foreach($categoryList as $key => $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                  @if ($errors->has('category_id'))
                    <span style="color: red">Please select category</span>
                  @endif
                </div>
              
                <label for="image" class="col-sm-1 col-form-label">Brand</label>
                <div class="col-sm-3">
                  <select class="form-control" id="brand" name="brand_id" style="width:100%" required>
                      <option value="">Select brand</option>
                      @foreach($brandList as $key => $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                      @endforeach
                    </select>
                  @if ($errors->has('brand_id'))
                    <span style="color: red">{{ $errors->first('brand_id') }}</span>
                  @endif
                </div>
              
                <label for="image" class="col-sm-1 col-form-label">Color</label>
                <div class="col-sm-3">
                  <select class="form-control" id="color" name="color_id" style="width:100%" required>
                      <option value="">Select color</option>
                      @foreach($colorList as $key => $color)
                        <option value="{{$color->id}}">{{$color->name}}</option>
                      @endforeach
                    </select>
                  @if ($errors->has('color_id'))
                    <span style="color: red">{{ $errors->first('color_id') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-1 col-form-label">Title</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="name" name="name" maxlength="20" onkeyup="countChar(this)" placeholder="Title" required>
                  <span id="nameLimit_name" style="color: red;">(20/20)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              
                <label class="col-sm-1 col-form-label">Sub title</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="sub_title" name="sub_title" maxlength="60" onkeyup="countChar(this)" placeholder="Sub Title">
                  <span id="nameLimit_sub_title" style="color: red;">(60/60)</span>
                  @if ($errors->has('sub_title'))
                    <span style="color: red">{{ $errors->first('sub_title') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                  
                  <textarea class="form-control" id="short_description" maxlength="160" name="short_description" onkeyup="countChar(this)"></textarea>
                  <span id="nameLimit_short_description" style="color: red;">(160/160)</span>
                  @if ($errors->has('short_description'))
                    <span style="color: red">{{ $errors->first('short_description') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea id="editor" class="tinyMce" name="description" placeholder=""></textarea>
                  @if ($errors->has('description'))
                    <span style="color: red">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label class="col-sm-1 col-form-label">Price</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="mrp" name="mrp" placeholder="MRP" required min="0">
                  </div>
                  @if ($errors->has('mrp'))
                    <span style="color: red">{{ $errors->first('mrp') }}</span>
                  @endif
                </div>
                
                 <label class="col-sm-2 col-form-label">Discount %</label>
                <div class="col-sm-2"> 
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                      </div>
                      <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount %" min="0" max="99">
                  </div>
                  @if ($errors->has('discount'))
                    <span style="color: red">{{ $errors->first('discount') }}</span>
                  @endif
                </div>

                <label class="col-sm-2 col-form-label">Discounted Price</label>
                <div class="col-sm-2">
                  {{-- <input type="number" class="form-control" id="price" name="price" placeholder="Discount" readonly> --}}
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="price" name="price" placeholder="Discount" min="0" readonly>
                  </div>
                  @if ($errors->has('price'))
                    <span style="color: red">{{ $errors->first('price') }}</span>
                  @endif
                </div>
              
               
              </div>

             {{--  <div class="form-group row">
                <label class="col-sm-1 col-form-label">GST %</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                      </div>
                      <input type="number" class="form-control" id="gstper" name="gstper" value="5" placeholder="Discount %" min="0" readonly>
                  </div>
                  @if ($errors->has('gstper'))
                    <span style="color: red">{{ $errors->first('gstper') }}</span>
                  @endif
                </div>

                <label class="col-sm-2 col-form-label">GST Amount</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="gst" name="gst" placeholder="" required min="0" readonly>
                  </div>
                  @if ($errors->has('gst'))
                    <span style="color: red">{{ $errors->first('gst') }}</span>
                  @endif
                </div>
                <label class="col-sm-2 col-form-label">Final Amount After GST</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="AfterPriceGst" name="AfterPriceGst" placeholder="" required min="0" readonly>
                  </div>
                  @if ($errors->has('gst'))
                    <span style="color: red">{{ $errors->first('gst') }}</span>
                  @endif
                </div>
              </div> --}}

              <div class="form-group row">
                <label class="col-sm-1 col-form-label">SKU</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" required>
                  @if ($errors->has('sku'))
                    <span style="color: red">{{ $errors->first('sku') }}</span>
                  @endif
                </div>

                <label class="col-sm-1 col-form-label">Barcode</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" min="1" id="barcode" name="barcode" placeholder="barcode">
                  @if ($errors->has('barcode'))
                    <span style="color: red">{{ $errors->first('barcode') }}</span>
                  @endif
                </div>
                <span id="generate" style="color: green">Generate Barcode</span>
                {{-- <button data-repeater-delete type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2" id="generate">
                  <i class="ti ti-settings"></i>
                </button> --}}
              </div>

              <div class="form-group row">
                <label class="col-sm-2 col-form-label">New Arrival</label>
                <div class="col-sm-2">
                  <input type="checkbox" class="status" name="is_new_arrival" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                  @if ($errors->has('is_new_arrival'))
                    <span style="color: red">{{ $errors->first('is_new_arrival') }}</span>
                  @endif
                </div>
              
                <label class="col-sm-2 col-form-label">Trending</label>
                <div class="col-sm-2">
                  <input type="checkbox" class="status" name="is_trending" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                  @if ($errors->has('is_trending'))
                    <span style="color: red">{{ $errors->first('is_trending') }}</span>
                  @endif
                </div>
                <label class="col-sm-2 col-form-label">Featured</label>
                <div class="col-sm-2">
                  <input type="checkbox" class="status" name="is_featured" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                  @if ($errors->has('is_featured'))
                    <span style="color: red">{{ $errors->first('is_featured') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label" >Default Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file-default" id="type" name="image" accept="image/*" required>
                  <div class="product-image-file-default-img"></div>
                  <p>(Size : 374x400)</p>
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                </div>

                <label class="col-sm-1 col-form-label">HSN No</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="hsn_no" name="hsn_no" placeholder="HSN No" required maxlength="100">
                  @if ($errors->has('hsn_no'))
                    <span style="color: red">{{ $errors->first('hsn_no') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row" style="text-align: center;background-color: #15c1c3;color: white;">
                <h4 class="col-sm-12" style="margin-top: 5px;">Product Image</h4>
              </div>
              <div id="allProduct">
                <div class="form-group row" >
                  <label for="image" class="col-sm-3 col-form-label">Other Image</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control image-file-other" name="product_image[]" accept="image/*">
                    <div class="product-image-file-other-img"></div>
                    (Size : 374x400)
                  </div>

                  <div class="col-sm-2">
                     <button data-repeater-delete type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2 addImage" >
                        <i class="mdi mdi-plus"></i>
                      </button>
                    <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusImage" >
                      <i class="mdi mdi-delete"></i>
                    </button>
                    </div>
                </div>
              </div>

              <div class="form-group row" style="text-align: center;background-color: #15c1c3;color: white;">
                <h4 class="col-sm-12" style="margin-top: 5px;">Available Sizes</h4>
              </div>
              <div id="allSize">
                <div class="form-group row" >
                  <label for="image" class="col-sm-1 col-form-label">Size</label>
                  <div class="col-sm-2">
                    <select class="form-control" name="size[]" style="width:100%" required>
                      <option value="">Select size</option>
                      @foreach($sizeList as $key => $size)
                        <option value="{{$size->id}}">{{$size->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <label for="image" class="col-sm-1 col-form-label">Qty</label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control" name="qty[]" min="0" required>
                  </div>

                  <div class="col-sm-2">
                     <button data-repeater-delete type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2 addSize" >
                        <i class="mdi mdi-plus"></i>
                      </button>
                      <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusSize" >
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </div>
                </div>
              </div>

              <button type="submit" id="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('product')}}"   class="btn btn-light">Cancel</a>
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
    $("body").on("click",".addImage", function(){
      $( ".addImage" ).hide();
      var html = '<div class="form-group row" >'+
                    '<label for="image" class="col-sm-3 col-form-label">Other Image</label>'+
                    '<div class="col-sm-4">'+
                      '<input type="file" class="form-control" name="product_image[]" accept="image/*">(Size : 374x400)'+
                    '</div>'+

                    '<div class="col-sm-2">'+
                       '<button data-repeater-delete type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2 addImage" >'+
                          '<i class="mdi mdi-plus"></i>'+
                        '</button>'+
                      '<button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusImage" >'+
                        '<i class="mdi mdi-delete"></i>'+
                      '</button>'+
                      '</div>'+
                  '</div>';
      
      $( "#allProduct" ).append(html );
  });

  $("body").on("click",".minusImage", function(){
     $(this).parent().parent().remove();
  });

   $("body").on("click",".addSize", function(){
      $( ".addSize" ).hide();
      $.ajax({
                'url' : "{{route('allsize','1')}}",
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    if(data != false){
                        //var allData = JSON.parse(data);
                        var size = '';
                        $.each( data, function( key, value ) {
                          size += "<option value='"+value.id+"'>"+value.name+"</option>"
                        });
                        
                        var html = '<div class="form-group row" >'+
                                      '<label for="image" class="col-sm-1 col-form-label">Size</label>'+
                                      '<div class="col-sm-2">'+
                                        '<select class="form-control" name="size[]" style="width:100%">'+
                                          '<option value="">Select size</option>'+
                                            size+
                                        '</select>'+
                                      '</div>'+
                                      '<label for="image" class="col-sm-1 col-form-label">Qty</label>'+
                                      '<div class="col-sm-2">'+
                                        '<input type="number" class="form-control" name="qty[]" min="0" required>'+
                                      '</div>'+

                                      '<div class="col-sm-2">'+
                                         '<button data-repeater-delete type="button" class="btn btn-info btn-sm icon-btn ml-2 mb-2 addSize" >'+
                                            '<i class="mdi mdi-plus"></i>'+
                                          '</button>'+
                                          '<button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusSize" >'+
                                            '<i class="mdi mdi-delete"></i>'+
                                          '</button>'+
                                        '</div>'+
                                    '</div>';
                        
                        $( "#allSize" ).append(html );
                    }
                }
            });
  });

  $("body").on("click",".minusSize", function(){
     $(this).parent().parent().remove();
  });

  $("body").on("focusout","#mrp", function(){
    var mrp = $('#mrp').val();
    var price = $('#price').val();
    if(price > 0){
      var gst =  price * 5 / 100;
      var per  = price * 100 / mrp;
      $('#discount').val((100 - per).toFixed(2));
    }else{
      var gst =  mrp * 5 / 100;
      var per  = 0;
       $('#discount').val(0);
        $('#price').val(mrp);
    }
    var AmountPriceAfterGst = mrp;
    $('#AfterPriceGst').val(AmountPriceAfterGst);

    $('#gst').val(gst.toFixed(2));


  });

  $("body").on("focusout","#discount", function(){
    var mrp = $('#mrp').val();
    var discount = $('#discount').val(); 

    var save_amount  = mrp * discount /100 ;
    var oriinal_amount = mrp - save_amount;
    var gst = oriinal_amount * 5 / 100;
    var AmountPriceAfterGst =  oriinal_amount + gst;

    $('#AfterPriceGst').val(AmountPriceAfterGst);


    var per  = discount * mrp /100; 
    if(per > 0){
      $('#price').val((mrp - per).toFixed(2));
      price = (mrp - per).toFixed(2); 
      var gst =  price * 5 / 100;

    }else{
      $('#price').val(0);
      var gst =  mrp * 5 / 100;
      $('#price').val(mrp);
    }

    $('#gst').val(gst.toFixed(2));

  });

  $("body").on("click","#generate", function(){
    $('#barcode').val(makeid(10));
  });

  function makeid(length) {
     var result           = '';
     //var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
     var characters       = '0123456789';
     var charactersLength = characters.length;
     for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
     }
     return result;
  }
</script>

<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

<script>
    //var wysiwygareaAvailable = !!CKEDITOR.plugins.get( 'wysihtml5' );
    CKEDITOR.replace( 'editor' );
</script>

<script type="text/javascript">
  function countChar(val) {
    var id = val.id;
    if(id == 'name'){
      var set = 20;
    }else if(id == 'sub_title'){
      var set = 60;
    }else if(id == 'short_description'){
      var set = 160;
    }
    var len = val.value.length;
    
    remain = parseInt(set - len);

    if(remain > -1){
      $('#nameLimit_'+id).text('('+remain+'/'+set+')');
    }
    
  };
</script>

@endsection