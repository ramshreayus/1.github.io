@extends('layouts.master')
@section('title', 'Entrepreneur Dashboard')
@section('pagebody')

    
        
        <!-- Start Inner Contents -->               
        
        <section class="myaccount-header">
            <div class="container">
                <h1>Entrepreneur</h1>
                <p class="col-md-8 col-md-offset-2">Create, analyze, and optimize your business plan, Maximize your entrepreneurship success with supporters, Secure flexible funding for your business from investors.</p>
            </div>
        </section>  
    <section class="myaccount-body">
    <div class="myaccount-document"> 
    <div class="container">
                                        @if(Session::has('message'))
                                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                                        @endif
    </div>
    </div>
    </section>    

        <section class="myaccount-body">            
            <div class="container">
                <div class="myaccount-document">
                    <div id="verticalTab" class="v-tabs">
                        <div class="vtab-nav clearfix"> 
                            <ul class="resp-tabs-list clearfix">
                                <li  class="side_menu">Dashboard</li>
                                <li class="side_menu project_profile" id="project_profile">Project Profile</li>
                                <li class="side_menu" id="invite" >Invite</li>
                                <li class="side_menu" id="busoness_plan_summary">Business Plan</li>
                                <li class="side_menu" id="project_Status">Project Status</li>                   
                                <li class="side_menu" id="campaign">Campaign</li>
                                <li class="side_menu" id="blog">Blog</li>
                                <li class="side_menu" id="Orders"><a href="#">Orders</a></li>
                                <li class="side_menu" id="Orders"><a href="{{url('/market-place/dashboard')}}">MarketPlace </a></li></a>
                           </ul>
                           <ul class="resp-tabs-list right-tab  clearfix">
                                <li class="side_menu" id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                                <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>                 
                                <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="resp-tabs-container">              
                            <div id="dashboard" class="clearfix"><!-- Dashboard -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="campign_sharing clearfix">
                                            <div class="social_sharing invite_sharing pull-left">
                                                <button class="btn btn-warning invite_button"><i class="fa fa-user"></i> Invite Others</button>
                                            </div>                  
                                            <div class="pull-right manage_compaing ">                        
                                                <a href="javascript:void(0)" class="btn btn-danger campaign-list"><i class="fa fa-money"></i> Manage Campaigns</a>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-section">
                                    <!--div class="dashboard-section-overlay">  
                                        <div class="alert alert-danger fade in dashboard-alert" id="message">
                                            <p> Your Project Profile is not yet Created/Approved. Please do it now by Clicking <a href="javascript:void(0)" class="btn btn-danger go_projectprofile">Here</a> OR <a class="btn btn-success" href="#">Contact Administrator</a></p>
                                        </div>
                                    </div-->
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-red">
                                                <div class="content" > <a href="javascript:void(0)" class="busoness_plan_summary">Update Your Business Plan Summary To Get More Investors</a> </div>
                                                <div class="icon"><i class="fa fa-file-text"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-turquoise">
                                                <div class="content" > <a href="javascript:void(0)" class="project_Status">Keep Investors Up-to-date on Project Status</a><br /><br /></div>
                                                <div class="icon"><i class="fa fa-flag"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-blue">
                                                <div class="content" > <a href="{{url('/messages')}}">You Have 0 Unread Messages In Your Inbox.</a> <br /><br /></div>
                                                <div class="icon"><i class="fa fa fa-envelope"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-purple">
                                                <div class="content" >
                                                    <div class="text-left "  style="font-size:30px; padding-bottom: 10px;">$<span class="timer" data-to="0" data-speed="2500"></span></div>
                                                    <a href="#"> Total Fund Raised So Far</a>
                                                </div>
                                                <div class="icon"><i class="fa fa-bar-chart-o"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Fund Raised Within The Last 7 Days</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                     @if(count($project_fundings) > 0) 
                                            <table class="table"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Title</th>
                                                        <th style="width:15%;">Amount</th>
                                                        <th style="width:15%;">Investor Name</th>
                                                        <th style="width:20%;">Last Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project_fundings as $project_funding)
                                                    <tr>
                                                        <td style="">{{$project[0]->title}}</td>
                                                        <td>${{$project_funding->amount}}</td>
                                                        <?php $iname = DB::table('userdetails')->where('id',$project_funding->created_by)->get(); ?>
                                                        <td>{{$iname[0]->firstname}} {{$iname[0]->lastname}}</td>
                                                        <td>{{$project_funding->updated_at}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" > There Are No Funds In Your Projects</div>@endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Investors In Your Locality </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                     @if(count($investors) > 0) 
                                            <table class="table"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Title</th>
                                                        <th style="width:15%;">Content</th>
                                                        <th style="width:20%;">Last Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($investors as $investor)
                                                    <tr>
                                                        <th style="">{{$investor->firstname}}</th>
                                                        <td>{{$investor->lastname}}</td>
                                                        <td>{{$investor->country_interest}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" > There Are No Investors In Your Locality</div>@endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Latest Messages</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="r3_notification db_box" style="max-height:200px; min-height:200px;">
                                                        
                                                         @if(count($recentmsgs) > 0) 
                                            <table class="table"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Title</th>
                                                        <th style="width:15%;">Content</th>
                                                        <th style="width:20%;">Last Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($recentmsgs as $recentmsg)
                                                    <tr>
                                                        <td style="">{{$recentmsg->subject}}</td>
                                                        <td>${{$recentmsg->message}}</td>
                                                        <td>{{$recentmsg->updated_at}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" > There Are No Messages In Your Inbox</div>@endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Supporters Matched with your profile</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body" style="height:320px;">
                                                    <div class="alert alert-warning alert-dismissable" style=""> No Data Found</div>
                                                    <div class="row profile-widget-dashboard">
                                                        <div class="col-md-12 col-sm-12 col-xs-12"> 
                                                            <div class="clearfix profile-widget">
                                                                <div class="col-md-3">
                                                                </div>
                                                                <div class="col-md-9"> 
                                                                    <a href="#" title="title" rel="bookmark"> User Nick Name </a>
                                                                    <p class="uprofile-title"><span class="location">Country</span></p>
                                                                    <div class="profile-rating pull-right">  </div>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="{{url('/supporter')}}">View All Supporters</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Investors Matched with your profile</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body investors-widget" style="min-height:150px;">
                                                    <div class="alert alert-warning alert-dismissable" style=""> No Data Found</div>
                                                    <div class="col-md-6 ">
                                                        <div class="profile-item">
                                                            <div class="col-sm-5"> <a href="#" title="title" rel="bookmark">ID</a> </div>
                                                            <div class="col-sm-7">
                                                                <h5 style="margin-top:0px;"> <a href="#" title="title" rel="bookmark"> Nice Name </a></h5>
                                                                <p class="uprofile-title">United States</p>
                                                                <p class="pull-right"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="{{url('/investor')}}">View All Investors</a> </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Your Project Latest Update</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body dashboard-timeline-widget" style="min-height:150px;">
                                                    <div class="project-status-timeline dashboard-timeline">             
                                                        @if(count($project) > 0)                   
                                                        <div class="timeline-container top-circle">
                                                            <section id="cd-timeline" class="cd-container">
                                                                <div class="cd-timeline-block ">
                                                                    <div class="cd-timeline-img cd-warning"> <i class="fa fa-tag"></i> </div>
                                                                    <div class="cd-timeline-content bgtwo bounce-in">
                                                                        <h2>{{$project[0]->title}}</h2>
                                                                        {{$project[0]->content}}
                                                                        <span class="cd-date"><span>{{$project[0]->updated_at}}</span>
                                                                            <h3 class="percentage-completed"><span class="timer" data-to="{{$project[0]->progress}}" data-speed="2500"></span>% <small>completed</small></h3> 
                                                                        </span> 
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>  
                                                        @else
                                                        <div class="alert alert-warning alert-dismissable"> No Data Found</div> 
                                                        @endif            
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="javascript:void(0)" class="project_Status">View All Updates</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Your Appointment with Supporters</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body" >
                                                    <div id="calendar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel facebook-box">
                                                <div class="panel-body">
                                                    <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000"  style="height:320px"> 
                                                        <span class="tile-title pull-right">Latest News</span> <i class="fa fa-rss"></i>
                                                        <div>
                                                            <h2 class="no-m"><a href="#">{{$recentblogs[0]->name}}</a></h2>
                                                            <span class="tile-date">{{$recentblogs[0]->created_at}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <!-- <div class="row">
                                        <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Your Project's Cart </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body" style="height:250px;">
                                                    <div class="col-md-4">
                                                        <div class="project-item">
                                                            <div class="col-sm-12 project-image"> 
                                                                <a href="#" title="title" rel="bookmark">
                                                                    <img src=""  alt="" class="" style="height: 60px;"/>
                                                                    <img src="{{url('/')}}/assets_new/images/sample-company-logo.png"   alt=""/>
                                                                </a> 
                                                            </div>
                                                            <div class="col-sm-12 project-info-dashboard">
                                                                <h5 > <a href="#" title="title" rel="bookmark"> title </a></h5>
                                                                <p class="uprofile-title">City State, Country</p>
                                                            </div>
                                                            <div style="margin-left:10px;"></div> 
                                                        </div>
                                                    </div>          
                                                    <div class="alert alert-warning alert-dismissable" style=""> No Data Found</div>
                                                    <div class="alert alert-warning alert-dismissable" style=""> No Data Found</div>
                                                </div>
                                                <div class="panel-footer text-center">  </div>
                                            </div>
                                        </div>
                                    </div>  -->   
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Projets Details </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats" style="min-height:200px;">  
                                                         @if(count($organizations) > 0)                   
                                                        <table class="table disktop-view">
                                                            <thead>
                                                                <tr>
                                                                    <th>Organization Logo</th>
                                                                    <th>Organization Name</th>
                                                                    <th>Contact Name</th>
                                                                    <th>Email</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>  
                                                    @foreach($organizations as $organization)                
                                                                <tr>
                                                                    <td><img src="{{$organization->org_logo}}" class="gravatar img-circle  avatar avatar-50 um-avatar" width="50" height="50" alt=""></td>
                                                                    <th ><a href="#">{{$organization->name}}</a></th>
                                                                    <td>{{$organization->firstname}} {{$organization->lastname}}</td>
                                                                    <td>{{$organization->email}}</td>
                                                                </tr>
                                                    @endforeach
                                                            </tbody>
                                                        </table>
                                            @else
                                                        <div class="alert alert-warning alert-dismissable">There Are No Organizations.</div>@endif     
                                                    </div>              
                                                </div>        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="fullCalModals" class="modal fade">
                                  <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">Ã—</span> <span class="sr-only">close</span></button>
                                                <h4 id="modalaTitle" class="modal-title">Appointment with <span id="modalsTitle"></span></h4>
                                            </div>
                                            <div id="modalaBody" class="modal-body"> <strong>Date</strong> : <span id="modelsDate"></span><br>
                                                <strong>Start Time</strong> - <span id="startTime"></span><br>
                                                <strong>End Time</strong> - <span id="endTime"></span><br>
                                                <strong>Message</strong> - <span id="messageContent"></span><br>
                                                <div id="modalaStatusResult"><strong>Status</strong> - <span class="bodyResult"></span> </div>
                                                <div id="moduleReply"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="update_form"><!-- Profile Profile -->
                                <div class="ajax-loader dashboard-section-overlay" style="display:none"> 
                                    <img style="margin-top:150px" src="{{url('/')}}/assets_new/images/ajax-loader.gif"  />
                                </div>
                                <ul class="nav nav-tabs responsive project_create" id="myTab">
                                    <div class="liner"></div>
                                    <li class="active">
                                        <a data-toggle="tab" href="#panel_129">
                                            <span><i class="tracking-1"></i></span>
                                            <br class="mobile-hide">
                                            <div class="icon-txt">Overview</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#panel_181" class="">
                                            <span><i class="tracking-2"></i></span>
                                            <br class="mobile-hide">
                                            <div class="icon-txt">Company Information</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#panel_182" class="">
                                            <span><i class="tracking-3"></i></span>
                                            <br class="mobile-hide">
                                            <div class="icon-txt">Products / Services</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#panel_183" class="">
                                            <span><i class="tracking-4"></i></span>
                                            <br class="mobile-hide">
                                            <div class="icon-txt">Management Team</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#panel_180" class="">
                                            <span><i class="tracking-5"></i></span>
                                            <br class="mobile-hide">
                                            <div class="icon-txt">Funding Information</div>
                                        </a>
                                    </li>
                                </ul>           
                                <div class="tab-content responsive project_form">                
                                    <div class="tab-pane active" id="panel_129" >
                                        <!-- <img src="{{url('/')}}/assets_new/images/project_one.png" alt="" /> -->
                                        <div class="cust-afc-ifrm" >
                                            <form id="post" class="" @if(count($entrepreneur) > 0) action="{{url('/')}}/entrepreneur/{{$entrepreneur[0]->id}}/update" @else action="{{url('/')}}/entrepreneur/store" @endif method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Women Name  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="name" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->name}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Logo <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                             @if(count($entrepreneur) > 0)
                                                             @if($entrepreneur[0]->logo != '')
                                                            <img src="{{$entrepreneur[0]->logo}}" alt="" height="60" width="60" />
                                                            <input name="logo" value="{{$entrepreneur[0]->logo}}" class="btn" type="hidden">
                                                            @endif @else
                                                            <input name="logo" id="friend_name-0" value="" class="btn"  type="file" required="">
                                                             @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">City  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="city" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->city}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">State  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="state" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->state}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Country   <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="country" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->country}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Postal Code  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="zipcode" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->zipcode}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Gender   <span class="acf-required">*</span> </label>
                                                            <ul>
                                                            <li> <label> <input type="radio" value="Male" name="gender" @if(count($entrepreneur) > 0) @if($entrepreneur[0]->gender == 'Male') checked @endif @endif /> Male</label> </li>
                                                            <li> <label> <input type="radio" value="Female" name="gender" @if(count($entrepreneur) > 0) @if($entrepreneur[0]->gender == 'Female') checked @endif @endif /> Female</label> </li>
                                                            <li> <label> <input type="radio" value="Others" name="gender" @if(count($entrepreneur) > 0) @if($entrepreneur[0]->gender == 'Others') checked @endif @endif /> Others</label> </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Women Stage  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <?php $women_stages = DB::table('women_stage')->get(); ?>
                                                            <select name="women_stage" class="form-control" required="">
                                                                @foreach($women_stages as $women_stage)
                                                                <option value="{{$women_stage->id}}" @if(count($entrepreneur) > 0) @if($entrepreneur[0]->women_stage == $women_stage->id) selected="" @endif @endif >{{$women_stage->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Website  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="website" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->website}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">LinkedIn URL   <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="linked_url" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->linked_url}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Twitter URL  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="tw_url" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->tw_url}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Facebook URL  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="fb_url" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->fb_url}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Blog URL  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="blog_url" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->blog_url}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Google+ URL  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <input name="gp_url" id="friend_name-0" @if(count($entrepreneur) > 0) value="{{$entrepreneur[0]->gp_url}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input name="savefor" value="1" type="hidden">
                                                <div class="acf-form-submit">
                                                    <input value="Save" name="save" class="button button-primary button-large" type="submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="panel_181" >
                                        <!-- <img src="{{url('/')}}/assets_new/images/project_two.png" alt="" /> -->
                                        <div class="cust-afc-ifrm" >
                                            <form id="post" class="" @if(count($ent_company) > 0) action="{{url('/')}}/entrepreneur/{{$ent_company[0]->id}}/update" @else action="{{url('/')}}/entrepreneur/store" @endif method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}  
                                                <!--img src="images/project_one.png" alt="" /-->
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <label style="display: block;">Company Overview  <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>
                                                            <textarea class="form-control" name="overview" required=""> @if(count($ent_company) > 0) {{$ent_company[0]->overview}} @endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <label style="display: block;">SECTOR   <span class="acf-required">*</span> <i class="fa fa-question-circle" ></i></label>

                                                            <?php $categories = DB::table('categories')->where('groupid','1')->get(); ?>
                                                            <ul>
                                                                @foreach($categories as $categorie)
                                                            <li> <label> <input type="checkbox" value="{{$categorie->id}}" name="category[]" @if(count($ent_company) > 0) @if($ent_company[0]->category == $categorie->id) checked="" @endif @endif /> {{$categorie->name}}</label> </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>  
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Prior Year Revenue  <i class="fa fa-question-circle" ></i></label>
                                                            <input name="p_yr_revenue" id="friend_name-0"  @if(count($ent_company) > 0) value="{{$ent_company[0]->p_yr_revenue}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Current Year Revenue  <i class="fa fa-question-circle" ></i></label>
                                                            <input name="c_yr_revenue" id="friend_name-0"  @if(count($ent_company) > 0) value="{{$ent_company[0]->c_yr_revenue}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Next Year Revenue  <i class="fa fa-question-circle" ></i></label>
                                                            <input name="n_yr_revenue" id="friend_name-0"  @if(count($ent_company) > 0) value="{{$ent_company[0]->n_yr_revenue}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Founded Date  <i class="fa fa-question-circle" ></i></label>
                                                            <input name="founded_date" @if(count($ent_company) > 0) value="{{$ent_company[0]->founded_date}}" @else value="" @endif class="form-control"  type="date" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Women Plan  </label>
                                                            <div class="business-plan">
                                                                Upload a business plan you already have or <a href=' @if(count($ent_company) > 0) {{$ent_company[0]->filepath}} @endif' download=""></a><span> Download the business plan template </span>, fill it out to best of your ability, and upload.
                                                            </div>
                                                            <!-- No File selected  <button type="button" class="btn">Add File</button> -->
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">No of employees  <i class="fa fa-question-circle" ></i></label>
                                                            <input name="no_employee" id="friend_name-0"  @if(count($ent_company) > 0) value="{{$ent_company[0]->no_employees}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <label style="display: block;">Documents / Links  <i class="fa fa-question-circle" ></i></label>
                                                            <div class="repeater-cust"> 
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">File</label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                            <input name="filepath" id="friend_name-0" value="" class="btn"  type="file">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Title</label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="filetitle" id="friend_name-0" @if(count($ent_company) > 0) value="{{$ent_company[0]->filetitle}}" @else value="" @endif class="form-control"  type="text">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Link</label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="fileurl" id="friend_name-0" @if(count($ent_company) > 0) value="{{$ent_company[0]->fileurl}}" @else value="" @endif class="form-control"  type="text">
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="acf-form-submit">
                                                                    <input value="Add New Documents / Links" class="btn" type="submit">
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <label style="display: block;">Project Featured Image  <i class="fa fa-question-circle" ></i></label>
                                                            <input name="project_img" id="friend_name-0" value="" class="btn"  type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input name="savefor" value="2" type="hidden">
                                                <div class="acf-form-submit">
                                                    <input value="Save" class="button button-primary button-large" type="submit">
                                                </div>
                                            </form> 
                                        </div>  
                                    </div>
                                    <div class="tab-pane" id="panel_182" >
                                        <!-- <img src="{{url('/')}}/assets_new/images/project_three.png" alt="" /> -->
                                        <div class="cust-afc-ifrm" >
                                            <form id="post" class="" action="{{url('/')}}/entrepreneur/store" method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}  
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <label style="display: block;">Products / Services  <i class="fa fa-question-circle" ></i></label>
                                                            <div class="repeater-cust"> 
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Name <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="name" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Description <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <textarea name="description" class="form-control" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Image <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                    <input name="product_img" id="friend_name-0" value="" class="btn"  type="file">
                                                                    </div>
                                                                </div>                                                            
                                                             <!--    <div class="acf-form-submit">
                                                                    <input value="Add New Products / Services" class="btn" type="submit">
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <label style="display: block;">Markets  <i class="fa fa-question-circle" ></i></label>
                                                            <div class="repeater-cust"> 
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Market <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="market" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Size <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="market_size" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Annual Growth Rate <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="growth_rate" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div><!-- 
                                                                <div class="acf-form-submit">
                                                                    <input value="Add New Market" class="btn" type="submit">
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <input name="savefor" value="3" type="hidden">  
                                                <div class="acf-form-submit">
                                                    <input value="Save" class="button button-primary button-large" type="submit">
                                                </div>
                                            </form>
                                        </div>  
                                    </div>
                                    <div class="tab-pane" id="panel_183" >
                                       <!--  <img src="{{url('/')}}/assets_new/images/project_four.png" alt="" /> -->
                                       <div class="cust-afc-ifrm" >
                                            <form id="post" class="" action="{{url('/')}}/entrepreneur/store" method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}  
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                                            <label style="display: block;margin-bottom:20px;">Management  <i class="fa fa-question-circle" ></i></label>
                                                            <div class="repeater-cust"> 
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Full Name <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="name" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Position  <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="position" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Email  <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="email" id="friend_name-0" value="" class="form-control"  type="email" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Description   <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <textarea name="description" class="form-control"  type="text" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Photograph  <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                    <input name="photograph" id="friend_name-0" value="" class="btn"  type="file">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">LinkedIn URL  <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="linked_url" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Facebook URL  <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="fb_url" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-3 col-lg-3 col-xs-12">  
                                                                        <label style="display: block;">Twitter URL  <i class="fa fa-question-circle" ></i></label>
                                                                    </div>
                                                                    <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">  
                                                                        <input name="tw_url" id="friend_name-0" value="" class="form-control"  type="text" required="">
                                                                    </div>
                                                                </div><!-- 
                                                                <div class="acf-form-submit">
                                                                    <input value="Add New Team Member" class="btn" type="submit">
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                        <input name="savefor" value="4" type="hidden"> 
                                                <div class="acf-form-submit">
                                                    <input value="Save" class="button button-primary button-large" type="submit">
                                                </div>
                                            </form>
                                        </div>  
                                    </div>
                                    <div class="tab-pane" id="panel_180" >
                                        <!-- <img src="{{url('/')}}/assets_new/images/project_five.png" alt="" /> -->
                                        <div class="cust-afc-ifrm" >
                                            <form id="post" class="" @if(count($ent_funding) > 0) action="{{url('/')}}/entrepreneur/{{$ent_funding[0]->id}}/update" @else action="{{url('/')}}/entrepreneur/store" @endif method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}  
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Goal <i class="fa fa-question-circle" ></i></label>
                                                            <input name="goal" id="friend_name-0" @if(count($ent_funding) > 0) value="{{$ent_funding[0]->goal}}" @else value="" @endif class="form-control"  type="text" required="" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Fund Raised So Far <i class="fa fa-question-circle" ></i></label>
                                                            <input name="fund_for" id="friend_name-0" @if(count($ent_funding) > 0) value="{{$ent_funding[0]->fund_for}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Funding type <i class="fa fa-question-circle" ></i></label>
                                                            <select class="form-control" name="fund_type">
                                                                <option value="Equity" selected="selected">Equity</option>
                                                                <option value="Convertible Debt">Convertible Debt</option>
                                                                <option value="Debt Financing">Debt Financing</option>
                                                                <option value="Grant">Grant</option>
                                                                <option value="Royalty">Royalty</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Private Funding  <i class="fa fa-question-circle" ></i></label>
                                                            <input name="fund_pvt" id="friend_name-0" @if(count($ent_funding) > 0) value="{{$ent_funding[0]->fund_pvt}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Pre-Money Valuation <i class="fa fa-question-circle" ></i></label>
                                                            <input name="pre_money" id="friend_name-0" @if(count($ent_funding) > 0) value="{{$ent_funding[0]->pre_money}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Interest / Dividend <i class="fa fa-question-circle" ></i></label>
                                                            <input name="interest" id="friend_name-0" @if(count($ent_funding) > 0) value="{{$ent_funding[0]->interest}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Previous Funding <i class="fa fa-question-circle" ></i></label>
                                                            <input name="prev_fund" id="friend_name-0" @if(count($ent_funding) > 0) value="{{$ent_funding[0]->prev_fund}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                            <label style="display: block;">Funding Commitments <i class="fa fa-question-circle" ></i></label>
                                                            <input name="fund_commitment" id="friend_name-0" @if(count($ent_funding) > 0) value="{{$ent_funding[0]->fund_commitment}}" @else value="" @endif class="form-control"  type="text" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                        <input name="savefor" value="5" type="hidden"> 
                                                <div class="acf-form-submit">
                                                    <input value="Save" class="button button-primary button-large" type="submit">
                                                </div>
                                            </form>
                                        </div>  
                                    </div>
                                </div>              
                                <form method="post" action="" class="acf-form saveform" id="post">
                                    <div class="form" style="">
                                    </div>
                                </form>
                            </div>
                            <div id="invite"><!-- Invite -->
                                <div><!-- Invite -->
                                    <div class="row">
                                        <div class="col-md-12 invite-friends">
                                            <div class="ajax-loader" style="display:none"> 
                                                <img style="margin-top:200px" src="{{url('/')}}/assets_new/images/ajax-loader.gif"  />
                                            </div>
                                            <div class="panel panel-white container-wrapper dashboard-forms">
                                                <h1>Invitation</h1>
                                                <div id="secure_invite_form">
                                                <form action="/invite/send" method="post" class="secure_invite_form form-controll">    
                                                    {{csrf_field()}}                 
                                                    <div class="row refer-head">
                                                        <div class="col-md-5 col-sm-5 col-inputs">
                                                            <label class="">Name</label>
                                                        </div>          
                                                        <div class="col-md-5 col-sm-5 col-inputs">
                                                            <label class="">Email</label>
                                                        </div>          
                                                        <div class="col-md-2 col-sm-2 col-inputs">
                                                            <a href="#" class="underline details" onclick="add_invite();">ADD</a>
                                                        </div>         
                                                    </div>
                                                    <div class="row refer refer-body">
                                                        <div class="refer-col">
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <input name="name1" id="friend_name-0" value="" class="form-control" placeholder="Name" type="text" required="">
                                                            </div>      
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <input name="email1" id="friend_email-0" value="" class="form-control" placeholder="Email" type="email" required="">
                                                            </div>      
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <select name="groupid1" class="form-control" required="">
                                                                 <option value="4">Investor</option>    
                                                                 <option value="3">Supporter</option>   
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php for($i=2;$i<=10;$i++) { ?>
                                                        <div id="viewnew_row{{$i}}"></div>                                                        
                                                        <?php } ?>
                                                        <input name="row_count" id="row_count" value="1" type="hidden">
                                                        <div class="col-md-12 col-inputs">
                                                            <input id="secure_invite_send" name="submit" class="btn btn-primary" value="Invitation Sent" type="submit">
                                                        </div>
                                                    </div>
                                                    <fieldset></fieldset>
                                                </form>
                                                </div>
                                                <div class="sowresult">
                                                    <table class="table table-bordered table-striped" >
                                                        <thead>
                                                            <tr class="first-tr">
                                                                <td>Invitations</td>
                                                                <td>Invitations  Accepted</td>
                                                                <td>Points Earned</td>
                                                                <!-- <td></td> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>  @if(count($user_invites) > 0)
                                                            <tr>
                                                                <td data-label="Invitations">{{$user_invites->count()}}</td>
                                                                <td data-label="Invitations  Accepted">{{$user_invites->where('invite_status','1')->count()}}</td>
                                                                <td data-label="Points Earned">{{$user_invites->where('invite_status','1')->count()}}</td>
                                                                <!-- <td data-label="Details"><a href="javascript:void(0)" class="underline details">Show Details</a></td> -->
                                                            </tr>
                                                            @else 
                                                            <tr>
                                                                <td data-label="Invitations">0</td>
                                                                <td data-label="Invitations  Accepted">0</td>
                                                                <td data-label="Points Earned">0</td>
                                                                <!-- <td data-label="Details"><a href="javascript:void(0)" class="underline details">Show Details</a></td> -->
                                                            </tr>
                                                            @endif
                                                            <!-- <tr class="invitation-list" style="display:none;" >
                                                                <td colspan="4" class="graybg-invite ">
                                                                    <div style="display: block;">
                                                                        <div class="row">
                                                                            <div class="col-md-12 invite-friend">
                                                                                <div class="panel-body">
                                                                                    <p>No invitations sent yet.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr> -->  
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div class="cust-afc-ifrm" ><!-- Business Plan -->
                               <!--  <img src="{{url('/')}}/assets_new/images/business-plan-images.png" alt="" /> -->
                                            <form id="post" class="" @if(count($ent_businessplan) > 0) action="{{url('/')}}/entrepreneur/{{$ent_businessplan[0]->id}}/update" @else action="{{url('/')}}/entrepreneur/store" @endif method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}                                                
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Idea  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="idea" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->idea}} @endif</textarea>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Women Model  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="women_model" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->women_model}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Customer  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="customer" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->customer}} @endif</textarea>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Market  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="market" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->market}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Industry  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="industry" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->industry}} @endif</textarea>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Product  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="product" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->product}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Campaign  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="campaign" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->campaign}} @endif</textarea>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Budget  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="budget" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->budget}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Team  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="team" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->team}} @endif</textarea>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                                    <label style="display: block;">Your Pitch  <i class="fa fa-question-circle" ></i></label>
                                                    <textarea name="pitch" class="form-control"  type="text" required="">@if(count($ent_businessplan) > 0) {{$ent_businessplan[0]->pitch}} @endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input name="savefor" value="6" type="hidden"> 
                                        <div class="acf-form-submit">
                                            <input value="Save" class="button button-primary button-large" type="submit">
                                        </div>
                                    </form>
                                </div>
                            <div><!-- Project Status -->
                                <div class="panel panel-white">
                                    <div class="panel-body border-top">   
                                        <a href="{{url('/entrepreneur')}}/project" class="btn btn-primary pull-right" >Update Project Status</a>
                                        @if(count($project) > 0)
                                        <section id="cd-timeline" class="cd-container">        
                                            <div class="cd-timeline-block">
                                                <div class="cd-timeline-img cd-warning"> <i class="fa fa-tag"></i> </div>
                                                <div class="cd-timeline-content">
                                                    <h2>{{$project[0]->title}}</h2>
                                                    <p>{{$project[0]->content}}</p>
                                                    <div class="readmore">
                                                        <a href="#" title="title" data-toggle="modal" data-target="#viewmoepopup"  class="btn btn-info btn-o btn-wide pull-right viewstatus">
                                                                        Read More <i class="fa fa-arrow-circle-right"></i></a>                                    
                                                        <div class="hidden-card-description">
                                                            <h5>{{$project[0]->title}}</h5>
                                                            <p>{{$project[0]->content}}</p>  
                                                        </div>
                                                        <span class="cd-date"><span>{{$project[0]->updated_at}}</span>   <h3 class="percentage-completed"><span class="timer" data-to="{{$project[0]->progress}}" data-speed="2500"></span>% <small>completed</small></h3></span> 
                                                    </div>    
                                                </div> 
                                            </div>      
                                        </section>
                                        @else

                                        <div class="clearfix"></div>
                                        <div class="alert alert-warning alert-dismissable" > No Data Found</div>
                                        @endif
                                    </div>@if(count($project) < 1)
                                    <div class="row">
                                        <div class="alert alert-danger" id="message">
                                            <p> Your Project Profile is not yet Created/Approved. Please do it now by Clicking <a href="{{url('/entrepreneur')}}/project" class="btn btn-danger go_projectprofile">Here</a> <!-- OR <a class="btn btn-success" href="#">Contact Administrator</a> --></p>
                                        </div>
                                    </div>@endif
                                </div>    
                                <div class="modal fade" id="viewmoepopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="width:80%" >
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" >Project Update</h4>
                                            </div>
                                            <div class="modal-body"> </div>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                $('.viewstatus').click(function(){
                                        $('.modal-title').html("Project Update on "+$(this).parents('.cd-timeline-block').find('.cd-date').find('span').eq(0).text());
                                    $('.modal-body').html($(this).parent().find('.hidden-card-description').html());
                                });

                                app.timer();

                                });

                                jQuery(document).ready(function($){
                                    var $timeline_block = $('.cd-timeline-block');

                                $timeline_block.each(function(){
                                        if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
                                            $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
                                        }
                                    });

                                    //on scolling, show/animate timeline blocks when enter the viewport
                                    $(window).on('scroll', function(){
                                        $timeline_block.each(function(){
                                            if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
                                                $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
                                            }
                                            if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
                                            $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('bounce-in').addClass('is-hidden');
                                        }
                                        });
                                    });
                                });
                                </script>
                            </div>
                            <div><!-- Campaign -->
                                <!--div class="alert alert-danger fade in dashboard-alert" id="message">
                                    <p> Your Project Profile is not yet Created/Approved. Please do it now by Clicking <a href="javascript:void(0)" class="btn btn-danger go_projectprofile">Here</a> OR <a class="btn btn-success" href="#">Contact Administrator</a></p>
                                </div>
                                <div class="clearfix">
                                    <p><a href="#" class="btn btn-primary pull-right" >Insert New Campaign</a></p><br /><br />
                                </div-->
                                <div class="clearfix">
                                    <p><a href="{{url('/')}}/campaign/add" class="campaign-alert-message btn btn-primary pull-right" >Insert New Campaign</a></p><br /><br />
                                </div>
                                @if(count($campaigns) > 0)
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Goal</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($campaigns as $campaign)
                                        <tr>
                                            <td>{{$campaign->title}}</td>
                                            <td>{{$campaign->goal}}</td>
                                            <td>{{$campaign->startdate}}</td>
                                            <td>{{$campaign->todate}}</td>
                                            <td><a href="{{url('/')}}/campaign/{{$campaign->id}}/edit" class="btn btn-sm btn-primary" >Edit</a></td>
                                        </tr>  
                                        @endforeach            
                                    </tbody>
                                    <tfoot></tfoot>
                                </table> 
                                @else   
                                <div class="alert alert-warning alert-dismissable" > No Data Found</div>
                                @endif
                                <nav class="text-center"></nav>
                                <script>
                                jQuery(document).ready(function(){
                                    jQuery(".post-publish").click(function(){
                                        var prId = jQuery(this).attr('data-id');
                                        jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_update" },function(info) {
                                            jQuery("div."+prId).text("publish");
                                         });
                                    });
                                });
                                </script>
                            </div>
                            <div><!-- Blog -->
                                <div class="clearfix">
                                    <p><a href="{{url('/blog')}}/add" class="btn btn-primary pull-right" >Insert New Blog</a></p>
                                    <br><br>
                                </div>
                                @if(count($blogs) > 0)
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{$blog->name}}</td>
                                            <td>{{$blog->content}}</td>
                                            <td><a href="{{url('/')}}/blog/{{$blog->id}}/edit" class="btn btn-sm btn-primary" >Edit</a></td>
                                        </tr>  
                                        @endforeach            
                                    </tbody>
                                    <tfoot></tfoot>
                                </table> 
                                @else   
                                <div class="alert alert-warning alert-dismissable" > No Data Found</div>
                                @endif
                                <nav class="text-center"></nav>
                            </div>
                            <div><!-- Orders --> @if(count($orders) > 0)
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th class="order-number"><span class="nobr">Order</span></th>
                                <th class="order-date"><span class="nobr">Date</span></th>
                                <th class="order-status"><span class="nobr">Status</span></th>
                                <th class="order-total"><span class="nobr">Total</span></th>
                                <th class="order-actions"><span class="nobr">&nbsp;</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($orders as $order)
                                <tr class="order">
                                <td class="order-number" data-title="Order">#{{$order->id}}</td>
                                <td class="order-date" data-title="Date">
                                <time datetime="2018-09-19" title="1537379002">{{$order->created_at}}</time>

                                </td>
                                <td class="order-status" data-title="Status">
                                Processing
                                </td>
                                <td class="order-total" data-title="Total">
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>{{$order->amount}}</span> for 1 item
                                </td>
                                <td class="order-actions" data-title="&nbsp;">
                                <a href="{{url('/order')}}/{{$order->id}}" class="btn btn-sm btn-primary" >View</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                @else   
                                <div class="alert alert-warning alert-dismissable" > No Data Found</div>
                                @endif
                            </div>
                            <div><!-- MarketPlace -->
                                <p>Loading..</p>
                            </div>
                            <div><!--  -->
                                <p>Loading..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>    
            jQuery(document).ready(function($) {
            /*var url_value = window.location.hash.substr(1);
            if(url_value != '')
            {
                
                //jQuery("li.side_menu#"+url_value).click();
                //jQuery("li.side_menu#invite").click();
            }*/
            jQuery("button.invite_button").click(function(e) {
                jQuery("li#invite").click();
            });
            jQuery(".go_projectprofile").click(function(e) {
                jQuery("li#project_profile").click();
            });
            jQuery(".campaign-list").click(function(e) {
                jQuery("li.side_menu#campaign").click();
            });
            jQuery(".busoness_plan_summary").click(function(e) {
                jQuery("li.side_menu#busoness_plan_summary").click();
            }); 
            jQuery(".project_Status").click(function(e) {
                jQuery("li.side_menu#project_Status").click();
            }); 

            app.timer();
            app.perfectScroller();

            jQuery(".live-tile").liveTile();
            jQuery('.acf-repeater-add-row').removeClass('blue');
            jQuery('.acf-row').find('.order').hide();

            });         
            </script>
            <link href="{{url('/')}}/assets_new/includes/css/MetroJs.min.css" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/assets_new/includes/css/pages.css" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/assets_new/includes/css/fullcalendar.min.css" rel="stylesheet" type="text/css">
            <script src="{{url('/')}}/assets_new/includes/js/moment.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/js/fullcalendar.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/js/calendar.js"></script>             
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/application.js"></script>
            <script src="{{url('/')}}/assets_new/includes/js/perfect-scrollbar.jquery.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/MetroJs.min.js"></script>             
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.countTo.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.resize.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.canvas.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.image.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.categories.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.crosshair.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.errorbars.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.fillbetween.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.navigate.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.pie.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.selection.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.stack.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.symbol.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.threshold.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.colorhelpers.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.time.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/morris.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/raphael.2.1.0.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery-jvectormap-2.0.2.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery-jvectormap-world-mill-en.js"></script>     
        </section>  
        
        <!-- End Inner Contents --> 

