@extends('layouts.parent')

@section('content')

@if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {!! \Session::get('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {!! \Session::get('failed') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User List</h5>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($user as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                @if ($row->roles == 'ADMIN')
                                <span class="badge bg-danger">{{ $row->roles }}</span>
                                @else
                                <span class="badge bg-primary">{{ $row->roles }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('dashboard.user.edit', $row->id) }}"class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('dashboard.user.destroy', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection