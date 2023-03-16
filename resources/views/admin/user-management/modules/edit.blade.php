@extends('admin.layouts.admin')

@section('title', 'Modules Edit')
@section('modules_menu', 'active')
@section('user_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Module Edit</h1>
            <a href="{{ route('admin.modules.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Module</h4>
                        </div>
                        <div class="card-body">
                            @include("admin.layouts.com.status")
                            <form action="{{ route('admin.modules.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Title  -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $data->title }}" class="form-control">
                                </div>



                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
