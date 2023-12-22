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
                            <form action="">
                                @csrf
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="file" placeholder="" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Type</label>
                                    <input type="text" placeholder="" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" placeholder="" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Starting Price</label>
                                    <input type="text" placeholder="" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Button Url</label>
                                    <input type="text" placeholder="" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Serial</label>
                                    <input type="text" placeholder="" name="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for=""></label>
                                    <input type="text" placeholder="" name="" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select name="" id="">
                                        <option value="">Active</option>
                                        <option value="">Inacive</option>
                                    </select>
                                </div>

                                <input type="submit" class="btn btn-primary">
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
