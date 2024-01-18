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
                            <h4>Create Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group" >
                                    <label for="">Banner</label>
                                    <input type="file" placeholder="" name="banner" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" placeholder="" name="type" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" placeholder="" name="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Starting Price</label>
                                    <input type="text" placeholder="" name="starting_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Button Url</label>
                                    <input type="text" placeholder="" name="btn_url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Serial</label>
                                    <input type="text" placeholder="" name="serial" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select id="" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inacive</option>
                                    </select>
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
