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
                            <h4>Edit Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider.update', $slider->id ) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group" >
                                    <label for="">Preview</label>
                                    <img width="200px" src="{{ asset( $slider->banner) }}" alt="">
                                </div>
                                <div class="form-group" >
                                    <label for="">Banner</label>
                                    <input type="file" placeholder="" name="banner" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" placeholder="" name="type" class="form-control" value="{{ $slider->type }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" placeholder="" name="title" class="form-control" value="{{ $slider->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Starting Price</label>
                                    <input type="text" placeholder="" name="starting_price" class="form-control" value="{{ $slider->starting_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Button Url</label>
                                    <input type="text" placeholder="" name="btn_url" class="form-control" value="{{ $slider->btn_url }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Serial</label>
                                    <input type="text" placeholder="" name="serial" class="form-control" value="{{ $slider->serial }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select id="" name="status" >
                                        <option {{ $slider->status == 1 ? 'selected' :'' }}  value="1">Active</option>
                                        <option {{ $slider->status == 0 ? 'selected' :'' }} value="0">Inacive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
