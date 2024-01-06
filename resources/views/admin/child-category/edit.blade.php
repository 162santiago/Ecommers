@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Sub Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Sub Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sub-category.update', $subcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group col-12" >
                                    <label for="">Name</label>
                                    <input type="text" placeholder="" name="name" class="form-control" value="{{ $subcategory->name }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Category</label>
                                    <select id="" name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                        <option {{ $category->id == $subcategory->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select id="" name="status">
                                        <option {{ $subcategory->status == '1' ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $subcategory->status == '0' ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary ml-3" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
