<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Product Detial</h3>
                    </div>
                    <div class="card-body text-center">
                        <h5>Product Name:</h5>{{ $product->name }}
                        <h5>Description:</h5>{{ $product->description }}
                        <p><img src="{{ asset('products/' . $product->image) }}" height="100" class="rounded-circle" width="100" alt="{{ $product->name }}"></p>
                        <a href="/" class="btn btn-info">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>