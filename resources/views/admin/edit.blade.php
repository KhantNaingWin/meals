@extends('admin.layouts.master')
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/list/'.$admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="">
                        <label for="nameInput" class="form-label">Name</label>
                    </div>
                    <div class="col-4">
                        <input name="name" value="{{ $admin->name }}" type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="nameInput" class="form-label">Email</label>
                    </div>
                    <div class="col-4">
                        <input name="email" value="{{ $admin->email }}" type="email" class="form-control" id="nameInput" placeholder="Enter your name">
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <div class="">
                        <label for="nameInput" class="form-label">Password</label>
                    </div>
                    <div class="col-4">
                        <input name="email" value="{{ $admin->password }}" type="email" class="form-control" id="nameInput" placeholder="Enter your name">
                    </div>
                </div> --}}

                <div class="">
                    <button type="submit" class="btn btn-primary">Upgrade</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