<script>
            jQuery(document).ready(function () {
            jQuery('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
            var $tab = jQuery(this);
            var $info = jQuery('#tabInfo');
            var $name = jQuery('span', $info);
            $name.text($tab.text());
            $info.show();
            }
            });
            jQuery('#verticalTab').easyResponsiveTabs({
            type: 'default',
            width: 'auto',
            fit: true
            });
            });
</script>
<script type="text/javascript">

        function add_invite()
        {
                var count = document.getElementById("row_count").value;
                var add_count = parseInt(count)+1;
                //alert(count);
            var viewhtml = '';     
            viewhtml += '<div class="refer-col">';
            viewhtml += '<div class="col-md-4 col-sm-4 col-inputs">';
            viewhtml += '<input name="name'+add_count+'" id="friend_name-0" value="" class="form-control" placeholder="Name" type="text" required="">';
            viewhtml += '</div> ';     
            viewhtml += '<div class="col-md-4 col-sm-4 col-inputs">';
            viewhtml += '<input name="email'+add_count+'" id="friend_email-0" value="" class="form-control" placeholder="Email" type="email" required="">';
            viewhtml += '</div> ';     
            viewhtml += '<div class="col-md-4 col-sm-4 col-inputs">';
            viewhtml += '<select name="groupid'+add_count+'" class="form-control" required="">';
            viewhtml += '<option value="4">Investor</option> ';  
            viewhtml += '<option value="3">Supporter</option> ';  
            viewhtml += '</select>';
            viewhtml += '</div>';
            viewhtml += '</div>';
                    document.getElementById("row_count").value = add_count;
                    document.getElementById("viewnew_row"+add_count).innerHTML = viewhtml;
                
       
        }
    </script>
