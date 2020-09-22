@extends('admin.layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}" />
<div class="card">
            <div class="card-body">
              <h4 class="card-title">ROLE DETAILS</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sr. No #</th>
                            <th>Role Type</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($roles))
                          @foreach($roles as $key => $role)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$role->type}}</td>
                                <td>
                                  <a href="{{route('edit.role',base64_encode($role->id) )}}" class="btn btn-outline-primary">Edit</a>
                                </td>
                            </tr>
                          @endforeach
                        @else 
                          <tr><td colspan="3"><center>No Data Found</center></td></tr>
                        @endif
                      </tbody>
                    </table>                    
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection