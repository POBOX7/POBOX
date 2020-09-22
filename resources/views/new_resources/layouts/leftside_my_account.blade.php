<div class="col-sm-12 col-xs-12 col-md-12 col-lg-3 account-left tab" style="border-right: 10px solid #f7f7f7 !important;margin-top: 15px;padding:0px; height: 297px!important;">
  <div class="my-account-leftbar" style="padding:0px auto;margin:0px;">
     <h3> My Account</h3>

      <p>Orders & Credits</p>
      <ul>
         <li><a href="{{route('order')}}" class="tablinks {{ Request::is('order') || Request::is('my-account') ? 'active' : null }}"  onclick="myAccountPageFunction(event, 'Orders')"  >Orders </a>
        </li>
      </ul>
      <p>Profile</p>
      <ul>
      <li>
      <a href="{{route('updateProfile')}}" class="tablinks {{ Request::is('update-profile') ? 'active' : null }}" onclick="myAccountPageFunction(event, 'update_profile')" id="defaultOpen" >Personal Information</a>
      </li>
	<li>
      <a href="{{route('addressBook')}}" class="tablinks {{ Request::is('address-book') ? 'active' : null }}" onclick="myAccountPageFunction(event, 'address_book')" >Address Book</a>
    </li>
	<li>
      <a href="{{route('update.password.user')}}" class="tablinks {{ Request::is('passsword') ? 'active' : null }}">Change Password</a>
    </li>
    	
	</ul>
	  
	<!-- <li>
      <a href="" class="tablinks" onclick="myAccountPageFunction(event, 'Tokyo')" >Payments</a>
    </li> -->

    </div>
</div>
    <style type="text/css">
.tab .my-account-leftbar p {
  font-size: 15px;
  font-weight: 700;
  border-top: 1px solid #f1f1f1;
}
a.tablinks.active {
  color: #1d70ba !important;
}
.my-account-leftbar ul li a:hover {
  text-decoration: none!important;
}
.my-account-leftbar ul li a {
  font-size: 13px;
  font-weight: 700;
  color: #939393!important;
  padding-left: 10px;
}
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  /*width: 30%;*/
  height: 318px!important;
}
    </style>