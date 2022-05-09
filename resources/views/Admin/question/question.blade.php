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
                            <h4 class="card-title">عرض الاسئلة</h4>
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
                                                السؤال
                                            </th>
                                            <th>
                                                الاجابة 
                                            </th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                        <div class="modal fade" id="editModal-{{ $question->id }}" tabindex="-1"
                                            aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                               <form action="{{ route('admin.question.update', $question->id) }}"
                                                     method="POST" enctype="multipart/form-data">
                                                   @csrf
                                                   @method('PATCH')
                                                   <div class="modal-content">
                                                       <div class="modal-header">
                                                           <h5 class="modal-title" id="exampleModalLabel1">عدل
                                                               السؤال</h5>
                                                       </div>
                                                       <div class="modal-body">
                                                           <div class="row">
                                                               <div class="col mb-3">
                                                                   <label for="editTitle" class="form-label">السؤال
                                                                       </label>
                                                                   <input type="text" id="editTitle"
                                                                          class="form-control" name="title"
                                                                          value="{{ $question->question ?? '' }}"
                                                                          placeholder="السؤال ">
                                                               </div>
                                                           </div>
                                                           <div class="row">
                                                               <div class="col mb-3">
                                                                   <label for="editDesc"
                                                                          class="form-label">الاجابة</label>
                                                                   <input type="text" id="editDesc"
                                                                          class="form-control" name="description"
                                                                          value="{{  $question->answer ?? '' }}"
                                                                          placeholder=" الاجابة">
                                                               </div>
                                                           </div>
                                                          
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn btn-outline-secondary"
                                                                   data-bs-dismiss="modal">إلغاء</button>
                                                           <button type="submit"
                                                                   class="btn btn-warning text-white">تعديل</button>
                                                       </div>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                            <tr>
                                                
                                                <td>
                                                    {{ $question->question }}
                                                </td>
                                                <td>
                                                    {{ $question->answer }}
                                                </td>
                                                <td>
                                                    <a href="editService" style="width: fit-content; font-size: 25px ;color:#686868"
                                                        class="fa-solid fa-edit pe-2 btn-fw btn-rounded "
                                                        data-bs-target="#editModal-{{ $question->id }}"
                                                        data-bs-toggle="modal">
                                                        
                                                       
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.question.destroy', $question->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($question->is_active == 1)
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
            <button type="button" data-bs-target="#addModal" data-bs-toggle="modal"
                class="btn btn-warning btn-rounded btn-icon add">
                <i class="mdi mdi-plus text-white"></i>
            </button>
        </div>



        <!-- Modal -->

        {{-- <div class="modal fade" id="editModal-{{ $question->id }}" tabindex="-1"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.question.update', $question->id) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">عدل
                                السؤال</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editTitle" class="form-label">
                                        السؤال</label>
                                    <input type="text" id="editTitle"
                                           class="form-control" name="title"
                                           value="{{ $question->question ?? '' }}"
                                           placeholder=" السؤال">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="editDesc"
                                           class="form-label">الاجابة</label>
                                    <input type="text" id="editDesc"
                                           class="form-control" name="description"
                                           value="{{ $question->answer ?? '' }}"
                                           placeholder="الاجابة ">
                                </div>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit"
                                    class="btn btn-warning text-white">تعديل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}


        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.question.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">أضف سؤال</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="title" class="form-label"> السؤال</label>
                                    <input type="text" id="title" class="form-control" name="title"
                                        placeholder=" السؤال">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="description" class="form-label">الاجابة</label>
                                    <input type="text" id="description" class="form-control" name="description"
                                        placeholder="الاجابة">
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="btn btn-warning text-white">إضافة</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- container-scroller -->
    @endsection
