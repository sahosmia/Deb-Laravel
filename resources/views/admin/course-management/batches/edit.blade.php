@extends('admin.layouts.admin')

@section('title', 'Batch Edit')
@section('batches_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Batch Edit</h1>
            <a href="{{ route('admin.batches.index') }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Batch</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.batches.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Title  -->
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $data->title }}" class="form-control">
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
