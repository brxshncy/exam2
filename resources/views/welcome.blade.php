<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic Contact List</title>
    <style>
        .img-container{
            width:40px;
            height:40px;
           
            margin-right:20px;
        }
        .img-container img, .edit-img-container img{
            height:100%;
            width:100%;
            object-fit: cover;
            border-radius:50%;
        }
        .edit-img-container{
            width:100px;
            height:100px;
        }

        .contact-info{
            display:flex;
            flex-direction:row;
            align-items:center;
            padding:0 20px;
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
                        <div class="col col-md-6">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#addContact">Add Contact</button>
                        <a href="{{ route('restore.index') }}">
                            <button class="btn btn-success">Restore Contacts</button>
                        </a>        
                        </div>
                    </div>
                    <div class="row mt-3">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">Contact</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="contact-info">
                                            <div class="img-container">
                                                <img src="{{ $user->avatar === null ? asset('uploads/no-pic.png') : asset('uploads/').'/'.$user->avatar }}" alt="">
                                            </div>
                                                <div class="name">
                                                    <strong>{{ $user->name }}</strong>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center" width="50%">
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addNote{{ $user->id }}">Add Note</button>
                                            <a href="{{ route('contact.show', $user->id) }}">
                                                <button class="btn btn-primary btn-sm">View</button>  
                                            </a>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit{{ $user->id }}">Edit</button>                      
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{ $user->id }}">Delete</button>
                                        </td>
                                    </tr>
                                    @include('modal.edit-contact')
                                    @include('modal.confirm-delete')
                                    @include('modal.add-note')
                                @endforeach
                            @else 
                            <tr class="text-center">
                                <td colspan="2">No contact added.</td>
                            </tr>
                            @endif
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Contact Modal -->
    @include('modal.add-contact')
   
    <!-- End And Contact Modal -->
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
@if(count($errors) > 0)
    <script type="text/javascript">
        $(document).ready(function(){
            $('#addContact').modal('show');
        })
    </script>
@endif
</body>
</html>