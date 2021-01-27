<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, {{$name}}</title>
  </head>
  <body>
    <div class="container mt-3">
        <div class="row">
        <h1>Category</h1>
        <div class="col-4">
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <form action="/cats/add" method="post">
                @csrf
                <div class="form-group">
                <label>Name</label>
                <input type="text" name="name"  class="form-control" placeholder="" value="{{old('name')}}" aria-describedby="helpId">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label>Age</label>
                <input type="text" name="age"  class="form-control" placeholder="" value="{{old('age')}}" aria-describedby="helpId">
                @error('age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label>Hire Date</label>
                <input type="date" name="hdate"  class="form-control" placeholder="" value="{{old('hdate')}}" aria-describedby="helpId">
                @error('hdate')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group">
                <label>Comment</label>
                <input type="text" name="comment"  value="{{old('comment')}}"  class="form-control" placeholder="" aria-describedby="helpId">
                @error('comment')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <input type="submit" class="btn btn-primary mt-2" value="Add">
            </form>
        </div>
        <div class="col-8">
            @forelse ($categories as $k=> $cat)
            <!-- html -->
            <div class="card m-1">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title"> {{$k}} - {!!$cat !!}</h4>
                </div>
                {{-- balde
                    comments--}}
            </div>
            @empty
            no cats
            @endforelse
        </div>
    </div>
    <hr>
    <div>
        <?php if(5>10){
            ?>
        Test
            <?php
        }?>


        @if($name =="Doaa")
            Hello {{$name}}
        @else
            Bye
        @endif

        <hr>




    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>
