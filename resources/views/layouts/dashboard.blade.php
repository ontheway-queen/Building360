@extends('home')
@section('content')
@inject('dashboard','App\Models\Dashboard\Dashboard')
<?php
$abc = $dashboard->get_today_profit();
// echo '<pre>';print_r($abc);die;
?>
<div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
    <div class="container-fluid">
        <div class="row g-3 mb-3 align-items-center">
            <div class="col">
                <ol class="breadcrumb bg-transparent mb-0">
                    <li class="breadcrumb-item"><a class="text-secondary" href="{{url("/")}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div>
        </div> <!-- .row end -->
        <div class="row align-items-center">
            <div class="col-lg-1">
                <h1 class="fs-5 color-900 mt-1 mb-0"><i class="fa fa-circle" aria-hidden="true"></i> Notice</h1>
                <!--<small class="text-muted">You have 12 new messages and 7 new notifications.</small>-->
            </div>
            <div class="col-xxl-11 col-xl-11 col-lg-11 col-md-12 col-sm-12 mt-2 mt-md-0">
                {{-- <div>Dokani V4 Company Logo Here</div> --}}
                <!-- daterange picker -->
<!--                <div class="input-group">
                    <input class="form-control" type="text" name="daterange">
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Send Report"><i
                            class="fa fa-envelope"></i></button>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Download Reports"><i
                            class="fa fa-download"></i></button>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Generate PDF"><i
                            class="fa fa-file-pdf-o"></i></button>
                    <button class="btn btn-secondary" type="button" data-bs-toggle="tooltip" title="Share Dashboard"><i
                            class="fa fa-share-alt"></i></button>
                </div>-->
           
                
            
            <div class="card owl-carousel owl-theme" id="live_coins">
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">৫২ বছর পর ঢাকার ৫১ বাড়ি উদ্ধারের চেষ্টা</span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">সড়কে ছিটকে পড়া দুজনের ওপর দিয়ে চলে গেল ট্রাক</span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">গভীর রাতে আবারও গাছ কেটেছে ঢাকা দক্ষিণ সিটি, নাগরিকদের প্রতিবাদ</span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">তত্ত্বাবধায়ক সরকার নিয়ে কোনো বিদেশি চাপ নেই: ওবায়দুল কাদের</span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">মানচিত্র দেখে বুঝতে হয় এটি খাল </span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">যেকোনো দেশের দুর্নীতিবাজেরা ইউরোপে কালো তালিকাভুক্ত ও নিষিদ্ধ হবেন</span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">চীনকে টেক্কা দিয়ে রুশ তেল কিনছে ভারত, বড় পতন ওপেক থেকে আমদানি</span>
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card-body d-flex align-items-center">
                  <div class=""><i class="fa fa-bolt" aria-hidden="true"></i></div>
                  <div class="flex-fill ms-3 text-truncate">
                    <span class="fs-6 fw-bold">ভারতে সয়াবিন ও সূর্যমুখী তেলের আমদানি মূল্য কমেছে ৪৬-৫৭%</span>
                    
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        </div> <!-- .row end -->
    </div>
</div>
<!--
 start: page body 
