@extends('admin.layouts.admin')

@section('title', 'Ragistation User Information')
@section('students_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Ragistation User Information</h1>
            {{-- <a href="{{ route('admin.ragistations.index', $data->batch_id) }}" class="btn btn-primary  ml-auto">Back</a> --}}
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Information</h4>
                        </div>
                        <div class="card-body">


                                <!-- Name  -->
                                <div class="form-group">
                                    <label>Name </label>
                                    <p>{{ $data->user->name }}</p>
                                </div>

                                <!-- Email  -->
                                <div class="form-group">
                                    <label>Email </label>
                                    <p>{{ $data->user->email }}</p>
                                </div>

                                <!-- Batch -->
                                <div class="form-group">
                                    <label>Batch </label>
                                    <p>{{ $data->batch->title }}</p>
                                </div>

                                <!-- Date of Birth  -->
                                <div class="form-group">
                                    <label>Age </label>
                                    <p>{{ getBirthYear($data->date_of_birth) }}</p>
                                </div>

                                <!-- Phone  -->
                                <div class="form-group">
                                    <label>Phone </label>
                                    <p>{{ $data->phone }}</p>
                                </div>

                                <!-- Whatsapp Number  -->
                                <div class="form-group">
                                    <label>Whatsapp Number </label>
                                    <p>{{ $data->whatsapp }}</p>
                                </div>

                                <!-- Address  -->
                                <div class="form-group">
                                    <label>Address</label>
                                    <p>{{ $data->address }}</p>
                                </div>

                                <!-- Facebook Link   -->
                                <div class="form-group">
                                    <label>Facebook Link </label>
                                    <p>{{ $data->facebook }}</p>
                                </div>

                                <!-- Linkedin Link  -->
                                <div class="form-group">
                                    <label>Linkedin Link </label>
                                    <p>{{ $data->linkedin }}</p>
                                </div>

                                <!-- Drive Link  -->
                                <div class="form-group">
                                    <label>Drive Link </label>
                                    <p>{{ $data->drive }}</p>
                                </div>

                                <!-- Drive Link  -->
                                <div class="form-group">
                                    <label>Payment Amount </label>
                                    <p>{{ $data->payment_amount }}</p>
                                </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
