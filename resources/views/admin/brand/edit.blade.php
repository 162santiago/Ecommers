@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Brand</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group" >
                                    <label for="">Preview</label>
                                    <img width="200px" src="{{ asset( $brand->logo) }}" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="">Logo</label>
                                    <input type="file" placeholder="" name="logo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="" value="{{$brand->name }}" name="name" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Is Featured</label>
                                    <select class="form-control" id="" name="is_featured">
                                        <option value="">Select</option>
                                        <option {{$brand->is_featured == 1 ? 'selected' : '' }} value="1">Yes</option>
                                        <option {{$brand->is_featured == 0 ? 'selected' : '' }} value="0">No</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select class="form-control" id="" name="status">
                                        <option {{$brand->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{$brand->status == 0 ? 'selected' : '' }} value="0">Inacive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" value>Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
