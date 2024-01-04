@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Icon</label>
                                    <div>
                                        <button class="btn btn-dark" data-selected-class="btn-danger" data-unselected-class="btn-dark" role="iconpicker" name="icon" data-icon="{{ $category->icon }}"></button>
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label for="">Name</label>
                                    <input type="text" placeholder="" name="name" value="{{ $category->name }}" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select id="" name="status">
                                        <option {{$category->status ==1 ?'selected' : '' }} value="1">Active</option>
                                        <option {{$category->status ==0 ?'selected' : '' }} value="0">Inactive</option>
                                    </select
                                </div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
