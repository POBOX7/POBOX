@extends('admin.layouts.admin')
@section('title','Customers')
@section('content')
@php $status = array('0' => 'Deleted','1' => 'Active','2' => 'In Active'); @endphp
      <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Coupon List</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr No.</th>
                          <th>Name</th>
                          <th>Code</th>
                          <th>Type</th>
                          <th>Discount Price</th>
                          <th>Discount (%)</th>
                          <th>Valid</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @if(count($couponLists) > 0)
                        @foreach ($couponLists as $key => $couponList)
                          <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $couponList->name }}</td>
                            <td>{{ $couponList->code }}</td>
                            <td>{{ $couponList->type == 1 ? 'Flat Discount' : '% Discount' }}</td>
                            <td>{{ $couponList->total == '' ? '-----' : $couponList->total  }}</td>
                            <td>{{ $couponList->total_flat == '' ? '-----' : $couponList->total_flat}}</td>
                            <td>{{ $couponList->valid_form }} to {{ $couponList->valid_to }}</td>
                            <td>
                                  @php $checked = ''; @endphp
                                @if($couponList->status == 1)
                                  @php $checked = 'checked'; @endphp
                                @endif
                                <input type="checkbox" class="js-switch coupon_change_status" {{$checked}} data-id="{{$couponList->id}}"/>
                            </td>
                            <td>
                                <a href="{{Route('edit-coupon',$couponList->id)}}" class="btn btn-primary btn-xs edituser" data-id="{{$couponList->id}}"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="{{Route('delete-coupon',$couponList->id)}}" class="btn btn-danger btn-xs" data-id="{{$couponList->id}}"><i class="fa fa-trash-o"></i> Delete </a>
                            </td>
                        @endforeach
                      @endif   
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">User Detail</h4>
            </div>
            <div class="modal-body" id="modaldata">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
@endsection        