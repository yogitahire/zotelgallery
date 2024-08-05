@extends('layout.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Image</h4>
                    <p class="card-description"> Fill in the details below to add a new image to the gallery.</p>

                    <form class="forms-sample" method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="imageTitle">Image Title</label>
                            <input type="text" name="title" class="form-control" id="imageTitle" placeholder="Enter image title" required>
                        </div>

                        <div class="form-group">
                            <label for="imageDescription">Description</label>
                            <textarea name="description" class="form-control" id="imageDescription" rows="4" placeholder="Enter image description" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="imageTag">Tag</label>
                            <input type="text" name="imagetag" class="form-control" id="imageTag" placeholder="Enter image tag" required>
                        </div>

                        <div class="form-group">
                            <label for="categorySelect">Category</label>
                            <select name="category_id" class="form-control" id="categorySelect" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('gallery.index') }}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
