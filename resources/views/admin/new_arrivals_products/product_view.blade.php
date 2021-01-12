@extends('admin.layouts.admin', ['pageTitle' => 'NEW ARRIVAL PRODUCT'])

@section('content')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">NEW ARRIVAL PRODUCT DETAIL</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.product.newarrivals',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group row">
                <label for="category" class="col-sm-1 col-form-label">Category</label>
                <div class="col-sm-3">
                  
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$productDetail->category_name}}" readonly>
                </div>
             

             
                <label for="brand_id" class="col-sm-1 col-form-label">Brand</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$productDetail->brand_name}}" readonly>
                  @if ($errors->has('brand_id'))
                    <span style="color: red">{{ $errors->first('brand_id') }}</span>
                  @endif
                  
                </div>
             

              
                <label for="image" class="col-sm-1 col-form-label">Color</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$productDetail->color_name}}" readonly>
                  @if ($errors->has('color_id'))
                    <span style="color: red">{{ $errors->first('color_id') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-1 col-form-label">Title</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$productDetail->name}}" readonly>
                  @if ($errors->has('name'))
                    <span style="color: red">{{ $errors->first('name') }}</span>
                  @endif
                </div>
             
                <label for="exampleInputPassword2" class="col-sm-1 col-form-label">Sub title</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Sub Title" value="{{$productDetail->sub_title}}" readonly>
                  @if ($errors->has('sub_title'))
                    <span style="color: red">{{ $errors->first('sub_title') }}</span>
                  @endif
                </div>
             </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Short Description</label>
                <div class="col-sm-9">
                  
                  <textarea class="form-control" name="short_description" readonly>{{$productDetail->short_description}}</textarea>
                  @if ($errors->has('short_description'))
                    <span style="color: red">{{ $errors->first('short_description') }}</span>
                  @endif
                </div>
              </div>

              

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                  {!!$productDetail->description!!}
                  @if ($errors->has('description'))
                    <span style="color: red">{{ $errors->first('description') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-2">

                  <!-- <input type="text" class="form-control" id="mrp" name="mrp" placeholder="mrp" value="{{$productDetail->mrp}}" readonly> -->
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="mrp" name="mrp" placeholder="MRP" required="" min="0" value="{{$productDetail->mrp}}" readonly>
                  </div>
                  @if ($errors->has('mrp'))
                    <span style="color: red">{{ $errors->first('mrp') }}</span>
                  @endif
                </div>
             
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Discounted Price</label>
                <div class="col-sm-2">
                 <!--  <input type="text" class="form-control" id="price" name="price" placeholder="Discount" value="{{$productDetail->price}}" readonly> -->
                 <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                      <input type="number" class="form-control" id="price" name="price" placeholder="Discount" min="0" value="{{$productDetail->price}}" readonly>
                  </div>
                  @if ($errors->has('price'))
                    <span style="color: red">{{ $errors->first('price') }}</span>
                  @endif
                </div>
              

             
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Discount %</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount %" value="{{$productDetail->discount}}" readonly>
                  @if ($errors->has('discount'))
                    <span style="color: red">{{ $errors->first('discount') }}</span>
                  @endif
                </div>
              </div>
           {{-- <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">GST %</label>
                <div class="col-sm-2">
                 <input type="number" class="form-control" id="gstper" name="gstper" value="5"  min="0" readonly>
                  @if ($errors->has('gst'))
                    <span style="color: red">{{ $errors->first('gst') }}</span>
                  @endif
                </div>
             
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">GST Amount</label>
                <div class="col-sm-2">
                   <div class="input-group">
                  <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                  <input type="number" class="form-control" id="gst" name="gst" placeholder="GST Amount" required min="0" value="{{$productDetail->gst}}" readonly>
                </div>
                  @if ($errors->has('gst'))
                    <span style="color: red">{{ $errors->first('gst') }}</span>
                  @endif
                </div>
                @php($Amount = $productDetail->mrp  - $productDetail->price)
                @php($saveAmount = $Amount)
                @php($TotalAmount = $productDetail->mrp - $Amount)
                @php($GstAmount = $TotalAmount * 5 / 100)
                @php($finalAmountAfterGst = $TotalAmount + $GstAmount)
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Final amount after GST</label>
                <div class="col-sm-2">
                   <div class="input-group">
                  <div class="input-group-prepend">
                        <span class="input-group-text">₹</span>
                      </div>
                  <input type="number" class="form-control" id="gst" name="gst" placeholder="GST Amount" required min="0" value="{{$finalAmountAfterGst}}" readonly>
                </div>
                  @if ($errors->has('gst'))
                    <span style="color: red">{{ $errors->first('gst') }}</span>
                  @endif
                </div>
              </div> --}}

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">SKU</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU" value="{{$productDetail->sku}}" readonly>
                  @if ($errors->has('sku'))
                    <span style="color: red">{{ $errors->first('sku') }}</span>
                  @endif
                </div>
            
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">Barcode</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="barcode" name="barcode" placeholder="barcode" value="{{$productDetail->barcode}}"  readonly>
                  @if ($errors->has('barcode'))
                    <span style="color: red">{{ $errors->first('barcode') }}</span>
                  @endif
                </div>
             
                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">New Arrival</label>
                <div class="col-sm-2">
                  @if($productDetail->is_new_arrival == 1)
                    ON
                  @else
                    OFF
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-1 col-form-label">Trending</label>
                <div class="col-sm-1">
                  @if($productDetail->is_trending == 1)
                    ON
                  @else
                    OFF
                  @endif
                </div>
             
                <label for="exampleInputPassword2" class="col-sm-1 col-form-label">Featured</label>
                <div class="col-sm-1">
                  @if($productDetail->is_featured == 1)
                    ON
                  @else
                    OFF
                  @endif
                  
                </div>
              
                <label for="image" class="col-sm-1 col-form-label">Default Image</label>
                <div class="col-sm-3">
                  <img src="{{url('assets/upload_images/product')}}/{{$productDetail->image}}"  style="width:100px;height: 100px;"> 
                </div>

                <label for="exampleInputPassword2" class="col-sm-2 col-form-label">HSN No</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="sku" name="sku" value="{{$productDetail->hsn_no}}" readonly>
                  @if ($errors->has('sku'))
                    <span style="color: red">{{ $errors->first('sku') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row" style="text-align: center;">
                <h3 class="col-sm-12">Product Image</h3>
              </div>
              <div id="allProduct">
                <div class="form-group row" >
                  <label for="image" class="col-sm-3 col-form-label">Other Image</label>
                  @foreach($productDetail->allMedia as $key_media => $product_media)
                    <div class="col-sm-2">
                      <img src="{{url('assets/upload_images/product')}}/{{$product_media->product_image}}"  style="width:100px;height: 100px;"> 
                    </div>
                @endforeach
                </div>
              </div>

              <div class="form-group row" style="text-align: center;">
                <h3 class="col-sm-12">Available Sizes</h3>
              </div>
              <div id="allSize">
                @foreach($productDetail->allSize as $key_size => $product_size)
                <div class="form-group row" >
                  <label for="image" class="col-sm-1 col-form-label">Size</label>
                  <div class="col-sm-2">
                      <input type="text" class="form-control" name="qty[]" value="{{$product_size->name}}" readonly>
                  </div>
                  
                  <label for="image" class="col-sm-1 col-form-label">Qty</label>
                  <div class="col-sm-2">
                    <input type="number" class="form-control" name="qty[]" value="{{$product_size->qty}}" readonly>
                  </div>

                  
                </div>
                @endforeach
                
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
                'url' : "{{route('removeproductimage.newarrivals','')}}/"+imageID[1],
                'type': 'GET',
                'dataType' : 'JSON',
                'success' : function(data){
                    
                }
            });
  });

   $("body").on("click",".addSize", function(){
      $( ".addSize" ).hide();
      $.ajax({
                'url' : "{{route('allsize.newarrivals','1')}}",
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

  $("body").on("focusout","#price", function(){
    var mrp = $('#mrp').val();
    var price = $('#price').val();

    var per  = price * 100 / mrp;

    $('#discount').val((100 - per).toFixed(2));

  });
</script>

<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    //var wysiwygareaAvailable = !!CKEDITOR.plugins.get( 'wysihtml5' );
    CKEDITOR.replace( 'editor' );
    
</script>
<style type="text/css">

blockquote
{
  font-style: italic;
  font-family: Georgia, Times, "Times New Roman", serif;
  padding: 2px 0;
  border-style: solid;
  border-color: #ccc;
  border-width: 0;
}

.cke_contents_ltr blockquote
{
  padding-left: 20px;
  padding-right: 8px;
  border-left-width: 5px;
}

.cke_contents_rtl blockquote
{
  padding-left: 8px;
  padding-right: 20px;
  border-right-width: 5px;
}



pre
{
  white-space: pre-wrap; /* CSS 2.1 */
  word-wrap: break-word; /* IE7 */
  -moz-tab-size: 4;
  tab-size: 4;
}

.marker
{
  background-color: Yellow;
}

span[lang]
{
  font-style: italic;
}

figure
{
  text-align: center;
  outline: solid 1px #ccc;
  background: rgba(0,0,0,0.05);
  padding: 10px;
  margin: 10px 20px;
  display: inline-block;
}

figure > figcaption
{
  text-align: center;
  display: block; /* For IE8 */
}

/*a > img {
  padding: 1px;
  margin: 1px;
  border: none;
  outline: 1px solid #0782C1;
}*/

/* Widget Styles */
.code-featured
{
  border: 5px solid red;
}

.math-featured
{
  padding: 20px;
  box-shadow: 0 0 2px rgba(200, 0, 0, 1);
  background-color: rgba(255, 0, 0, 0.05);
  margin: 10px;
}

.image-clean
{
  border: 0;
  background: none;
  padding: 0;
}

.image-clean > figcaption
{
  font-size: .9em;
  text-align: right;
}

.image-grayscale
{
  background-color: white;
  color: #666;
}

.image-grayscale img, img.image-grayscale
{
  filter: grayscale(100%);
}

.embed-240p
{
  max-width: 426px;
  max-height: 240px;
  margin:0 auto;
}

.embed-360p
{
  max-width: 640px;
  max-height: 360px;
  margin:0 auto;
}

.embed-480p
{
  max-width: 854px;
  max-height: 480px;
  margin:0 auto;
}

.embed-720p
{
  max-width: 1280px;
  max-height: 720px;
  margin:0 auto;
}

.embed-1080p
{
  max-width: 1920px;
  max-height: 1080px;
  margin:0 auto;
}
</style>
@endsection