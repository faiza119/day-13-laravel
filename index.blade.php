<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .product-box {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        .header-text {
            font-size: 30px;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Page Heading --}}
    <h2 class="text-center header-text mb-4">🛍️ Our Product Collection</h2>

    {{-- No Product --}}
    @if($products->isEmpty())
        <div class="alert alert-warning text-center">
            😔 No products found.<br>
            <a href="/insert-demo-products" class="btn btn-outline-primary mt-2">Click Here to Add Sample Products</a>
        </div>
    @else
        <div class="d-flex justify-content-end mb-3">
            <a href="/products/create" class="btn btn-primary">➕ Add New Product</a>
        </div>

        <div class="product-box">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price (₹)</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th> {{-- Added action header --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><strong>{{ $product->name }}</strong></td>
                            <td><span class="badge bg-success">₹{{ number_format($product->price, 2) }}</span></td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->created_at->format('d M, Y h:i A') }}</td>
                            <td>
                                <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">✏️ Edit</a>

                                <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

</body>
</html>
