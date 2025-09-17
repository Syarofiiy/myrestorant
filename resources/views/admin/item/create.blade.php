@extends('admin.layouts.master')
@section('title', 'Add Menu')

@section('content')
    <div class="page-title">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Add Menu Data</h3>
            <p class="text-subtitle text-muted">Please fill in the menu data you want to add</p>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="form" action="{{ route('items.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Menu Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter menu name" name="name" required>
                                </div>

                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea type="text" class="form-control" id="description" placeholder="Enter menu description" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" placeholder="Enter price" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select class="form-select" id="category" name="category_id" required>
                                    <option value="" disabled selected>Choose Menu</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>

                            <div class="form-group">
                                <label for="is_active">Status</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" class="form-check-input" id="flexSwitchCheckChecked"
                                        name="is_active" value="1" checked>
                                    <label for="flexSwitchCheckChecked">Active / Inactive</label>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                <button type="submit" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                <a href="{{ route('items.index') }}" type="submit" class="btn btn-primary me-1 mb-1">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
