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
                            <h4>Create Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" placeholder="" name="thumb_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="" name="name" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Category</label>
                                            <select id="" name="category_id" class="form-control main-category">
                                                <option>Select</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Sub Category</label>
                                            <select id="" name="sub_category_id" class="form-control sub-category">
                                                <option>Select</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Child Category</label>
                                            <select id="" name="child_category_id"
                                                class="form-control child-category">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label for="">Brand</label>
                                    <select id="" name="brand_id" class="form-control">
                                        <option>Select</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Sku</label>
                                    <input type="text" placeholder="" name="sku" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" placeholder="" name="price" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Ofert Price</label>
                                    <input type="text" placeholder="" name="offer_price" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Offert Start Price</label>
                                            <input type="text" placeholder="" name="offer_start_date" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Offert End Price</label>
                                            <input type="text" placeholder="" name="offer_end_date" class="form-control datepicker">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Stock Quantity</label>
                                    <input type="number" placeholder="" name="qty" min="0" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Video Link</label>
                                    <input type="text" placeholder="" name="video_link" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea type="text" placeholder="" name="short_description" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Long Description</label>
                                    <textarea type="text" placeholder="" name="long_description" class="form-control summernote"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Is Top</label>
                                            <select id="" name="is_top"
                                                class="form-control">
                                                <option>Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Is Best</label>
                                            <select id="" name="is_best"
                                                class="form-control ">
                                                <option>Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Is Featured</label>
                                            <select id="" name="is_featured"
                                                class="form-control">
                                                <option>Select</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Seo Title</label>
                                    <input type="text" placeholder="" name="seo_title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Seo Description</label>
                                    <textarea type="text" placeholder="" name="seo_description" class="form-control"></textarea>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group col-12">
                                        <label for="">Status</label>
                                        <select id="" name="status"
                                            class="form-control">
                                            <option>Select</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.product.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        console.log(data);
                        $('.sub-category').html('<option value="">Select</option>')
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }

                })
            })
        })

        $(document).ready(function() {
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: "GET",
                    url: "{{ route('admin.product.child-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {

                        console.log(data);
                        $('.child-category').html('<option value="">Select</option>')
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
