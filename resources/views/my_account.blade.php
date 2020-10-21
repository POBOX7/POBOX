@extends('new_resources.layouts.new_app') 
@section('content')
 <div class="hero-section hero-background style-02" style="background: url('../assets/images/hero_bg.jpg');">
      <h1 class="page-title">My Account</h1>
</div>   


<style>
.tabcontent {
    border-left: 1px solid #cccccc!important;
}
footer.footer {
    margin-top: 0;
}
.my_account_bg{
  background: #f7f7f7;float: left;width: 100%;padding-bottom: 30px;
    padding-top: 30px;
}
/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
 /* width: 30%;*/
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  /*width: 70%;*/
  border-left: none;
  height: 300px;
}
.tab {
  
    padding: 20px 20px 0px 20px;
}
.tabcontent {
    padding: 20px 20px 0px 20px;
}
 .tab {
    padding: 20px 20px 0px 20px;
    margin-top: 15px;
    margin-bottom: 15px;
}
    a.tablinks.active {
    color: #1d70ba !important;
}
.my_account_bg ul li a:hover {
    text-decoration: none!important;
}
      .my_account_bg ul li a {
    font-size: 13px;
    font-weight: 700;
    color: #939393!important;
    padding-left: 10px;
}
.my_account_bg .tab p {
    font-size: 15px;
    font-weight: 700;
}
.tab {
    background: #fff!important;
}
</style>
<div class="my_account_bg">
<div class="container">

      @include('new_resources.layouts.leftside_my_account') 
</div> 
</div>


@endsection
