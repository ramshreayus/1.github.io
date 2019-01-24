@extends('layouts.master')
@section('title','Register')
@section('pagebody')

<!-- Start Inner Contents -->               
        
        <section class="login-header">
            <div class="container">
                <h1>Invitation required</h1>
            </div>
        </section>
        <section class="myaccount-body">
            <div class="myaccount-document"> 
                <div class="container">                                  
                    <h3 >Please Sign Up</h3>                
                    <div class="col-md-5 col-sm-5 text-center">
                        <form name="form" method="post" action="/register/store">
                            {{csrf_field()}} 
                            <select name="grbid" class="form-control">
                                @foreach($usergroup as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <input class="form-control" name="first_name" placeholder="First Name" type="text" required=""><br>
                            <input class="form-control" name="last_name" placeholder="Last Name" type="text" required=""><br>
                            <input class="form-control" name="username" placeholder="User Name" type="text" required=""><br>
                            <input class="form-control" name="email" placeholder="Email" type="email" required=""><br>
                            <input class="form-control" name="password" id="password" placeholder="Password" type="password" required=""><br>
                            <input class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" type="password" required="">
                            <p><button style="background-color: #37b2d6; padding: 5px 20px; border: 2px solid #37B2D6; color: #fff;" name="submit" type="submit" onclick="return Validate()" />SUBMIT</button></p>
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-2">
                                    <div class="custom-pos"><p class="text-center">(or)</p></div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="social-networks">                
                                        <div class="wp-social-login-widget">
                                            <div class="wp-social-login-connect-with">Connect with:</div>
                                            <div class="wp-social-login-provider-list">
                                                <a  href="{{url('/register')}}/facebook" title="" class="" data-provider="Facebook">
                                                    <img alt="Facebook" title="" src="https://africainnovationmarket.org/wp-content/plugins/wordpress-social-login/assets/img/32x32/wpzoom/facebook.png">
                                                </a>
                                                <a href="{{url('/register')}}/google" title="" class="" data-provider="Google">
                                                    <img alt="Google" title="" src="https://africainnovationmarket.org/wp-content/plugins/wordpress-social-login/assets/img/32x32/wpzoom/google.png">
                                                </a>
                                                <a href="{{url('/register')}}/twitter" title="" class="" data-provider="Twitter">
                                                    <img alt="Twitter" title="" src="https://africainnovationmarket.org/wp-content/plugins/wordpress-social-login/assets/img/32x32/wpzoom/twitter.png">
                                                </a>
                                                <a href="{{url('/register')}}/linkedin" title="" class="" data-provider="LinkedIn">
                                                    <img alt="LinkedIn" title="" src="https://africainnovationmarket.org/wp-content/plugins/wordpress-social-login/assets/img/32x32/wpzoom/linkedin.png">
                                                </a>
                                            </div>
                                            <div class="wp-social-login-widget-clearing"></div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
        </section>
        <!-- End Inner Contents -->                 
              
 <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("cpassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

@endsection