@extends('admin.layouts.admin')

@section('title', 'Testimonial Create')
@section('testimonials_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Testimonial Create</h1>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Testimonial</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @include("admin.layouts.com.status")
                                <!-- Name -->
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                <!-- Designation -->
                                <div class="form-group">
                                    <label>Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" value="{{ old('designation') }}" class="form-control">
                                </div>

                                <!-- Company  -->
                                <div class="form-group">
                                    <label>Company </label>
                                    <input type="text" name="company" value="{{ old('company') }}" class="form-control">
                                </div>

                                <!-- Feedback  -->
                                <div class="form-group">
                                    <label>Feedback <span class="text-danger">*</span></label>
                                    <textarea name="feedback" class="form-control" rows="5">{{ old('feedback') }}</textarea>
                                </div>

                                <!-- Is Active  -->
                                <div class="form-group">
                                    <label>Is Active</label>
                                    <select class="form-control" name="is_active">
                                        <option  value="1">Active</option>
                                        <option  value="0">In Active</option>
                                    </select>
                                </div>

                                <!-- Image  -->
                                <div class="form-group">
                                    <label>Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control-file" accept="image/*">
                                </div>


                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </form>
                        </div>




                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
