@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .toggle-group label{
    top: 8px;
  }
</style>
<div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <h4 class="card-title">Payment mode</h4>
                </div>
                <div class="col-md-6" style="text-align: right">
                  <!-- <a href=""   class="btn btn-success">Add New</a> -->
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-4">
                  <input id="status_{{$PaymentMode['id']}}" type="checkbox" <?php echo ($PaymentMode->status == 1)?'Checked':'' ?> class="status" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-style="ios">
                </div>
              </div>
                 
                                      
                  </div>
                </div>
              </div>
            </div>
          </div>

          <script>
            $(function() {
              $('.status').change(function() {
                var status = $(this).prop('checked');
                var id = $(this).attr('id').split('_');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                  data: {'id':id['1'],'status':status},
                  url: "{{ route('paymentStatusChange') }}",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {
                      
                  },
                  error: function (data) {
                      
                  }
              });
              })
            })
          </script>

         
          </script>
          <style type="text/css">
            .toggle-group label {
              top: 2px;
          }
          </style>

@endsection