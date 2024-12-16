<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

 

    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="/">Product</a>
          </li>
      
        </ul>
      </nav>
      <div class="container-fluid">
        <div class="text-right">
            <a href="product/create" class="btn btn-dark mt-2">Add Product</a>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
                @if(session('danger'))
                <div class="alert alert-danger">{{ session('danger') }}</div>
            @endif
                <div class="card mt-2 p-3">
                    <table class="table">
                        <thead>
                            <th>S#</th>
                            <th>Name</th>
                            <th>image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product )
                           
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td><a href="product/{{ $product->id }}/show">{{ $product->name }}</a></td>
                                <td>
                                    <img src="products/{{ $product->image }}" class="rounded-circle" width="40" height="40" alt="">
                                </td>
                                <td>{{ $product->description }}</td>
                                <td class="d-flex">
                                    <a href="product/{{ $product->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                                    <a href="product/{{ $product->id }}/delete" class="btn btn-danger btn-sm ml-1">Delete</a>
                                </td>
                                
                            </tr>
                                 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
 </div>

</body>

</html>