<script type="text/javascript">

      jQuery( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        jQuery( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          jQuery( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-17600125-2', 'openam.github.io');
      ga('send', 'pageview');
    </script>
    <script>

(function($)

{



sales_chart =

  {

    data:

    {

      d1: []

    },



    plot: null,



    options:

    {

      grid:

      {

        autoHighlight: false,

        backgroundColor: null,

        color: '#c6f4eb',

        borderWidth: 0,

        borderColor: "transparent",

        clickable: true,

        hoverable: true

      },

      series: {

        lines: {

          show: true,

          fill: false,

          lineWidth: 2,

          steps: false

        },

        points: {

          show:true,

          radius: 3,

          lineWidth: 2,

          fill: true,

          fillColor: "#000"

        }

      },

      xaxis: {

          mode: "time",

    timeformat: "%d/%m"   },

      yaxis: {

        tickSize: 3000,

        tickColor: '#F1F2F7'

      },

      legend: { show:false },

      shadowSize: 0,

      tooltip: true,

      tooltipOpts: {

        content: "%s : %y.3",

        shifts: {

          x: -30,

          y: -50

        },

        defaultTheme: false

      }

    },



    placeholder: "#sales-chart",



    init: function()

    {

      this.options.colors = ["#3598db"];

      this.options.grid.backgroundColor = null;



      var that = this;



      if (this.plot == null)

      {

        this.data.d1 = <?php $jsondata=""; echo json_encode($jsondata); ?>;



      }

        //var months = ["January", "February", "March", "April", "May", "Juny", "July", "August", "September", "October", "November", "December"];

      this.plot = jQuery.plot(

        jQuery(this.placeholder),

        [{

          label: "Data 1",

          data: this.data.d1,

          lines: { fill: 0.00 },

          points: { fillColor: "#fff" }

        }], this.options);

    }

  };





  function showTooltip(x, y, contents) {

    jQuery('<div class="chart-tooltip">$' + contents + '</div>').css( {

      position: 'absolute',

      display: 'none',

      top: y + 5,

      left: x + 5,

      opacity: 0.80

    }).appendTo("body").fadeIn(200);

  }





  jQuery('#sales-chart').bind("plothover", function (event, pos, item) {

    jQuery("#x").text(pos.x.toFixed(2));

    jQuery("#y").text(pos.y.toFixed(2));



    if (item) {

      if (previousPoint != item.dataIndex) {

        previousPoint = item.dataIndex;



        jQuery(".chart-tooltip").remove();

        var x = item.datapoint[0].toFixed(2),

          y = item.datapoint[1].toFixed(2);



        showTooltip(item.pageX, item.pageY, y);

      }

    }

    else {

      jQuery(".chart-tooltip").remove();

      previousPoint = null;

    }

  });





   sales_chart.init();





})(jQuery);

        

jQuery(document).ready(function($) {

var p = '';
jQuery.post(ajaxurl,{ action:'gybi_get_investors_country'},function(data) {
    var i =0;
            //var plants = data;


//console.log(array);
        // }, 'json');
    //Vector Maps
    var map = function() {
//var plants = [p];     

        
        var plants = [
    {name: 'Investor 1, New York, USA', coords: [40.7127, -74.0059], status: 'closed', offsets: [0, 2]},
    {name: 'Investor 2, Washington, USA<br/>', coords: [20.593684,78.96288], status: 'open', offsets: [0, 2]},
    {name: 'Investor 2, Washington, USA\nInvestor 3, Boston, USA', coords: [47.5000, -120.5000], status: 'open', offsets: [0, 2]}
    ];
        console.log(plants);
        jQuery('#map').vectorMap({
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: '#3598db',
                },
                hover: {
                    "fill-opacity": 0.8
                }
            },
            markers: plants.map(function(h){ return {name: h.name, latLng: h.coords} }),
               labels: false,
         series: {
      markers: [{
        attribute: 'image',
        scale: {
          'closed': '/gybi/wp-content/uploads/ultimatemember/19/profile_photo-190.jpg?1429955016',
          'activeUntil2018': '/gybi/wp-content/uploads/ultimatemember/6/profile_photo-190.jpg?1429955016',
          'activeUntil2022': '/gybi/wp-content/uploads/ultimatemember/20/profile_photo-190.jpg?1429955016'
        },
        values: plants.reduce(function(p, c, i){ p[i] = c.status; return p }, {}),
        legend: false
      }]
    }
        });

    };
    map();
}, 'json');
   

    jQuery('#calendar').fullCalendar({

       

            header: {

                left: 'prev,next today',

                center: 'title',

                right: 'month,agendaWeek,agendaDay'

            },

            editable: false,

            droppable: false, // this allows things to be dropped onto the calendar

            eventLimit: true, // allow "more" link when too many events

            events: {

            url : "https://africainnovationmarket.org/wp-admin/admin-ajax.php",

            data : {action:"entterprenuer_events_details",userid:825}

            method: 'post'

        },

        eventClick:  function(event, jsEvent, view) {

            jQuery('#modalsTitle').html(event.title);

            jQuery('span#modelsDate').html(event.date);

            jQuery('span#startTime').html(event.starttime);

            jQuery('span#endTime').html(event.endtime);

            jQuery("span#messageContent").html(event.message);

            if(event.approve == '1'){

                jQuery("span.bodyResult").html("Scheduled");

            }else if(event.approve == '2'){

                jQuery("span.bodyResult").html("Rejected");

            }else{

                jQuery("span.bodyResult").html("Pending Approval");

            }

            jQuery("div#moduleReply").html(event.link);

            jQuery('#fullCalModals').modal();

        }

        });

    

});

        </script>
        
        
        
        <!--- Organization JAVAscript -->
        
        <script>
    jQuery(document).ready(function() {
        app.timer();
       app.perfectScroller();
       
       jQuery(".live-tile").liveTile();
       
    jQuery(".post-block").click(function(){
        var prId = jQuery(this).attr('data-id');
        jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_decline" },function(info) {
            jQuery("div."+prId).text("Block");
         });
    });
    jQuery(".post-publish").click(function(){
        var prId = jQuery(this).attr('data-id');
        jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_update" },function(info) {
            jQuery("div."+prId).text("Publish");
         });
    });
    

       
    });
    </script>
    <script>
jQuery(document).ready(function(){
    jQuery(".post-publish").click(function(){
        var prId = jQuery(this).attr('data-id');
        jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_update" },function(info) {
            jQuery("div."+prId).text("publish");
         });
    });
});
</script>
<!-- Supporter JAVAscript -->
<script>
jQuery(document).ready(function(e) {
    jQuery("li.update_profile").click(function(e) {
        window.location.hash = jQuery(this).attr('data-href');
    });
    setTimeout(function(){
        var n = window.location.hash.substring(1);
        if(n != undefined && n!= '') jQuery("li."+n).click();
    }, 20000);
});
</script>

@endsection