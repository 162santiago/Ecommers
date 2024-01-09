@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Child Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Child Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.update', $childcategory->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group col-12" >
                                    <label for="">Name</label>
                                    <input type="text" placeholder="" name="name" class="form-control" value="{{ $childcategory->name }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Category</label>
                                    <select id="" name="category" class="form-control main-category">
                                        @foreach ($categories as $category)
                                        <option {{$category->id == $childcategory->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Sub Category</label>
                                    <select id="" name="sub_category" class="form-control sub-category">
                                        <option value="">Select</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option {{ $subcategory->id == $childcategory->sub_category_id ? 'selected' : '' }} value="{{$subcategory->id}}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select id="" name="status">
                                        <option {{ $childcategory->status == '1' ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $childcategory->status == '0' ? 'selected' : '' }} value="0">Inactive</option>
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
