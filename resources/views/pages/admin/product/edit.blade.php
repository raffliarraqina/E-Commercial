@extends('layouts.parent')

@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Edit Product "{{ $product->name }}"</h5>

            <form class="row g-3" action="{{ route('dashboard.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputNanme4" name="name"
                        value="{{ $product->name }}">
                </div>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Price</label>
                    <input type="number" class="form-control" id="inputNanme4" min="0" name="price"
                        value="{{ $product->price }}">
                </div>

                <div class="col-12">
                    <label class="col-sm-2 col-form-label">Select Category</label> 
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                            <option> ----- Choose Category Product ----- </option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="col-12">
                    <label class="col-sm2 col-form-label">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10">
                        {{ $product->description }}
                    </textarea>
                </div>

                <div class="text-end">

                    <a href="{{ route('dashboard.product.index') }}" class="btn btn-warning">
                        <i class="bi bi-arrow-left"></i>
                    Back
                    </a>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                   
                </div>

            </form>

        </div>

    </div>

</div>

<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
</script>

@endsection