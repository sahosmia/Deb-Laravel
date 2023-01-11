@extends('admin.layouts.admin')

@section('title', 'Why Choose Create')
@section('why-chooses_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Create</h1>
            <a href="{{ route('admin.why-chooses.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Why Choose</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.why-chooses.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @include("admin.layouts.com.status")
                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                </div>

                                <!-- Designation -->
                                <div class="form-group">
                                    <label>Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" value="{{ old('designation') }}" class="form-control">
                                </div>

                                <!-- Icon -->
                                <div class="form-group">
                                    <label>Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="icon" value="{{ old('icon') }}" class="form-control">
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
