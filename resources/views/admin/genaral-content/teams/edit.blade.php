@extends('admin.layouts.admin')

@section('title', 'Team Edit')
@section('teams_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Team Edit</h1>
            <a href="{{ route('admin.teams.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Team</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.teams.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @include("admin.layouts.com.status")

                                <!-- Name -->
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control">
                                </div>

                                <!-- Designation -->
                                <div class="form-group">
                                    <label>Designation <span class="text-danger">*</span></label>
                                    <input type="text" name="designation" value="{{ $data->designation }}" class="form-control">
                                </div>

                                <!-- Facebook  -->
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" value="{{ $data->facebook }}" class="form-control">
                                </div>

                                <!-- Linkedin  -->
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" name="linkedin" value="{{ $data->linkedin }}" class="form-control">
                                </div>

                                <!-- twitter  -->
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" value="{{ $data->twitter }}" class="form-control">
                                </div>

                                <!-- Instragram  -->
                                <div class="form-group">
                                    <label>Instragram</label>
                                    <input type="text" name="instragram" value="{{ $data->instragram }}" class="form-control">
                                </div>

                                <!-- Youtube  -->
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" value="{{ $data->youtube }}" class="form-control">
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
                                    <img class="d-block rounded-circle" src="{{ asset('upload/Team') }}/{{ $data->image }}" alt="{{ $data->image }}">
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
