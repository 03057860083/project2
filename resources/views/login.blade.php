<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<style>
    #row {
        margin-top: 0%;
        margin-right: 0%;
        margin-bottom: 0%;

    }

    .row>* {
        padding-left: 0%;
        padding-right: 0%;
        padding-bottom: 0%;
    }

    *,
    ::after,
    ::before {
        box-sizing: unset;
    }

    #form-data {
        margin-bottom: 0%;
        padding-bottom: 0%;
    }


    #form-data button {
        border-radius: 30px;
        padding: 8px 45px;
        margin: 0 auto;
        display: flex;
        text-align: center;
        justify-content: center;
        font-family: serif;

    }

    #form-data h2 {
        text-align: center;
        font-family: serif;

    }

    #form-data p {
        text-align: center;
        font-family: serif;

    }

    strong {

        font-family: serif;
    }

    @media (min-width: 768px) {
        .p-md-5 {
            padding: 1.8rem !important;
        }
    }
</style>

<body>

    <div class="container-fluid">
        <div class="bg-dark text-white">


            <div class="row " id="row">
                <div class="col-md-6 ">
                    <img src="3.jpg" alt="Image" class="img-fluid" style="object-fit:cover;  width: 95%;  " />
                </div>
                <div class="col-md-6" id="form-data">
                    <div class="card-body p-md-5 text-black bg-dark text-white">
                        <form style="width: 23rem;" action="{{route('login-user')}}" method="post" data-bs-theme="dark">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            @csrf
                            <h2 class="fw-bold" style="letter-spacing: 1px;">LOGIN</h2>
                            <p class=" mb-4 mt-3 fw-bold">Please enter your username and password!</p>

                            <div class="form-outline mb-4">
                                <input type="email" name="email" id="form2Example28"
                                    class="form-control form-control-lg" placeholder="Enter Your Email" />
                                <span class="text-danger">@error('email') {{$message}}
                                    @enderror</span>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" name="password" id="form2Example28"
                                    class="form-control form-control-lg" placeholder="Enter Your Password" />
                                <span class="text-danger">@error('password') {{$message}}
                                    @enderror</span>
                            </div>

                            <button class="btn btn-info btn-lg btn-block mb-4" id="login" type="submit"
                                name="submit">Login
                            </button>


                            <div class="form-check d-flex justify-content-center mb-3">
                                <label class="form-check-label" for="form2Example3g">
                                    <a href="#!" class="text-body"><u>Forgot password?</u></a>
                                </label>
                            </div>
                            <p>Don't have an account? <a href="/signup" class="link-info">Signup Here</a></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>