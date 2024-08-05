@extends('layout.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Image</h4>
                    <p class="card-description"> Update the details below to edit the image in the gallery.</p>

                    <form class="forms-sample" method="POST" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="imageTitle">Image Title</label>
                            <input type="text" name="title" class="form-control" id="imageTitle" value="{{ old('title', $gallery->title) }}" placeholder="Enter image title" required>
                        </div>

                        <div class="form-group">
                            <label for="imageDescription">Description</label>
                            <textarea name="description" class="form-control" id="imageDescription" rows="4" placeholder="Enter image description" required>{{ old('description', $gallery->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="imageTag">Tag</label>
                            <input type="text" name="imagetag" class="form-control" id="imageTag" value="{{ old('imagetag', $gallery->imagetag) }}" placeholder="Enter image tag" required>
                        </div>

                        <div class="form-group">
                            <label for="categorySelect">Category</label>
                            <select name="category_id" class="form-control" id="categorySelect" required>
                                <option value="" disabled>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $gallery->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Current Image</label>
                            <div>
                                <img src="{{ asset($gallery->imagepath) }}" alt="{{ $gallery->title }}" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Upload New Image (optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <a href="{{ route('gallery.index') }}" class="btn btn-dark">Cancel</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
