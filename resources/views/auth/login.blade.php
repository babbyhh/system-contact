@extends('layouts.app');

@section('content')


    <div class="container-fluid mt-5 px-5">
        <div class="card card-cascade wider reverse my-8 " >
        <div class="card-body text-center wow fadeIn" Style = "padding: 0.3rem 0 0 !important; ">
            <h2>Login</h2>

            <form action ="{{ route('auth.login') }}" method="post" id="login">
                <div class="row">
                    @csrf
                    <div class="col-xs-10 col-sm-12 col-md-12">
                        <i class="fas fa-user fa-x5 col-sx-2"></i>&nbsp;<label>Email </label>&nbsp;<i style="color:red;  font-size:10px; " class="fas fa-asterisk fa-1x "></i>
                        <input class="form-control" id="email" name="email" />
                    </div>
                    <div class="col-xs-10 col-sm-12 col-md-12">
                        <i class="fas fa-key fa-x5 col-sx-2"></i>&nbsp;<label>Senha </label>&nbsp;<i style="color:red;  font-size:10px; " class="fas fa-asterisk fa-1x "></i>
                        <input type="password" class="form-control" id="password" name="password" />
                    </div>
                </div>
                <div> 
                    <button type="submit" id="login">Login</button>
                </div>
            </form>
        </div>
        </div>
    </div>