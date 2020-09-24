<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->name }}</title>
    <style>
 
        .view-img-container{
            height:100px;
            width:100px;
            display:flex;
            justify-content: center;
        }
        img{
            height:100%;
            width:100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col col-md-7">
            @if(session('succ'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success text-center">
                        <small>{{ session('succ') }}</small>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-center">Contact List</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col col-md-4">
                        <a href="{{ route('contact.index') }}">
                                <button class="btn btn-secondary btn-block" data-toggle="modal">Back</button>
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="view-img-container">
                            <img src="{{ $user->avatar === null ? asset('uploads/no-pic.png') : asset('uploads/')."/".$user->avatar }}" alt="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <p>Name: <strong>{{ $user->name }}</strong></p>
                        </div>
                        <div class="col">
                            <p>Email: <strong>{{ $user->email }}</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p>Address: <strong>{{ $user->address }}</strong></p>
                        </div>
                        <div class="col">
                            <p>Contact: <strong>{{ $user->contact }}</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped table-bordered text-center">
                                <thead>
                                  <tr>
                                    <th scope="col">Notes</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if(count($notes) > 0)
                                        @foreach($notes as $note)
                                            <tr>
                                                <td width="70%">{{$note->note}}</td>
                                                <td>
                                                <button data-toggle="modal" data-target="#editNote{{$note->id}}" class="btn btn-success btn-sm">Edit</button>
                                                <button data-toggle="modal" data-target="#deleteNote{{$note->id}}" class="btn btn-danger btn-sm">Delete</button>
                                                </td>
                                            </tr>
                                            @include('modal.edit-note')
                                            @include('modal.confirm-note-delete')
                                        @endforeach
                                    @else
                                    <tr>
                                        <td colspan="2">No notes added.</td>
                                    </tr>
                                    @endif
                                  
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>