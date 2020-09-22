@extends('admin.layouts.admin', ['pageTitle' => 'Add Category'])

@section('content')
<div class="row">
  <div class="col-md-12 d-flex align-items-stretch grid-margin">
    <div class="row flex-grow">
      
      <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">UPDATE SIZE INFORMATION</h4>
            {{-- <p class="card-description">
              Horizontal form layout
            </p> --}}
            <form class="forms-sample" action="{{route('update.sizeinformation',$id)}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
              <div class="form-group row">
                <label for="size_id" class="col-sm-1 col-form-label">Size</label>
                <div class="col-sm-3">
                  <select class="form-control" id="size" name="size_id" style="width:100%" required>
                    @foreach($sizeList as $key => $size)
                      <option value="{{$size->id}}" <?php echo ($sizeInformationDetail->size_id == $size->id)?'selected':'' ?>>{{$size->name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('size_id'))
                    <span style="color: red">{{ $errors->first('size_id') }}</span>
                  @endif
                </div>
              
                <label for="chest" class="col-sm-1 col-form-label">Chest</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="chest" name="chest" value="{{$sizeInformationDetail->chest}}" maxlength="5" onkeyup="countChar(this)" required>
                  <span id="nameLimit_chest" style="color: red;">(5/5)</span>
                  @if ($errors->has('chest'))
                    <span style="color: red">{{ $errors->first('chest') }}</span>
                  @endif
                </div>
              
                <label for="waist" class="col-sm-1 col-form-label">Waist</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="waist" name="waist" value="{{$sizeInformationDetail->waist}}" maxlength="5" onkeyup="countChar(this)" required>
                  <span id="nameLimit_waist" style="color: red;">(5/5)</span>
                  @if ($errors->has('waist'))
                    <span style="color: red">{{ $errors->first('waist') }}</span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                <label for="hips" class="col-sm-1 col-form-label">Hips</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="hips" name="hips" value="{{$sizeInformationDetail->hips}}" maxlength="5" onkeyup="countChar(this)" required>
                  <span id="nameLimit_hips" style="color: red;">(5/5)</span>
                  @if ($errors->has('hips'))
                    <span style="color: red">{{ $errors->first('hips') }}</span>
                  @endif
                </div>
              
                <label for="length" class="col-sm-1 col-form-label">Length</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="length" name="length" value="{{$sizeInformationDetail->length}}" maxlength="5" onkeyup="countChar(this)" required>
                  <span id="nameLimit_length" style="color: red;">(5/5)</span>
                  @if ($errors->has('length'))
                    <span style="color: red">{{ $errors->first('length') }}</span>
                  @endif
                </div>
              
                <label for="shoulder" class="col-sm-1 col-form-label">Shoulder</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="shoulder" name="shoulder" value="{{$sizeInformationDetail->shoulder}}" maxlength="5" onkeyup="countChar(this)" required>
                  <span id="nameLimit_shoulder" style="color: red;">(5/5)</span>
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
  $(document).ready(function() {
    var set = 5;
    var chest = $('#chest').val().length;
    var waist = $('#waist').val().length;
    var hips = $('#hips').val().length;
    var length = $('#length').val().length;
    var shoulder = $('#shoulder').val().length;
    
    remain_chest = parseInt(set - chest);
    remain_waist = parseInt(set - waist);
    remain_hips = parseInt(set - hips);
    remain_length = parseInt(set - length);
    remain_shoulder = parseInt(set - shoulder);
    $('#nameLimit_chest').text('('+remain_chest+'/'+set+')');
    $('#nameLimit_waist').text('('+remain_waist+'/'+set+')');
    $('#nameLimit_hips').text('('+remain_hips+'/'+set+')');
    $('#nameLimit_length').text('('+remain_length+'/'+set+')');
    $('#nameLimit_shoulder').text('('+remain_shoulder+'/'+set+')');
    });
</script>
<script type="text/javascript">
  function countChar(val) {
    var id = val.id;
    console.log(id);
    var len = val.value.length;
    tlength = len,
    set = 5,
    remain = parseInt(set - tlength);

    if(remain > -1){
      $('#nameLimit_'+id).text('('+remain+'/'+set+')');
    }
    
  };
</script>
@endsection