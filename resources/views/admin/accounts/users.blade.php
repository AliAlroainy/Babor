@extends('partials.master')
@section('body')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">عرض المستخدمين</h4>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                المستخدم
                                            </th>
                                            <th>
                                                الإسم
                                            </th>
                                            <th>
                                                البريد الالكتروني
                                            </th>
                                            <th>
                                                العنوان
                                            </th>
                                            <th>
                                                الهاتف
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if (!$loop->first)
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="{{ @asset('assets/images/faces/face2.jpg') }}"
                                                            alt="image" />
                                                    </td>
                                                    <td>
                                                        {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>

                                                    <td>{{ $user->profile->address }}</td>

                                                    <td>
                                                        {{ $user->profile->phone }}
                                                    </td>
                                                    <td>
                                                        <a href="deleteService" style="width: fit-content"
                                                            class="
                                    btn d-flex align-items-center
                                     btn-inverse-danger
                                     btn-fw btn-rounded ">
                                                            حذف
                                                            <i class="fa-solid fa-trash pe-2 "
                                                                style="font-size: 12px ;"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
