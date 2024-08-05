@extends('layout.index')

@section('content')
<div class="container">
    <!-- Success Message -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Category Filters -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <ul class="nav nav-pills nav-pills-custom mb-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{ request('category_id') == '' ? 'active' : '' }}" href="{{ route('gallery.index') }}">All Categories</a>
                </li>
                @foreach ($categories as $category)
                <li class="nav-item">
                    <a class="nav-link {{ request('category_id') == $category->id ? 'active' : '' }}" href="{{ route('gallery.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Add Image Button -->

    <!-- Image Gallery -->
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Light Gallery</h4>
                    <p class="card-text">Click on any image to open in lightbox gallery</p>
                    <div id="lightgallery" class="row lightGallery">
                        @foreach ($images as $image)
                        <div class="col-md-3 mb-4 position-relative">
                            <div class="image-card position-relative">
                                <a href="{{ asset($image->imagepath) }}" class="image-tile">
                                    <img src="{{ asset($image->imagepath) }}" alt="{{ $image->title }}" class="img-fluid" style="width: 100%; height: auto;">
                                </a>
                            </div>
                            <div class="image-details mt-2 d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>{{ $image->title }}</h5>
                                    <p>{{ $image->imagetag }}</p>
                                </div>
                                <div class="image-icons d-flex justify-content-end align-items-center">
                                    <a href="{{ route('gallery.edit', $image->id) }}" class="text-warning mx-2">
                                        <i class="mdi mdi-pen"></i>
                                    </a>
                                    <form action="{{ route('gallery.destroy', $image->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" style="outline: none; border: none;" onclick="return confirm('Are you sure you want to delete this image?')">
                                            <i class="mdi mdi-delete"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Initialize LightGallery -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        lightGallery(document.getElementById('lightgallery'), {
            thumbnail: true,
            zoom: true,
            selector: '.image-tile'
        });
    });
</script>
@endsection
