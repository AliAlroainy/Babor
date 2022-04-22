@include('partials.header')
@include('partials.navbar');
@include('partials.userSidebar')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mb-sm-2">
                                    <a href="" class="setting">
                                        <div class="card">
                                            <div class="card-body">
                                                تعديل البيانات الشخصية
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 mb-sm-2">
                                    <a href="{{url('user/profile/settings/changePassword')}}" class="setting">
                                        <div class="card">
                                            <div class="card-body">
                                                تغيير كلمة المرور
                                            </div>
                                        </div>
                                    </a>
                                </div>
{{--                                    <div class="border-bottom text-center pb-4">--}}
{{--                                        <img src="{{@asset('assets/images/faces/face12.jpg')}}" alt="profile" class="img-lg rounded-circle mb-3"/>--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <h3> علي الرعيني</h3>--}}
{{--                                        </div>--}}
{{--                                        <p class="w-75 mx-auto mb-3">--}}
{{--                                            Bureau Oberhaeuser is a design bureau focused on Information- and Interface Design.--}}
{{--                                        </p>--}}

{{--                                    </div>--}}

{{--                                    <div class="py-4">--}}
{{--                                        <p class="clearfix">--}}
{{--                                          <span class="float-left">--}}
{{--                                            الحالة--}}
{{--                                          </span>--}}
{{--                                            <span class="float-right text-muted">--}}
{{--                                                مفعل--}}
{{--                                            </span>--}}
{{--                                        </p>--}}

{{--                                        <p class="clearfix">--}}
{{--                                          <span class="float-left">--}}
{{--                                            الهاتف--}}
{{--                                          </span>--}}

{{--                                            <span class="float-right text-muted">--}}
{{--                                                006 3435 22--}}
{{--                                              </span>--}}
{{--                                        </p>--}}

{{--                                        <p class="clearfix">--}}
{{--                          <span class="float-left">--}}
{{--                            البريد الالكتروني--}}
{{--                          </span>--}}
{{--                                            <span class="float-right text-muted">--}}
{{--                            Jacod@testmail.com--}}
{{--                          </span>--}}
{{--                                        </p>--}}

{{--                                        <p class="clearfix">--}}
{{--                          <span class="float-left">--}}
{{--                            فيسبوك--}}
{{--                          </span>--}}
{{--                                            <span class="float-right text-muted">--}}
{{--                            <a href="#">David Grey</a>--}}
{{--                          </span>--}}
{{--                                        </p>--}}
{{--                                        <p class="clearfix">--}}
{{--                          <span class="float-left">--}}
{{--                            تويتر--}}
{{--                          </span>--}}
{{--                                            <span class="float-right text-muted">--}}
{{--                            <a href="#">@davidgrey</a>--}}
{{--                          </span>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>

@include('partials.footer')
