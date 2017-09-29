@layout('layouts/auth')
@section('content')
    <a href="javascript:void(0)" class="text-center db"><img src="{{base_url('public/img/login-logo.png')}}" alt="Home" /></a>
    <form action="{{base_url('/login')}}" method="post" accept-charset="utf-8" class="form-horizontal form-material" id="loginform" >
        <div class="form-group">
            <div class="col-xs-12">
                <h3>Logowanie</h3>
                <p class="text-muted">Zaloguj się i korzystaj w pełni</p>
            </div>
        </div>
        <div class="form-group m-t-40">
            <div class="col-xs-12">
                <input type="text" id="form3" class="form-control" name="identity" placeholder="Nazwa użytkownika" data-validation="length" data-validation-length="3-64" value="{{$cookies['identity']}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
                <input type="password" id="form4" class="form-control" name="password"  placeholder="Hasło" data-validation="length" data-validation-length="min8">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <div class="checkbox checkbox-primary pull-left p-t-0">
                    <input type="checkbox" id="remember" name="remember" >
                    <label for="remember"> Zapamiętaj mnie</label>
                </div>
                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa icon-lock m-r-5"></i> Zapomniałeś hasła?</a>
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" id="submitRegister" type="submit">Zaloguj się</button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                <div class="social"><a href="javascript:void(0)" class="btn  btn-primary btn-rounded btn-outline" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa icon-social-facebook"></i> Zaloguj przez Facebook</a> </div>
            </div>
        </div>
        <div class="form-group m-b-0">
            <div class="col-sm-12 text-center">
                <p>Nie masz konta? <a href="javascript:void(0)" id="to-register" class="text-primary m-l-5"><b>Zarejestruj się</b></a></p>
            </div>
        </div>
    </form>
    <form class="form-horizontal" id="recoverform" action="">
        <div class="form-group">
            <div class="col-xs-12">
                <h3>Odzyskaj hasło</h3>
                <p class="text-muted">Wprowadź swój e-mail, a instrukcje zostaną wysłane do Ciebie!</p>
            </div>
        </div>
        <div class="form-group ">
            <div class="col-xs-12">
                <input class="form-control" type="text" required="" placeholder="Email">
            </div>
        </div>
        <div class="form-group text-center m-t-20">
            <div class="col-xs-12">
                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Resetuj</button>
            </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Przejdź do: <a href="javascript:void(0)" id="to-login-from-recover" class="text-primary m-l-5"><b>Logowanie</b></a></p>
          </div>
        </div>
    </form>
    <form class="form-horizontal" id="registerform" action="">
        <h3 class="box-title m-t-40 m-b-0">Rejestracja</h3>
        <small>Stwórz konto i dołącz do nas</small> 
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Login">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="E-mail">
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="password" required="" placeholder="Hasło">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" required="" placeholder="Powtórz hasło">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup">Akceptuję <a href="#">Regulamin</a></label>
            </div>
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Zarejestruj</button>
          </div>
        </div>
        <div class="form-group m-b-0">
          <div class="col-sm-12 text-center">
            <p>Masz już konto? <a href="javascript:void(0)" id="to-login-from-register" class="text-primary m-l-5"><b>Zaloguj się</b></a></p>
          </div>
        </div>
      </form>
@endsection