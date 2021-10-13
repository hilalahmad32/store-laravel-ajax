<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>

    <div id="layoutAuthentication_content">
        <div class="alert alert-success alert-dismissible" id="success-message">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <div class="alert alert-danger alert-dismissible" id="error-message">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Admin Login</h3>
                            </div>
                            <div class="card-body">
                                <form id="admin-login">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="email" name="email" type="email"
                                            placeholder="Enter email address" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" id="password" name="password" type="password"
                                            placeholder="Enter password" />
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="rememberPasswordCheck"
                                                type="checkbox" />
                                            <label class="custom-control-label" for="rememberPasswordCheck">Remember
                                                password</label>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="password.html">Forgot Password?</a>
                                        <button class="btn btn-primary" id="login-users">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/admin/action.js') }}"></script>
    <script src="{{ asset('js/customar/action.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
</body>

</html>