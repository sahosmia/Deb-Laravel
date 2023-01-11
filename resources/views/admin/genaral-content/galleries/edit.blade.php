@extends('admin.layouts.admin')

@section('title', 'Gallery Edit')
@section('galleries_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Gallery Edit</h1>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Gallery</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.galleries.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @include("admin.layouts.com.status")

                                <!-- Title -->
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" value="{{ $data->title }}" class="form-control">
                                </div>

                                <!-- Is Active  -->
                                <div class="form-group">
                                    <label>Is Active</label>
                                    <select class="form-control" name="is_active">
                                        <option @selected($data->is_active == 0) value="0">In Active</option>
                                        <option @selected($data->is_active == 1) value="1">Active</option>
                                    </select>
                                </div>

                                 <!-- Current Image  -->
                                 <div class="form-group">
                                    <label>Current Image</label>
                                    <img class="d-block rounded-circle" src="{{ asset('upload/Gallery') }}/{{ $data->image }}" alt="{{ $data->image }}">
                                </div>

                                <!-- Image  -->
                                <div class="form-group">
                                    <label>Image</label>
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
