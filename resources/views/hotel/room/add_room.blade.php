@extends('hotel.index')
@section('content')
<link href="{{ url('post/css/main.css') }}" rel="stylesheet" media="all">
<div class="container">
    <div class="card-body">
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <form  action="{{ route('add_room') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="name">Title</div>
                <div class="value">
                    <input class="input--style-6" type="text" name="title" placeholder="Title">
                </div>
            </div>
            <div class="form-row">
                <div class="name">Short Description</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-6" type="text" name="description" placeholder="Write short description">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="name">Capicity</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-6" type="number" name="capacity" placeholder="how many peoples...">
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="name">Price</div>
                <div class="value">
                    <div class="input-group">
                        <input class="input--style-6" type="number" name="price" placeholder="50.00$">
                    </div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="name">Upload Image</div>
                <div class="value">
                    <div class="input-group js-input-file">
                        <input class="input-file" type="file" name="image" id="file">
                        <label class="label--file" for="file">Choose file</label>
                        <span class="input-file__info mt-2">No file chosen</span>
                    </div>
                </div>
            </div>
            <button class="btn btn--radius-2 btn--blue-2 mx-5 mt-3" type="submit">POST</button>
        </form>
    </div>


</div>

<script src="{{ url('post/vendor/jquery/jquery.min.js') }}"></script>


<!-- Main JS-->
<script src="{{ url('post/js/global.js') }}"></script>
@endsection