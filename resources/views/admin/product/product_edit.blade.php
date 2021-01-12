@extends('admin.layouts.admin', ['pageTitle' => 'Add vendor'])

@section('content')

<center><div id="result"></div></center>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE PRODUCT DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.product',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="category" class="col-sm-1 col-form-label">Category</label>
                <div class="col-sm-3">
                  <select class="form-control" id="category" name="category_id" style="width:100%" required>
                      <option value="">Select category</option>
                      @foreach($categoryList as $key => $category)
                        <option value="{{$category->id}}" <?php echo ($productDetail->category_id == $category->id)?'selected':'' ?>>{{$category->name}}</option>
                      @endforeach
                    </select>
                  @if ($errors->has('category_id'))
                    <span style="color: red">{{ $errors->first('category_id') }}</span>
                  @endif
                  
                </div>
              
                <label for="brand_id" class="col-sm-1 col-form-label">Brand</label>
                <div class="col-sm-3">
                  <select class="form-control" id="brand" name="brand_id" style="width:100%" required>
                      <option value="">Select brand</option>
                      @foreach($brandList as $key => $brand)
                        <option value="{{$brand->id}}" <?php echo ($productDetail->brand_id == $brand->id)?'selected':'' ?>>{{$brand->name}}</option>
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
                        <option value="{{$color->id}}" <?php echo ($productDetail->color_id == $color->id)?'selected':'' ?>>{{$color->name}}</option>
                      @endforeach
                    </select>
                  @if ($errors->has('color_id'))
                    <span style="color: red">{{ $errors->first('color_id') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-1 col-form-label">Title</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="name" name="name" maxlength="20" placeholder="Name" value="{{$productDetail->name}}" onkeyup="countChar(this)" required>
                  <span id="nameLimit_name" style="color: red;">(20/20)</span>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                </div>
              
                <label for="exampleInputPassword2" class="col-sm-1 col-form-label">Sub title</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Sub Title" maxlength="60" onkeyup="countChar(this)" value="{{$productDetail->sub_title}}">
                  <span id="nameLimit_sub_title" style="color: red;">(60/60)</span>
                  @if ($errors->has('sub_title'))
                    <span style="color: red">{{ $errors->first('sub_title') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="short_description" onkeyup="countChar(this)" maxlength="160" name="short_description">{{$productDetail->short_description}}</textarea>
                  <span id="nameLimit_short_description" style="color: red;">(160/160)</span>
                  @if ($errors->has('short_description'))
                    <span style="color: red">{{ $errors->first('short_description') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea id="editor" class="tinyMce" name="description" placeholder="">{{$productDetail->description}}</textarea>
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
                      <input type="number" class="form-control" id="mrp" name="mrp" placeholder="MRP" value="{{$productDetail->mrp}}" required min="0">
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
                      <input type="number" max="99" class="form-control" id="discount" name="discount" placeholder="Discount %" value="{{$productDetail->discount}}" min="0" >
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
                      <input type="number" class="form-control" value="{{$productDetail->price}}" id="price" name="price" placeholder="Discount" min="0" readonly>
                  </div>
                  @if ($errors->has('price'))
                    <span style="color: red">{{ $errors->first('price') }}</span>
                  @endif
                </div>
                <!-- <label class="col-sm-2 col-form-label">Discounted Price</label>
                <div class="col-sm-2">
                  
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="price" name="price" placeholder="Discount" value="{{$productDetail->price}}" min="0">
                  </div>
                  @if ($errors->has('price'))
                    <span style="color: red">{{ $errors->first('price') }}</span>
                  @endif
                </div>
              
                <label class="col-sm-2 col-form-label">Discount %</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                      </div>
                      <input type="number" class="form-control" id="discount" name="discount" placeholder="Discount %" value="{{$productDetail->discount}}" min="0" readonly>
                  </div>
                  @if ($errors->has('discount'))
                    <span style="color: red">{{ $errors->first('discount') }}</span>
                  @endif
                </div> -->
              </div>

             {{--  <div class="form-group row">
                <label class="col-sm-1 col-form-label">GST %</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                      </div>
                      <input type="number" class="form-control" id="gstper" name="gstper" value="5"  min="0" readonly>
                  </div>
                  @if ($errors->has('gstper'))
                    <span style="color: red">{{ $errors->first('gstper') }}</span>
                  @endif
                </div>

                @php($Amount = $productDetail->mrp  - $productDetail->price)
                @php($saveAmount = $Amount)
                @php($TotalAmount = $productDetail->mrp - $Amount)
                @php($GstAmount = $TotalAmount * 5 / 100)
                @php($finalAmountAfterGst = $TotalAmount + $GstAmount)

                <label class="col-sm-2 col-form-label">GST Amount</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="gst" name="gst" placeholder="GST Amount" required min="0" value="{{$GstAmount}}" readonly>
                  </div>
                  @if ($errors->has('gst'))
                    <span style="color: red">{{ $errors->first('gst') }}</span>
                  @endif
                </div>
                
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Final amount after GST</label>
                <div class="col-sm-2">
                   <div class="input-group">
                  <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                  <input type="number" class="form-control" id="AfterPriceGst" name="AfterPriceGst" placeholder="GST Amount" required min="0" value="{{$finalAmountAfterGst}}" readonly>
                </div>
                  @if ($errors->has('gst'))
                    <span style="color: red">{{ $errors->first('gst') }}</span>
                  @endif
                </div>
              </div> --}}

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" value="{{$productDetail->sku}}">
                  @if ($errors->has('sku'))
                    <span style="color: red">{{ $errors->first('sku') }}</span>
                  @endif
                </div>
 
                <label class="col-sm-1 col-form-label">Barcode</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" min="1" id="barcode" name="barcode" placeholder="barcode" value="{{$productDetail->barcode}}">
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
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">New Arrival</label>
                <div class="col-sm-2">
                  <input type="checkbox" class="status" name="is_new_arrival" <?php echo ($productDetail->is_new_arrival == 1)?'Checked':'' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                  @if ($errors->has('is_new_arrival'))
                    <span style="color: red">{{ $errors->first('is_new_arrival') }}</span>
                  @endif
                </div>
              
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Trending</label>
                <div class="col-sm-2">
                  <input type="checkbox" class="status" name="is_trending" <?php echo ($productDetail->is_trending == 1)?'Checked':'' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                  @if ($errors->has('is_trending'))
                    <span style="color: red">{{ $errors->first('is_trending') }}</span>
                  @endif
                </div>
              
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Featured</label>
                <div class="col-sm-2">
                  <input type="checkbox" class="status" name="is_featured" <?php echo ($productDetail->is_featured == 1)?'Checked':'' ?> data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                  @if ($errors->has('is_featured'))
                    <span style="color: red">{{ $errors->first('is_featured') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Default Image</label>
                <div class="col-sm-4">
                  <input type="file" class="form-control image-file-default" id="type" name="image" accept="image/*">
                  <div class="product-image-file-default-img"></div>
                  <p>(Size : 374x400)</p>
                  @if ($errors->has('image'))
                    <span style="color: red">{{ $errors->first('image') }}</span>
                  @endif
                </div>

                <div class="col-sm-2">
                  <img src="{{url('assets/upload_images/product')}}/thumb/{{$productDetail->image}}"  style="width:100px;height: 100px;"> 
                </div>

                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">HSN No</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="hsn_no" name="hsn_no" placeholder="HSN No" value="{{$productDetail->hsn_no}}" maxlength="100">
                  @if ($errors->has('hsn_no'))
                    <span style="color: red">{{ $errors->first('hsn_no') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row" style="text-align: center;background-color: #15c1c3;color: white;">
                <h4 class="col-sm-12" style="margin-top: 5px;">Product Image</h4>
              </div>
              <div id="allProduct">
                @foreach($productDetail->allMedia as $key_media => $product_media)
                  <div class="form-group row" >
                    <label for="image" class="col-sm-3 col-form-label">Other Image</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control image-file-other" name="product_image[]" accept="image/*">
                      <div class="product-image-file-other-img"></div>
                    </div>

                    <div class="col-sm-3">
                      <img src="{{url('assets/upload_images/product')}}/thumb/{{$product_media->product_image}}"  style="width:100px;height: 100px;"> 
                    </div>

                    <div class="col-sm-2">
                      <button data-repeater-delete type="button" id="image_{{$product_media->id}}" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusImage" >
                        <i class="mdi mdi-delete"></i>
                      </button>
                      </div>
                  </div>
                @endforeach
                <div class="form-group row" >
                  <label for="image" class="col-sm-3 col-form-label">Other Image</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control image-file-other" name="product_image[]" accept="image/*">
                    <div class="product-image-file-other-img"></div>
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
                @foreach($productDetail->allSize as $key_size => $product_size)
                <div class="form-group row" >
                  <label for="image" class="col-sm-1 col-form-label">Size</label>
                  <div class="col-sm-2">
                    <select class="form-control" name="size[]" style="width:100%">
                      <option value="">Select size</option>
                      @foreach($sizeList as $key => $size)
                        <option value="{{$size->id}}" <?php echo ($product_size->size_id == $size->id)?'selected':'' ?>>{{$size->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <label for="image" class="col-sm-1 col-form-label">Qty</label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control" name="qty[]" value="{{$product_size->qty}}" min="0">
                  </div>

                  <div class="col-sm-2">
                      <button data-repeater-delete type="button" class="btn btn-danger btn-sm icon-btn ml-2 mb-2 minusSize" >
                      <i class="mdi mdi-delete"></i>
                    </button>
                  </div>
                </div>
                @endforeach
                <div class="form-group row" >
                  <label for="image" class="col-sm-1 col-form-label">Size</label>
                  <div class="col-sm-2">
                    <select class="form-control" name="size[]" style="width:100%">
                      <option value="">Select size</option>
                      @foreach($sizeList as $key => $size)
                        <option value="{{$size->id}}">{{$size->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <label for="image" class="col-sm-1 col-form-label">Qty</label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control" name="qty[]" min="0">
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

<script type="text/javascript" src="{{ asset('assets/fancybox/lib/jquery.mousewheel.pack.js?v=3.1.3') }}"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="{{ asset('assets/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/source/jquery.fancybox.css?v=2.1.5') }}" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}" />
<script type="text/javascript" src="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5') }}"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}" />
<script type="text/javascript" src="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7') }}"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="{{ asset('assets/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6') }}"></script>

<script type="text/javascript">
    $("body").on("click",".addImage", function(){
      $( ".addImage" ).hide();
      var html = '<div class="form-group row" >'+
                    '<label for="image" class="col-sm-3 col-form-label">Other Image</label>'+
                    '<div class="col-sm-4">'+
                      '<input type="file" class="form-control" name="product_image[]" accept="image/*">'+
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
     var imageID = this.id.split("_");
     $.ajax({
                'url' : "{{route('removeproductimage','')}}/"+imageID[1],
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    
                }
            });
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
                                        '<input type="number" class="form-control" name="qty[]" min="0">'+
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
    /*if(price > 0){
      var gst =  price * 5 / 100;
      var per  = price * 100 / mrp;
      $('#discount').val((100 - per).toFixed(2));
    }else{
      
    }*/
    var gst =  mrp * 5 / 100;
    var per  = 0;
    $('#discount').val(0);
    $('#price').val(mrp);
    var AmountPriceAfterGst =  parseFloat(mrp) + parseFloat(gst) ;
    
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
  $(document).ready(function() {
    var set_name = 20;
    var set_sub_title = 60;
    var set_short_description = 160;
    var name = $('#name').val().length;
    var sub_title = $('#sub_title').val().length;
    var short_description = $('#short_description').val().length;
    
    remain_name = parseInt(set_name - name);
    remain_sub_title = parseInt(set_sub_title - sub_title);
    remain_short_description = parseInt(set_short_description - short_description);
    
    $('#nameLimit_name').text('('+remain_name+'/'+set_name+')');
    $('#nameLimit_sub_title').text('('+remain_sub_title+'/'+set_sub_title+')');
    $('#nameLimit_short_description').text('('+remain_short_description+'/'+set_short_description+')');
    
  });
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