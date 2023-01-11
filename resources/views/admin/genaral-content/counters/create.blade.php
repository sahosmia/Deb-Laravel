@extends('admin.layouts.admin')

@section('title', 'Counter Create')
@section('counters_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Counter Create</h1>
            <a href="{{ route('admin.counters.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Counter</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.counters.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @include("admin.layouts.com.status")
                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                </div>

                                <!-- Number -->
                                <div class="form-group">
                                    <label>Number <span class="text-danger">*</span></label>
                                    <input type="number" name="number" value="{{ old('number') }}" class="form-control">
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
