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
                            <div class="border-bottom text-center pb-4">
                                <img src="{{ @asset('assets/images/faces/face12.jpg') }}" alt="profile"
                                    class="img-lg rounded-circle mb-3" />
                                <div class="mb-3">
                                    <h3>{{ $user->name }}</h3>
                                </div>
                                <p class="w-75 mx-auto mb-3">
                                    {{ $user->profile->bio }}
                                </p>
                                {{-- <div class="d-flex justify-content-center"> --}}
                                {{-- <button class="btn btn-success ms-1">Hire Me</button> --}}
                                {{-- <button class="btn btn-success">Follow</button> --}}
                                {{-- </div> --}}
                            </div>

                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">
                                        الحالة
                                    </span>
                                    <span class="float-right text-muted">
                                        مفعل
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        الهاتف
                                    </span>

                                    <span class="float-right text-muted">
                                        @if ($user->profile->phone)
                                            {{ $user->profile->phone }}
                                        @else
                                            لم يتم النشر
                                        @endif
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        البريد الالكتروني
                                    </span>
                                    <span class="float-right text-muted">
                                        {{ $user->email }}
                                    </span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">
                                        فيسبوك
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">David Grey</a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        تويتر
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">@davidgrey</a>
                                    </span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
