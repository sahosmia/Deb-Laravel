@extends('admin.layouts.admin')

@section('title', 'Team Create')
@section('teams_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Team Create</h1>
            <a href="{{ route('admin.teams.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add New Team</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
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

                                <!-- Facebook  -->
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" value="{{ old('facebook') }}" class="form-control">
                                </div>

                                <!-- Linkedin  -->
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" name="linkedin" value="{{ old('linkedin') }}" class="form-control">
                                </div>

                                <!-- twitter  -->
                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" value="{{ old('twitter') }}" class="form-control">
                                </div>

                                <!-- Instragram  -->
                                <div class="form-group">
                                    <label>Instragram</label>
                                    <input type="text" name="instragram" value="{{ old('instragram') }}" class="form-control">
                                </div>

                                <!-- Youtube  -->
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" value="{{ old('youtube') }}" class="form-control">
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
