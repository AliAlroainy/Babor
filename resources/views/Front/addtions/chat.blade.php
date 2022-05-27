@include('Front.include.header')


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="container" >
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="cardc chat-app">
            <div id="plist" class="people-list">
            
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    <li class="clearfix ">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                        <div class="about float-right" dir="rtl">
                            <div class="name float-end" >الادمن</div>
                            <br/>
                            <div class="status"> <i class="fa fa-circle offline"></i> اخر ظهور منذ 2 دقيقة </div>                                            
                        </div>
                    </li>
                    <li class="clearfix active" dir="rtl">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                        <div class="about">
                            <div class="name">المشتري  </div>
                            <div class="status"> <i class="fa fa-circle online"></i> متصل </div>
                        </div>
                    </li>
        
                </ul>
            </div>
            <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6 hidden-sm text-left">
                            <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                        </div>

                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                            </a>
                            <div class="chat-about">
                                <h6 class="m-b-0">المشتري  </h6>
                                <small>متصل   </small>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="chat-history float-end" dir="rtl">
                    <ul class="m-b-0">
                        <li class="clearfix">
                            <div class="message-data text-left">
                                <span class="message-data-time">10:10 AM, اليوم</span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                            </div>
                            <div class="message other-message float-left"> اهلا ياصديق مبروك فوزك بالمزاد  </div>
                        </li>
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">10:12 AM, اليوم</span>
                            </div>
                            <div class="message my-message">اهلا تشرفنا   </div>                                    
                        </li>                               
                        <li class="clearfix">
                            <div class="message-data">
                                <span class="message-data-time">10:15 AM, اليوم</span>
                            </div>
                            <div class="message my-message">حسناً سارسل لك العقد والاوراق غداً</div>
                        </li>
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend ">
                            <span class="input-group-text btn btn-warning"><i class="fa fa-send"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="اكتب رسالتك هنا ..">                                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@include('Front.include.footer')