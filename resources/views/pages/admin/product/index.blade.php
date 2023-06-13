@extends('layouts.parent')

@section('content')

<div class="container">

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

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Product</h5>

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            Don't Forget to Add Galery Products
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

          <div class="d-flex justify-content-end">
            <a href="{{ route('dashboard.product.create') }}" class="btn btn-primary">Create Product</a>
          </div>



          <!-- Table with stripped rows -->
          <table class="table table-striped datatable">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($product as $row)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $row->name }}</td>
                <td>Rp. {{ number_format($row->price) }}</td>
                <td>{{ $row->category->name }}</td>
                <td>
                  {!! Str::limit($row->description, 20) !!}
                </td>
                <td>

                  <a href="{{ route('dashboard.product.gallery.index', $row->id) }}" class="btn btn-success mb-2 ms-2">
                    <i class="bi bi-camera"></i>
                    Galery
                  </a>

                  <a href="{{ route('dashboard.product.show', $row->id) }}" class="btn btn-info mb-2 ms-2">
                    <i class="bi bi-eye"></i>
                    Show
                  </a>

                  <a href="{{ route('dashboard.product.edit', $row->id) }}" class="btn btn-warning mb-2 ms-2">
                  <i class="bi bi-pencil"></i>
                  Edit
                  </a>

                  <form class="ms-2" action="{{ route('dashboard.product.destroy', $row->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                      <i class="bi bi-trash"></i>
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
              @empty
                  <tr>
                    <td colspan="6" class="text-center">No Product</td>
                  </tr>
              @endforelse
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>


</div>

@endsection