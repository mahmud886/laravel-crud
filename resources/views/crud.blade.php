<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Laravel 8 CRUD</title>
  </head>
  <body>

    <div class="pt-5"></div>
    <div class="container">
        <div class="row">

            {{-- Inserted Items --}}

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                      List of the Students
                    </div>

                    @if (session('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Successfully data deleted..</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body">
                      {{-- Table --}}

                      <table class="table caption-top stripe">
                        <caption>List of Students</caption>
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Roll</th>
                            <th scope="col">Class</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $number_count = 1;
                            @endphp

                            {{-- Inserting foreach loop on the table --}}
                            @foreach ($students as $student )
                                <tr>
                                    <th scope="row">{{ $number_count++ }}</th>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->roll }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td>
                                        <a href="{{ url('student/edit/'. $student->id ) }}"class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ url('student/destroy/'.$student->id ) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you ready to delete?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                      </table>

                    </div>
                  </div>
            </div>

            {{-- Adding Items --}}

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                      Add Students
                    </div>

                    {{-- Showing Inserting Alert --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Successfully data added..</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- Showing Inserting Alert --}}


                    <div class="card-body">
                      {{-- Form --}}

                        <form action="{{ url('student/store') }}" method="POST">
                            @csrf
                            <div class="mb-3 form-group">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control
                                @error('name')
                                    is-invalid
                                @enderror"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <label for="exampleInputPassword1" class="form-label">Roll</label>
                                <input type="text" name="roll" class="form-control
                                @error('roll')
                                    is-invalid
                                @enderror" id="exampleInputPassword1">
                                @error('roll')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <div class="mb-3 form-group ">
                                <label for="exampleInputPassword1" class="form-label">Class</label>
                                <input type="text" name="class" class="form-control
                                @error('class')
                                    is-invalid
                                @enderror" id="exampleInputPassword1">
                                @error('class')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                  </div>
            </div>

        </div>
    </div>




















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
