@extends('admin.layouts.admin')

@section('title', 'Notice Create')
@section('notices_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Notice Create</h1>
            <a href="{{ route('admin.notices.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Notice</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.notices.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @include("admin.layouts.com.status")

                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                </div>

                                <!-- Description  -->
                                <div class="form-group">
                                    <label>Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                </div>

                                <!-- Is Active  -->
                                <div class="form-group">
                                    <label>Is Active</label>
                                    <select class="form-control" name="is_active">
                                        <option  value="1">Active</option>
                                        <option  value="0">In Active</option>
                                    </select>
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
