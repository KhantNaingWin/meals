@extends('admin.layouts.master')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('categories') }}" method="POST">
                @csrf
                @method('POST')
               <div class="d-flex justify-content-center align-items-center">
                <div class="mb-3">
                    <div class="">
                        <label for="nameInput" class="form-label">Name</label>
                    </div>
                    <div class="">
                        <input name="name" type="text" class="form-control mt-1" id="nameInput" placeholder="Enter your name">
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
