<div class="row row-sm">

   @if(count($newArrivalProductDatas) == 0)
        <div class="dropdown-cart-total align-middle cartEmpty" style="margin:Auto;">
            <div class="col-md-12">
                <img src="{{ asset('assets/images/empty-product.png')}}" width="200px">
            </div>
             <div class="col-md-12">
             <!--{{URL::current()}}--->
               <span>No products are available.</span>
            </div>   
       </div>
      @else
@foreach ($newArrivalProductDatas as $keyNewArrivalProductData => $valueNewArrivalProductData)

     @php($product_size = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$valueNewArrivalProductData->id)->pluck('size_id')->first())
     @php($productqty = App\ProductSize::select('size_id')->where('qty','!=',0)->where('product_size.product_id',$valueNewArrivalProductData->id)->get())
     @php($sizeData = App\Sizes::where('id',$product_size)->where('is_deleted',0)->first())
    <div class="col-6 col-md-4 loadMore list-group">
        <div class="product-default">
            <figure style="height: 400px;">
                @if($valueNewArrivalProductData->discount !== 0)
                <div class="labels" style="line-height: 2;color: #fff;font-weight: 600;text-transform: uppercase;position: absolute;z-index: 2;width: 54px;top: .8em;font-size: 10px;left: 0.8em;">
                    <div class="onsale" style="background: blue;padding: 0px 0px 0px 6px;width: 34px;">  {{$valueNewArrivalProductData->discount}}% </div>
                </div>
                @endif
                <a href="{{route('productDetail',$valueNewArrivalProductData['id'])}}">
                    <img src="{{ asset('assets/upload_images/product/thumb/') }}/{{$valueNewArrivalProductData['image']}}" style="height: -webkit-fill-available;width: auto!important;">
                </a>
                <!--<a  data-toggle="modal" id="product_{{$valueNewArrivalProductData['id']}}" data-target="#addCartModal2" class="btn-quickviewss aaaaa view-details" title="Quick View">Quick View</a>-->
               <!--  <button class="btn-icon btn-add-cart view-details" id="product_{{$valueNewArrivalProductData['id']}}" data-toggle="modal" data-target="#addCartModal2"><i class="icon-bag"></i>ADD TO CART</button> -->
            </figure>
            <div class="product-details">
                <h2 class="product-title">
                    <a href="{{route('productDetail',$valueNewArrivalProductData['id'])}}">{{str_limit($valueNewArrivalProductData->name, 30)}}</a>
                </h2>
                <div class="price-box">
                    @if($valueNewArrivalProductData['discount'] != 0 )
                    <span class="product-price ">₹{{$valueNewArrivalProductData['mrp']}}</span>
                    <span class="product-prices price">₹{{$valueNewArrivalProductData['price']}}</span>
                    @else
                    <span class="product-prices price">₹{{$valueNewArrivalProductData['mrp']}}</span>
                    @endif
                </div>
                <!-- End .price-box -->
                <div class="product-action">
                    @if($user_id == NULL)
                                                                
                        
                      <a href="#" id="login" data-toggle="modal" data-dismiss="modal"  data-target="#login"   class="btn-icon-wish"><i class="icon-heart"></i></a>
                    @else
                         @if (Auth::check())
                            @php($wishlist = App\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$valueNewArrivalProductData['id'])->first())
                         
                            <a href="javascript:void(0)" class="btn-icon-wish wishlist added" data-mid="{{$valueNewArrivalProductData->id}}"><i class="{{$wishlist != null ?'icon-heart-1':'icon-heart'}} wishCustom-{{$valueNewArrivalProductData->id}}"></i></a>                             
                            @else
                             <a href="javascript:void(0)" class="btn-icon-wish wishlist added" data-mid="{{$valueNewArrivalProductData->id}}"><i class="icon-heart  wishCustom-{{$valueNewArrivalProductData->id}}"></i></a>
                        @endif      
                     
                    @endif
                    @if(count($productqty) != 0)
                     <button class="btn-icon btn-add-cart view-details addcart" data-toggle="modal" data-size="{{$sizeData->id}}" data-qty="1" data-mid="{{$valueNewArrivalProductData->id}}" data-mrp="{{$valueNewArrivalProductData['mrp']}}" data-price="{{$valueNewArrivalProductData['price']}}" id="product_{{$valueNewArrivalProductData['id']}}"><i class="icon-bag"></i>ADD To Cart</button>
                    @else
                       <a  class="paction add-cart cart"  title="Out of stock" style="margin-left: 10px;">
                                                        <span>Out of stock</span>
                                                        </a>
                    @endif                      
                     <input type="hidden" name="user_id" name="user_id" id="user_id" value="{{$user_id}}">
                    

                    <!-- <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                    <!--   <a  data-toggle="modal" data-target="#product-{{$valueNewArrivalProductData['id']}}" class="btn-quickviewss" title="Quick View"><i class="fas fa-external-link-alt"></i></a> -->
                    <!-- Modal -->
                    
                </div>
            </div>
            <!-- End .product-details -->
        </div>
    </div>
    @endforeach 
    
    
   @endif  
</div>

@if(count($newArrivalProductDatas) >= 9)
<div class="col-md-12" style="text-align: center;background: #fff!important;
color: #000!important;" >
<a   name="load_more" id="load_more" class="btn btn" style="border: 1px solid #ddd!important;margin-top: 30px;">Load More</a>
</div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <style>
a#load_more:hover {
    background: #1b65a9!important;
    color: #fff !important;
    border: 1px solid #ddd;
}
 
  .col-6.col-md-4.loadMore.list-group{ display:none; }
</style>
  <script>
  $(document).ready(function(e) {
     var limit = 9;
     $(".col-6.col-md-4.loadMore.list-group").slice(0, limit).show();
     $('#load_more').click(function (e) {
         limit += 9;
         e.preventDefault();
         
         count = $(".col-6.col-md-4.loadMore.list-group").length;
         $(".col-6.col-md-4.loadMore.list-group").slice(0, limit).show();
         if (count + 5 >= $(".col-6.col-md-4.loadMore.list-group").length) {
           $(this).hide();
    
            }
     });
     //var lenght_name =  $(".loadMore li").length;
  });
 </script>   

<style>

  .toast{

    top: 18%;
    right: 1%;
    z-index: 999999;
    margin-top: 0px;
    width: 346px;
    position: fixed;
   }
   .hidden{
    display: none;
   }
}
a.paction.add-cart.cart span:hover  ,.add-cart::before:hover {
    color: #ffff!important;
    font-weight: 500!important;
}
</style>
<div class="alert alert-success postition-fixed toast hidden wishlist-success"></div>   

</div>
 
