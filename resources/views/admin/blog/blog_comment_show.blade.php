@extends('admin.layouts.admin')

@section('content')


<div id="exTab2" class="container"> 
<ul class="nav nav-tabs">
      <li>
        <a  href="#1" data-toggle="tab">Blog Details</a>
      </li>
      <li class="active"><a href="#2" data-toggle="tab">Blog comments</a>
      </li>
     

    </ul>

      <div class="tab-content ">
        <div class="tab-pane" id="1">
           <div class="row">
             
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                   <script>
            function goBack() {
              window.history.back();
            }
            </script>
            <button onclick="goBack()" style="background: #00c292;color: #ffff!important;border: 0;border-radius: 3px;padding: 5px 20px;margin-bottom: 10px;">Go Back</button>
                  <h4 class="card-title">Blog Details</h4>
                </div>
             </div>
              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-4">
                  <select class="form-control" id="category" name="post_category" style="width:100%" required readonly disabled="disabled">
                      @foreach($categoryList as $key => $category)
                        <option value="{{$category->category_name}}" <?php echo ($blogDetail->category_id == $category->id)?'selected':'' ?>>{{$category->category_name}}</option>
                      @endforeach
                    </select>
                  @if ($errors->has('category_id'))
                    <span style="color: red">Please select category</span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Title</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="Title" value="{{$blogDetail->blog_title}}" required readonly>
                  @if ($errors->has('blog_title'))
                    <span style="color: red">{{ $errors->first('blog_title') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="author" class="col-sm-3 col-form-label">Author</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="author" name="author" value="{{$blogDetail->author}}" placeholder="name" required readonly>
                  @if ($errors->has('author'))
                    <span style="color: red">{{ $errors->first('author') }}</span>
                  @endif
                  
                </div>
              </div>

              <div class="form-group row">
                <label for="blog_image" class="col-sm-3 col-form-label">Image</label>
               
                <div class="col-sm-4">
                  <img src="{{url('assets/upload_images/blog')}}/{{$blogDetail->blog_image}}"  style="width:100px;height: 100px;"> 
                </div>
              </div>
              <?php 
                $date = date_create($blogDetail->blog_date);
                $newDate = date_format($date,"d-m-Y");
              ?>

              <div class="form-group row">
                <label for="blog_date" class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-4">
                  <div id="datepicker-popup" class="input-group date datepicker">
                    <input type="text" class="form-control" name="blog_date" required value="{{$newDate}}" readonly disabled="disabled">
                    <div class="input-group-addon input-group-text">
                      <span class="mdi mdi-calendar"></span>
                    </div>
                  </div>
                  @if ($errors->has('blog_date'))
                    <span style="color: red">{{ $errors->first('blog_date') }}</span>
                  @endif
                  
                </div>
              </div>

             

              <div class="form-group row">
                <label for="image" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                  <?php echo $blogDetail->blog_description ?>
                  
                </div>
              </div>

              
          
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>

<script>
    //var wysiwygareaAvailable = !!CKEDITOR.plugins.get( 'wysihtml5' );
    CKEDITOR.replace( 'editor' );
</script>
             
        </div>
        <div class="tab-pane active" id="2">
         <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                   <script>
            function goBack() {
              window.history.back();
            }
            </script>
            <button onclick="goBack()" style="background: #00c292;color: #ffff!important;border: 0;border-radius: 3px;padding: 5px 20px;margin-bottom: 10px;">Go Back</button>
                  <h4 class="card-title">Blog comments</h4>
                </div>
             </div>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($viewBlogComment))
                          @foreach($viewBlogComment as $key => $blog)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$blog->name}}</td>
                                <td>{!! $blog->comment !!}</td>
                                <td>{!! $blog->email !!}</td>
                                <td>
                                  
                                 
                                  <a onclick="showSwal({{$blog->id}})"><i class="ti-trash" style="font-size: 2rem;color: #007bfe;"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        @else 
                          <tr><td colspan="5"><center>No Data Found</center></td></tr>
                        @endif
                      </tbody>
                    </table>                    
                  </div>
                </div>
              </div>

            </div>
          </div>

            
        </div>
       
      </div>
  </div>

<hr></hr>


<style type="text/css">
 
div#exTab2 a {
    text-decoration: none;
    color: #000;
    font-size: 18px;
    font-weight: 400;
}
#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}
.tab-content{
  padding: 0!important;
}






</style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<style type="text/css">
  .nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav {
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
.nav-tabs>li {
    float: left;
    margin-bottom: -1px;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #555;
    cursor: default;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
}
.nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
}
</style>

         

          <script type="text/javascript">
            (function($) {
              showSwal = function(id){
                  swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, I am sure! '
                  }).then(function (isConfirm) {
                    if (isConfirm) {
                      window.location.replace("{{url('admin')}}/blog-comment-destroy/"+id);
                    }else{
                      //console.log('out');
                    }
                })
              }
            })(jQuery);
          </script>

@endsection