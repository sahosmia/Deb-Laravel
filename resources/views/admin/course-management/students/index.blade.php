@extends('admin.layouts.admin')

@section('title', 'Student')
@section('students_menu', 'active')
@section('course_management_dropdown', 'active')

@section('content')
    <section class="section">


        <div class="section-body">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Student </h4>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>

                                    @forelse ($students as $k => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ optional($item->user)->name }}</td>
                                            <td>{{ getBirthYear($item->date_of_birth) }}</td>
                                            <td>{{ $item->address }}</td>



                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">

                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.students.show', $item->id) }}"><i
                                                                class="far fa-heart"></i> Details</a>
                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.students.edit', $item->id) }}"><i
                                                                class="far fa-heart"></i> Edit</a>

                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.students.destroy', $item->id) }}"><i
                                                                class="far fa-heart"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50" class="text-danger text-center">No data to show</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <nav class="d-inline-block">
                                    {!! $students->links() !!}
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('exta_js')
    {{-- <script>
        var action = document.querySelector('.change_status');

        action.addEventListener('change', function(e) {
            var student = e.target.getAttribute('data');
            var decision = action.value;
            var url = `http://127.0.0.1:8000/admin/change-satatus/ragistations/${student}/decision/${decision}`;
            window.location.href = url;
        })
    </script> --}}
@endsection
