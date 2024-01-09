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
                            <h4>Create Sub Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.child-category.store') }}" method="POST">
                                @csrf
                                <div class="form-group col-12" >
                                    <label for="">Name</label>
                                    <input type="text" placeholder="" name="name" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Category</label>
                                    <select id="" name="category" class="form-control main-category">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Sub Category</label>
                                    <select id="" name="sub_category" class="form-control sub-category">
                                        <option value="">Select</option>
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="">Status</label>
                                    <select id="" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary ml-3" type="submit">Create</button>
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
                url:"{{ route('admin.get-subcategories') }}",
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
