<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Product Photo</th>
                            <th>Description</th>
                            <th>Flaws</th>
                            <th>Category</th>
                            <th>Quality</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if ($product->product_photo)
                                        <img src="{{ asset('images/' . $product->product_photo) }}" alt="Product Photo" style="max-width: 100%;">
                                    @endif
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->flaws }}</td>
                                <td>{{ $product->category_id }}</td>
                                <td>{{ $product->quality_id }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <form action="{{ route('product.edit', $product->id) }}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-danger">Edit</button>
                                    </form>
                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
