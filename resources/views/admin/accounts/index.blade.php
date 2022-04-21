@extends('admin.layouts.master')
@section('content')
    <h1>Accounts</h1>
    <table>
        <thead>
            <th>#</th>
            <th>fullname</th>
            <th>username</th>
            <th>email</th>
            <th>avatar</th>
            <th>phone</th>
            <th>address</th>
            <th>created_at</th>
            <th>action</th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button type="button"
                            onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit()">
                            delete
                        </button>
                        <form id="delete-user-form-{{ $user->id }}"
                            action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                <tr>
            @endforeach
        </tbody>
    </table>
@stop
