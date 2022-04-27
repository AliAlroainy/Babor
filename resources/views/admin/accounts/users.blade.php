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
                                                المهنة
                                            </th>
                                            <th>
                                                الهاتف
                                            </th>
                                            <th>
                                                المدينة
                                            </th>
                                            <th>
                                                العنوان
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if (!$loop->first)
                                                <tr>
                                                    <td class="py-1">
                                                        @if (isset($user->profile->avatar))
                                                            <img src="/images/profiles/{{ $user->profile->avatar }}"
                                                                alt="profile" class="img-lg rounded-circle" />
                                                        @else
                                                            <img src="/images/profiles/default.png" alt="profile"
                                                                class="img-lg rounded-circle" />
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->profile->job ?? '' }}</td>
                                                    <td>{{ $user->profile->phone ?? '' }}</td>
                                                    <td>{{ $user->profile->city ?? '' }}</td>
                                                    <td>{{ $user->profile->address ?? '' }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.account.destroy', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @if ($user->is_active == 1)
                                                                <button style="width: fit-content"
                                                                    class="
                                                            btn d-flex align-items-center
                                                             btn-inverse-success
                                                             btn-fw btn-rounded ">
                                                                    إلغاء التفعيل
                                                                    <i class="fa-solid fa-trash pe-2"
                                                                        style="font-size: 12px ;"></i>
                                                                </button>
                                                            @else
                                                                <button style="width: fit-content"
                                                                    class="
                                                            btn d-flex align-items-center
                                                             btn-inverse-danger
                                                             btn-fw btn-rounded ">
                                                                    تفعيل
                                                                    <i class="fas fa-trash-restore pe-2"
                                                                        style="font-size: 12px ;"></i>
                                                                </button>
                                                            @endif
                                                        </form>
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