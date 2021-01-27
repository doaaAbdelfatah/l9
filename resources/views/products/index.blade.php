<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <div class="container">
          <div class="row mt-3">
              <h1>Products</h1>
              <div class="col-md-3">
                    <form action="/products" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="Name" aria-describedby="helpId">
                            @error('name')
                                <small  class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control" placeholder="Price" aria-describedby="helpId">
                            @error('price')
                                <small  class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control">
                                <option></option>
                                @forelse ($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @empty
                                    <option>No cats</option>
                                @endforelse
                            </select>
                            @error('category_id')
                                <small  class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Brand</label>
                            <select name="brand_id" class="form-control">
                                <option></option>
                                @forelse (\App\Models\Brand::all() as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @empty
                                    <option>No Brands</option>
                                @endforelse
                            </select>
                            @error('brand_id')
                                <small  class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                        <input  class="btn btn-primary" type="submit" value="save">
                        </div>
                    </form>
              </div>
            <div class="col-md-9">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Updated At</th>
                            <th>Created At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{($product->brand)?$product->brand->name:"-"}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td>{{$product->created_at}}</td>
                            {{-- <td>
                                <a class="btn btn-sm btn-success" href="/brands/{{$brand->id}}/edit" role="button">Edit</a>
                                <a class="btn btn-sm btn-danger" href="/brands/{{$brand->id}}/delete" role="button">Delete</a>
                            </td> --}}
                        </tr>
                       @empty
                        <tr>
                            <td colspan="5">
                                Empty  Result
                            </td>
                        </tr>
                       @endforelse


                    </tbody>
                </table>
            </div>

          </div>
      </div>
  </body>
</html>
