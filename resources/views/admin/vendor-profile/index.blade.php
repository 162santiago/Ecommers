@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Vendor Profile</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Vendor Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.vendor-profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" >
                                    <label for="">Banner</label>
                                    <input type="file" placeholder="" name="banner" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" placeholder="" name="phone" class="form-control" value="{{ old('phone') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" placeholder="" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" placeholder="" name="address" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="summernote-simple" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook link</label>
                                    <input type="text" placeholder="" name="fb_link" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">X link</label>
                                    <input type="text" placeholder="" name="x_link" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram link</label>
                                    <input type="text" placeholder="" name="insta_link" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary" value>Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
