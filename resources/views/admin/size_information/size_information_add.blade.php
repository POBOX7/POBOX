@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ADD SIZE INFORMATION DETAILS</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('store.sizeinformation')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="page_id" class="col-sm-1 col-form-label">Size</label>
                <div class="col-sm-3">
                  <select class="form-control" id="size" name="size_id" style="width:100%" required>
                    @foreach($sizeList as $key => $size)
                      <option value="{{$size->id}}">{{$size->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('page_id'))
                    <span style="color: red">{{ $errors->first('page_id') }}</span>
                  @endif
                </div>
              
                <label for="chest" class="col-sm-1 col-form-label">Chest</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="chest" name="chest" placeholder="" maxlength="5" required onkeyup="countChar(this)">
                  <span id="nameLimit_chest" style="color: red;">(4/4)</span>
                  @if ($errors->has('chest'))
                    <span style="color: red">{{ $errors->first('chest') }}</span>
                  @endif
                </div>
              
                <label for="waist" class="col-sm-1 col-form-label">Waist</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="waist" name="waist" placeholder="" maxlength="5" required onkeyup="countChar(this)">
                  <span id="nameLimit_waist" style="color: red;">(4/4)</span>
                  @if ($errors->has('waist'))
                    <span style="color: red">{{ $errors->first('waist') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="hips" class="col-sm-1 col-form-label">Hips</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="hips" name="hips" placeholder="" maxlength="5" required onkeyup="countChar(this)">
                  <span id="nameLimit_hips" style="color: red;">(4/4)</span>
                  @if ($errors->has('hips'))
                    <span style="color: red">{{ $errors->first('hips') }}</span>
                  @endif
                </div>
              
                <label for="length" class="col-sm-1 col-form-label">Length</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="length" name="length" placeholder="" maxlength="5" required onkeyup="countChar(this)">
                  <span id="nameLimit_length" style="color: red;">(4/4)</span>
                  @if ($errors->has('length'))
                    <span style="color: red">{{ $errors->first('length') }}</span>
                  @endif
                </div>
              
                <label for="shoulder" class="col-sm-1 col-form-label">Shoulder</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="shoulder" name="shoulder" placeholder="" maxlength="5" required onkeyup="countChar(this)">
                  <span id="nameLimit_shoulder" style="color: red;">(4/4)</span>
                  @if ($errors->has('shoulder'))
                    <span style="color: red">{{ $errors->first('shoulder') }}</span>
                  @endif
                </div>
              </div>
              
              <button type="submit" class="btn btn-success mr-2">Submit</button>
              <a href="{{route('sizeinformation')}}"   class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<script type="text/javascript">
  function countChar(val) {
    var id = val.id;
    console.log(id);
    var len = val.value.length;
    tlength = len,
    set = 4,
    remain = parseInt(set - tlength);

    if(remain > -1){
      $('#nameLimit_'+id).text('('+remain+'/'+set+')');
    }
    
  };
</script>
@endsection