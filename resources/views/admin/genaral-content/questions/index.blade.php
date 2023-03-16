@extends('admin.layouts.admin')

@section('title', 'Question View')
@section('questions_menu', 'active')
@section('genaral_content_dropdown', 'active')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Question View</h1>
            <a href="{{ route('admin.questions.create') }}" class="btn btn-primary  ml-auto">Create</a>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Question </h4>

                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($questions as $k => $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->answer }}</td>
                                            <td>{!! is_active($item->is_active) !!}</td>

                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-dark dropdown-toggle" type="button"
                                                        id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start"
                                                        style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a class="dropdown-item has-icon"
                                                            href="{{ route('admin.questions.edit', $item->id) }}"><i
                                                                class="far fa-edit"></i> Edit</a>
                                                        <form action="{{ route('admin.questions.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item has-icon"><i class="fa-solid fa-trash"></i> Delete</button>
                                                        </form>
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
                                    {!! $questions->links() !!}
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>







@endsection
