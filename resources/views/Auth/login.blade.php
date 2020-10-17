@extends('Auth.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
                <div class="card card-signup">
                    <form class="form">
                        <div class="header header-primary text-center">
                            <h4>Sign in</h4>
                            <div class="social-line">
                                <a href="javascript:void(0);" class="btn btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a  href="javascript:void(0);" class="btn btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <h3 class="mt-0">Falcon</h3>
                        <p class="help-block">Or Be Classical</p>
                        <div class="content">
                            <div class="form-group">
                                <input type="email" class="form-control underline-input" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password..." class="form-control underline-input">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes"> Remember me</label>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <a href="index.html" class="btn btn-info btn-raised">Login</a>
                        </div>
                        <a href="forgotpass.html" class="btn btn-wd">Forgot Password?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer mt-20">
        <div class="container">
            <div class="col-lg-12 text-center">
                <a href="signup.html" class="text-uppercase text-white">Create an account</a>
                <div class="copyright text-white mt-20"> &copy; 2017, made with
                    <i class="fa fa-heart heart"></i> by
                    <a href="http://thememakker.com/" target="_blank">Theme Makker</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