<div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid">
        <div class="row g-3 row-deck">
            <div class="col-lg-8 col-md-12">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-shopping-cart fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">Today Sales</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_today_sales()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">Today Expense</div>
                                    <h5 class="mb-0">Tk. {{$dashboard->get_today_expense()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">Today Sales Profit</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_today_sales_profit()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title m-0">Sales Statistics</h6>
                                <div class="dropdown morphing scale-left">
                                    <a href="#" class="card-fullscreen" data-bs-toggle="tooltip"
                                        title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                                    <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                                    <ul class="dropdown-menu shadow border-0 p-2">
                                        <li><a class="dropdown-item" href="#">File Info</a></li>
                                        <li><a class="dropdown-item" href="#">Copy to</a></li>
                                        <li><a class="dropdown-item" href="#">Move to</a></li>
                                        <li><a class="dropdown-item" href="#">Rename</a></li>
                                        <li><a class="dropdown-item" href="#">Block</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ac-line-transparent" id="apex-NetSales"></div>
                            </div>
                        </div>  .card end 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title m-0">Your Balance
                        <br>
                        <br>
                        TK. {{get_current_user_balance()}}
                        </h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                                    class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-secondary text-light p-4 d-flex flex-wrap text-center">
                        <div class="px-2 flex-fill">
                            <span class="small">Sales</span>
                            <h5 class="mb-0">TK. {{$dashboard->get_this_month_sales()}}</h5>
                        </div>
                        <div class="px-2 flex-fill">
                            <span class="small">Expense</span>
                            <h5 class="mb-0">TK. {{$dashboard->get_this_month_expense()}}</h5>
                        </div>
                        <div class="px-2 flex-fill">
                            <span class="small">Profit</span>
                            <h5 class="mb-0">TK. {{$dashboard->get_this_month_expense()}}</h5>
                        </div>
                        <div class="px-2 flex-fill">
                            <span class="small">Last Sale</span>
                            <h5 class="mb-0">150</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="apex-Tickets"></div>
                    </div>
                </div>  .card end 
            </div>
            
            
            
                  <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-shopping-cart fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Sales</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_this_month_sales()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Expense</div>
                                    <h5 class="mb-0">Tk. {{$dashboard->get_this_month_expense()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Sales Profit</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_this_month_sales_profit()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar lg rounded-circle no-thumbnail"><i
                                        class="fa fa-credit-card fa-lg"></i></div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <div class="text-muted">This Month Net Profit</div>
                                    <h5 class="mb-0">TK. {{$dashboard->get_this_month_net_profit()}}</h5>
                                </div>
                                
                            </div>
                        </div>
                    </div>
            
            
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title m-0">Eventchamp Speakers</h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                                    class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar2.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Chris Fox</span></div>
                                <small class="text-muted">UI UX Designer - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar1.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Joge Lucky</span></div>
                                <small class="text-muted">UI UX Designer - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar3.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Alexander</span></div>
                                <small class="text-muted">React Developer - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar8.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Robert</span></div>
                                <small class="text-muted">Angular Master - NY USA</small>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar6.jpg" alt="">
                            <div class="flex-fill ms-3">
                                <div class="h6 mb-0"><span>Nellie</span></div>
                                <small class="text-muted">UI UX Designer - NY USA</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title mb-0">Recent Sells</h6>
                        <div class="dropdown morphing scale-left">
                            <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i
                                    class="icon-size-fullscreen"></i></a>
                            <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                            <ul class="dropdown-menu shadow border-0 p-2">
                                <li><a class="dropdown-item" href="#">File Info</a></li>
                                <li><a class="dropdown-item" href="#">Copy to</a></li>
                                <li><a class="dropdown-item" href="#">Move to</a></li>
                                <li><a class="dropdown-item" href="#">Rename</a></li>
                                <li><a class="dropdown-item" href="#">Block</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <table id="myDataTable_no_filter" class="table align-middle mb-0 card-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Peoples</th>
                                <th>Venues</th>
                                <th>Seat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>A0098</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar1.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Marshall Nichols</div>
                                    </div>
                                </td>
                                <td>123 6th St. Melbourne, FL 32904</td>
                                <td>X1</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0088</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar2.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Nellie Maxwell</div>
                                    </div>
                                </td>
                                <td>4 Shirley Ave. West Chicago, IL 60185</td>
                                <td>X1</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0067</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar3.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Chris Fox</div>
                                    </div>
                                </td>
                                <td>70 Bowman St. South Windsor, CT 06074</td>
                                <td>X2</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0045</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar1.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Marshall Nichols</div>
                                    </div>
                                </td>
                                <td>123 6th St. Melbourne, FL 32904</td>
                                <td>X1</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>A0067</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{url("public/assets")}}/img/xs/avatar8.jpg"
                                            class="rounded-circle sm avatar" alt="">
                                        <div class="ms-2 mb-0">Chris Fox</div>
                                    </div>
                                </td>
                                <td>70 Bowman St. South Windsor, CT 06074</td>
                                <td>X2</td>
                                <td>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Send Video"><i
                                            class="fa fa-envelope"></i></button>
                                    <button type="button" class="btn btn-link btn-sm text-muted"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i
                                            class="fa fa-download"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  .card end 
            </div>
        </div>  .row end 
    </div>
</div>-->
    <!-- start: page body -->
    <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
      <div class="container-fluid">
        <div class="row g-3 row-deck">
          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-7">
            <div class="card border-0 bg-transparent">
              <div class="row g-3 row-deck mb-3">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="fa fa-bank fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">Total Buildings</div>
                      <div><span class="h4">13,251</span></div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                  <div class="card overflow-hidden">
                    <div class="card-body">
                      <i class="fa fa-building fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">Total Flats</div>
                      <div><span class="h4">3,251</span></div>
                    </div>
                  </div>
                </div>
          
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="fa fa-group fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">Total Flat Owners</div>
                      <div><span class="h4">1,251</span></div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="fa fa-credit-card-alt fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">Total Expenses</div>
                      <div><span class="h4">75</span></div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-lg-4 col-md-6 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="fa fa-money fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">YOUR BALANCE</div>
                      <h4 class="mb-0 mt-2">TK. {{get_current_user_balance()}}</h4>
                    </div>
                    
                    {{-- <div id="apexspark1"></div> --}}
                  </div>
                </div>
                 <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="fa fa-hand-o-right fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">Total Bill</div>
                      <div><span class="h4">75000</span></div>
                    </div>
                  </div>
                </div>
                 <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="fa fa-thumbs-up fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">Total Bill Payment</div>
                      <div><span class="h4">75145</span></div>
                    </div>
                  </div>
                </div>
          
                 <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <i class="fa fa-refresh fa-lg position-absolute top-0 end-0 p-3"></i>
                      <div class="mb-2 text-uppercase">Servic Charge</div>
                      <div><span class="h4">7586</span></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row g-3 row-deck">
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Stock Quality</h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div id="apex-StockQuality" class="ac-line-transparent"></div>
              </div>
            </div> <!-- .card end -->
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Average Cost</h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div id="apex-AverageCost" class="ac-line-transparent"></div>
              </div>
            </div> <!-- .card end -->
          </div>
          <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Quality Purchase</h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div id="apex-QualityPurchase" class="ac-line-transparent"></div>
              </div>
            </div> <!-- .card end -->
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Top Selling Plans <small class="d-block text-muted">last update week ago</small>
                </h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <div id="apex-TopSellingPlans"></div>
              </div>
            </div> <!-- .card end -->
          </div>
          <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Sales Statistics</h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="card-body">
                      <div class="fw-bold h6 mb-0">11.54k USD</div>
                      <div class="text-muted small text-uppercase">Revenue</div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="card-body">
                      <div class="fw-bold h6 mb-0">5.87k USD</div>
                      <div class="text-muted small text-uppercase">Cost</div>
                    </div>
                  </div>
                </div>
                <div id="apex-SalesStatistics" class="ac-line-transparent"></div>
              </div>
            </div> <!-- .card end -->
          </div>
          <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">New Flat Owner</h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                  <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar2.jpg" alt="">
                  <div class="flex-fill ms-3">
                    <div class="h6 mb-0">Hossein Shams</div>
                    <small>Exp. 5 Year</small>
                  </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar3.jpg" alt="">
                  <div class="flex-fill ms-3">
                    <div class="h6 mb-0">Maryam Amiri</div>
                    <small>Exp. 2.5 Year</small>
                  </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar4.jpg" alt="">
                  <div class="flex-fill ms-3">
                    <div class="h6 mb-0">Cindy Anderson</div>
                    <small>Exp. 8.2 Year</small>
                  </div>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar5.jpg" alt="">
                  <div class="flex-fill ms-3">
                    <div class="h6 mb-0">Alexander</div>
                    <small>Exp. 3 Year</small>
                  </div>
                </div>
                <div class="d-flex align-items-center">
                  <img class="avatar rounded-circle" src="{{url("public/assets")}}/img/xs/avatar6.jpg" alt="">
                  <div class="flex-fill ms-3">
                    <div class="h6 mb-0">Nellie</div>
                    <small>Exp. 7 Year</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title m-0">Sales Order</h6>
                <div class="dropdown morphing scale-left">
                  <a href="#" class="card-fullscreen" data-bs-toggle="tooltip" title="Card Full-Screen"><i class="icon-size-fullscreen"></i></a>
                  <a href="#" class="more-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <ul class="dropdown-menu shadow border-0 p-2">
                    <li><a class="dropdown-item" href="#">File Info</a></li>
                    <li><a class="dropdown-item" href="#">Copy to</a></li>
                    <li><a class="dropdown-item" href="#">Move to</a></li>
                    <li><a class="dropdown-item" href="#">Rename</a></li>
                    <li><a class="dropdown-item" href="#">Block</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
                  </ul>
                </div>
              </div>
              <table id="myDataTable_no_filter" class="table myDataTable card-table mb-0">
                <thead>
                  <tr>
                    <th>Channel</th>
                    <th>Draft</th>
                    <th>Confirmed</th>
                    <th>Packed</th>
                    <th>Shipped</th>
                    <th>Invoiced</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Other</td>
                    <td>0</td>
                    <td>22</td>
                    <td>3</td>
                    <td>18</td>
                    <td>56</td>
                  </tr>
                  <tr>
                    <td>Etary</td>
                    <td>0</td>
                    <td>3</td>
                    <td>3</td>
                    <td>6</td>
                    <td>33</td>
                  </tr>
                  <tr>
                    <td>Shopify</td>
                    <td>0</td>
                    <td>2</td>
                    <td>12</td>
                    <td>18</td>
                    <td>65</td>
                  </tr>
                  <tr>
                    <td>Magento</td>
                    <td>0</td>
                    <td>16</td>
                    <td>8</td>
                    <td>11</td>
                    <td>13</td>
                  </tr>
                  <tr>
                    <td>Wordpress</td>
                    <td>0</td>
                    <td>18</td>
                    <td>16</td>
                    <td>76</td>
                    <td>22</td>
                  </tr>
                </tbody>
              </table>
            </div> <!-- .card end -->
          </div>
        </div> <!-- .row end -->
            </div>
          </div>
          
          
          
          
          
        </div> <!-- .row end -->
      </div>
    </div>
@endsection