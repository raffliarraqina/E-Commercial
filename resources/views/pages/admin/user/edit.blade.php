@extends('layouts.parent')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Role User</h5>

            <table class="table table-striped table-bordered">
                <tr>
                    <th>Status</th>
                    <td>
                        <form action="{{ route('dashboard.user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="input-group mb-3">
                                <select class="form-select" name="roles" id="role">
                                    <option value="USER">
                                        User</option>
                                    <option value="ADMIN">
                                        Admin</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </td>
                </tr>
            </table>

            <div class="d-flex justify-content-end">
                <a href="{{ route('dashboard.transaction.index') }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i>
                Back
                </a>
            </div>
            
        </div>
    </div>
</div>
@endsection