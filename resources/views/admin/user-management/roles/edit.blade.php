@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Roles</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('update-role', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="text" name="role" value="{{ $role->name }}">

                        <h1>Permission</h1>
                        @foreach ($permissions as $permission)

                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            <label for="">{{ $permission->name }}</label>
                        @endforeach
                        <button type="submit">Role</button>
                    </form>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection


