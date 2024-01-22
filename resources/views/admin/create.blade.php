@extends('admin.layouts.master')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/list') }}" method="POST">
                @csrf
                @method('POST')
               <div class="" style="">
                <div class="mb-3">
                    <div class="">
                        <label for="nameInput" class="form-label">Name</label>
                    </div>
                    <div class="col-4">
                        <input name="name" type="text" class="form-control mt-1" id="nameInput" placeholder="Enter your name">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="">
                        <label for="nameInput" class="form-label">Email</label>
                    </div>
                    <div class="col-4">
                        <input name="email" type="text" class="form-control mt-1" id="nameInput" placeholder="Enter your email">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="">
                        <label for="nameInput" class="form-label">Password</label>
                    </div>
                    <div class="col-4">
                        <input name="password" type="text" class="form-control mt-1" id="nameInput" placeholder="Enter your password">
                    </div>
                </div>

                <div class="ms-1 mt-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
               </div>
            </form>
        </div>
    </div>
</div>

@endsection
