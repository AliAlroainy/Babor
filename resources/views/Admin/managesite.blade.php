@extends('partials.master')
@section('body')



    <!-- partial -->

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper" style="position: relative">



            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">عرض الرسائل</h4>
                            @if (session()->has('errorEdit'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session()->get('errorEdit') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('successAdd'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('successAdd') }}
                                    <button type=" button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('errorAdd'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session()->get('errorAdd') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <ul class="m-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
الاسم                                            </th>
                                            <th>
                                                 الايميل
                                            </th>
                                           
<th>
 الموبايل                                            </th>
 <th>
عنوان الرسالة                                            </th>
 <th>
 الرسالة                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cont as $contactus)
                                        
                                            <tr>
                                                
                                                <td>
                                                    {{ $contactus->name }}
                                                </td>
                                                <td>
                                                    {{ $contactus->email }}
                                                </td>
                                                <td>
                                                {{ $contactus->title }}
                                                </td>
                                                <td>
                                                {{ $contactus->phone }}
                                                </td>
                                                <td>
                                                {{ $contactus->message }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.contactus.index.destroy', $contactus->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($contactus->is_active == 1)
                                                        <button  class=" btn d-flex align-items-center
                                                                    font-weight-inverse-success
                                                              btn-rounded  fa-solid fa-trash pe-2
                                                           " style="color:#71c016;font-size: 25px ;">
                                                                </button>
                                                        @else
                                                            <button class=" btn d-flex align-items-center
                                                                    font-weight-inverse-danger
                                                              btn-rounded  fa-solid fa-trash-restore pe-2
                                                           " style="color:#ff4747;font-size: 25px ;">

                                                            </button>

                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
           
        </div>



        <!-- Modal -->

        
        <!-- container-scroller -->
    @endsection
