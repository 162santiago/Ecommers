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
                                    <input type="file" placeholder="" name="banner" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="" name="name" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Category</label>
                                            <select id="" name="status" class="form-control main-category">
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
                                            <select id="" name="status" class="form-control sub-category">
                                                <option>Select</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group col-12">
                                            <label for="">Sub Category</label>
                                            <select id="" name="status">
                                                <option>Select</option>

                                            </select>
                                        </div>
                                    </div>
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
@push('scripts')
<script>
    $(document).ready(function(){
        $('body').on('change', '.main-category', function(e) {
            let id = $(this).val();
            $.ajax({
                method:"GET",
                url:"{{ route('admin.product.get-subcategories') }}",
                data:{
                    id:id
                },
                success:function(data){

                    console.log(data);
                    $('.sub-category').html('<option value="">Select</option>')
                    $.each(data, function(i,item){
                        $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                    })
                },
                error:function(xhr,status,error) {
                    console.log(error);
                }

    })
        })
    })
</script>
@endpush
