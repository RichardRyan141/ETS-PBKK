<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/product" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="flaws">Product Flaw</label>
                            <textarea class="form-control" id="flaws" name="flaws">{{ old('flaws') }}</textarea>
                            @error('flaws')
                                <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Product Stock</label>
                            <input type="number"  class="form-control" id="stock" name="stock">{{ old('stock') }}</textarea>
                            @error('flaws')
                                <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_photo">Product Photo (PNG, JPG, JPEG, max 2MB)</label>
                            <input type="file" class="form-control-file" id="product_photo" name="product_photo" accept="image/png, image/jpeg, image/jpg" value="{{ old('product_photo') }}">
                            @error('id_card_photo')
                                <div class="alert alert-danger fs-6 text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quality_id">Quality</label>
                            <select class="form-control" id="quality_id" name="quality_id">
                                @foreach ($qualities as $quality)
                                    <option value="{{ $quality->id }}">{{ $quality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
