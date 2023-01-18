@extends('admin.layouts.admin')

@section('title', 'User Information Edit')
@section('batches_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User Information Edit</h1>
            <a href="{{ route('admin.ragistations.index', $data->batch_id) }}" class="btn btn-primary  ml-auto">Back</a>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Batch</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.ragistations.update', $data->id) }}" method="POST">
                                @csrf
                                {{-- @method('PUT') --}}
                                <!-- Name  -->
                                <div class="form-group">
                                    <label>Name <span class="mandatory">*</span></label>
                                    <input type="text" name="name" value="{{ $data->user->name }}" class="form-control" readonly>
                                </div>

                                <!-- Email  -->
                                <div class="form-group">
                                    <label>Email <span class="mandatory">*</span></label>
                                    <input type="text" name="email" value="{{ $data->user->email }}" class="form-control" readonly>
                                </div>

                                <!-- Date of Birth  -->
                                <div class="form-group">
                                    <label>Date of Birth <span class="mandatory">*</span></label>
                                    <input type="date" name="date_of_birth" value="{{ $data->date_of_birth }}"
                                        class="form-control">
                                </div>

                                <!-- Phone  -->
                                <div class="form-group">
                                    <label>Phone <span class="mandatory">*</span></label>
                                    <input type="text" name="phone" value="{{ $data->phone }}" class="form-control">
                                </div>

                                <!-- Address  -->
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ $data->address }}" class="form-control">
                                </div>

                                <!-- Facebook Link   -->
                                <div class="form-group">
                                    <label>Facebook Link <span class="mandatory">*</span></label>
                                    <input type="text" name="facebook_link" value="{{ $data->facebook_link }}"
                                        class="form-control">
                                </div>

                                <!-- Linkedin Link  -->
                                <div class="form-group">
                                    <label>Linkedin Link <span class="mandatory">*</span></label>
                                    <input type="text" name="linkedin_link" value="{{ $data->linkedin_link }}"
                                        class="form-control">
                                </div>

                                <!-- Whatsapp Number  -->
                                <div class="form-group">
                                    <label>Whatsapp Number <span class="mandatory">*</span></label>
                                    <input type="text" name="whatsapp" value="{{ $data->whatsapp }}" class="form-control">
                                </div>

                                <!-- Batch  -->
                                <div class="form-group">
                                    <label>Batch <span class="mandatory">*</span></label>
                                    <select name="batch_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($batches as $item)
                                            <option @selected($item->id == $data->batch_id) value="{{ $item->id }}">
                                                {{ $item->title }}</option>
                                        @endforeach

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
