<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    #showdata {
        text-decoration: none;
        text-decoration-line: none;
    }

    #img {
        height: 15rem;
    }
</style>

<body>
    <section class="h-50 h-custom bg-dark">
        <div class="container py-5 h-70 w-150">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <img src="1.jpg" class="w-100 h-5 " id="img"
                            style="border-top-left-radius: .3rem; border-top-right-radius: .3rem; ;" alt="Sample photo">
                        <div class="card-body p-4 p-md-5 bg-dark text-white">
                            <h1 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Form</h1>
                            <form action="{{route('signup-data')}}" method="post">
                                @if(Session::has('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                                @endif
                                @if(Session::has('fail'))
                                <div class="alert alert-dark">{{Session::get('fail')}}</div>
                                @endif
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input type="name" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter Your Name" name="name" value="{{old('name')}}">
                                    <span class="text-danger">@error('name') {{$message}}@enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email address</label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter Your Email" name="email">
                                        <span class="text-danger">@error('email') {{$message}}@enderror
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Password</label>
                                    <input type="password" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Enter your password" name="password">
                                        <span class="text-danger">@error('password') {{$message}}@enderror
                                        </span>
                                </div>
                                <button class="btn  btn-success mt-2 " type="submit" name="button">Submit</button>
                                <button class="btn  btn-success mt-2 " id="showdata" type="submit" name="button"><a
                                        href="/select" class="text-light text-decoration-none">Showdata</a></button>
                                <p class="mt-3">Already Registered? <a href="/login"
                                        class="link-info text-success">Login Here</a></p>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>