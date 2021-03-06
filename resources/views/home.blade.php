<!doctype html>
<html lang="en">

<head>
    <title>Simple crud</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <section>
        <div class="p-5">
            <h2 class="text-center">Semple CRUD Applilcation</h2>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-8">
                    <div class="card text-white bg-primary">
                        <div class="card-header d-flex">
                            <h2>All Users</h2>
 
                       
                            @if ($edit==true)
                                <a class="ml-auto ml-auto btn btn-dark" href="/">Add User</a>
                            @endif
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Cell</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $sl=1;
                                    @endphp
                                    @foreach ($members as $member)

                                    <tr>
                                        <th scope="row">{{$sl ++}}</th>
                                        <td>{{$member->name}}</td>
                                        <td>{{$member->email}}</td>
                                        <td>{{$member->cell}}</td>
                                        <td>{{$member->role}}</td>
                                        <td>{{$member->address}}</td>
                                        <td class=" d-flex">
                                            <span>

                                                <a class="btn btn-link" href="/edit-form/{{$member->id}}"><i
                                                        class="fa fa-pencil-square-o text-info"
                                                        aria-hidden="true"></i></a>
                                                </form>
                                            </span>
                                            <span>
                                                <form action="/delete-user" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{$member->id}}">
                                                    <button class="btn btn-link" type="submit"><i
                                                            class="fa fa-trash text-danger"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </span>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    @if ($edit==true)
                    <div class="card text-white bg-primary">
                        <div class="card-header">
                            <h2>Update User</h2>
                        </div>
                        @if (session('message'))
                        <strong>{{session('message')}}</strong>
                        @endif
                        <div class="card-body">


                            <form action="{{url('/update-user')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$edit_member_data->id}}">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') {{'border-danger'}}  @enderror"
                                        value="{{$edit_member_data->name}}">
                                    @error('name')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">User Email</label>
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') {{'border-danger'}}  @enderror"
                                        value="{{$edit_member_data->email}}">
                                    @error('email')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cell">User Cell</label>
                                    <input type="text" name="cell" id="cell"
                                        class="form-control @error('cell') {{'border-danger'}}  @enderror"
                                        value="{{$edit_member_data->cell}}">
                                    @error('cell')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">User Role</label>
                                    <select class="form-control" name="role" id="role">

                                        <option selected>{{$edit_member_data->role}}</option>
                                        <option>Admin</option>
                                        <option>Manager</option>
                                        <option>Sales Man</option>
                                        <option>Editor</option>
                                        <option>Subscriber</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="address">User Address</label>
                                    <input type="text" name="address" id="address"
                                        class="form-control @error('address') {{'border-danger'}}  @enderror"
                                        value="{{$edit_member_data->address}}">
                                    @error('address')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <input class="btn btn-block btn-dark" type="submit" value="Update User">
                            </form>





                        </div>
                    </div>
                    @else
                    <div class="card text-white bg-primary">
                        <div class="card-header">
                            <h2>Add Users</h2>
                        </div>
                        @if (session('message'))
                        <strong>{{session('message')}}</strong>
                        @endif
                        <div class="card-body">



                            
                            <form action="{{url('/create-user')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') {{'border-danger'}}  @enderror"
                                         placeholder="Enter User Name">
                                    @error('name')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">User Email</label>
                                    <input type="text" name="email" id="email"
                                        class="form-control @error('email') {{'border-danger'}}  @enderror"
                                        placeholder="Enter User Email">
                                    @error('email')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cell">User Cell</label>
                                    <input type="text" name="cell" id="cell"
                                        class="form-control @error('cell') {{'border-danger'}}  @enderror"
                                        placeholder="Enter User Cell">
                                    @error('cell')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">User Role</label>
                                    <select class="form-control" name="role" id="role">
                                        <option>Admin</option>
                                        <option>Manager</option>
                                        <option>Sales Man</option>
                                        <option>Editor</option>
                                        <option selected>Subscriber</option>
                                    </select>
                                </div>
                        
                                <div class="form-group">
                                    <label for="address">User Address</label>
                                    <input type="text" name="address" id="address"
                                        class="form-control @error('address') {{'border-danger'}}  @enderror"
                                        placeholder="Enter User Address">
                                    @error('address')
                                    <p class=" text-warning">{{$message}}</p>
                                    @enderror
                                </div>
                                <input class="btn btn-block btn-dark" type="submit" value="Add User">
                            </form>




                        </div>
                    </div>
                    @endif

                    
                </div>
            </div>
        </div>
    </section>














   



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
