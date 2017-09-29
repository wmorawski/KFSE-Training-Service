@layout('layouts/main')
@section('title') KFSE :: Moje konto @endsection

@section('content')
	<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Moje konto</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li class="active"><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li>{{$this->user->getUsername()}}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->

    <div class="row">
    	<div class="col-md-4 col-xs-12">
    		<div class="white-box">
    			<div class="p-30">
                    <div class="row">
                        <div class="col-xs-4">
                            <img src="{{$this->session->photo}}" alt="varun" class="img-circle img-responsive">
                        </div>
                        <div class="col-xs-8">
                            <h3 class="m-b-0">{{($this->user->getFirstName() && $this->user->getLastName()) ? $this->user->getFirstName()." ".$this->user->getLastName() : $this->user->getUsername() }}</h3>
                            <h5 class="m-t-0">Użytkownik</h5>
                            <a href="javascript:void(0)" class="btn btn-rounded btn-success"><i class="ti-plus m-r-5"></i> Zaproś do znajomych</a>
                        </div>
                    </div>
    			</div>
                <hr>
                <div class="p-20 text-center">
                    <h4 class="m-t-10 font-medium">Znajomych</h4>
                    <ul class="dp-table m-t-30">
                        <li><img src="{{base_url('public/plugins/images/users/varun.jpg')}}" alt="varun" width="60" data-toggle="tooltip" title="Varun Dhavan" class="img-circle"></li>
                        <li><img src="{{base_url('public/plugins/images/users/genu.jpg')}}" alt="varun" width="60" data-toggle="tooltip" title="Varun Dhavan" class="img-circle"></li>
                        <li><img src="{{base_url('public/plugins/images/users/pawandeep.jpg')}}" alt="varun" width="60" data-toggle="tooltip" title="Varun Dhavan" class="img-circle"></li>
                        <li><a href="{{base_url('usersss/friendships')}}" class="circle circle-md bg-info di" data-toggle="tooltip" title="Pokaż wszytkich">5+</a></li>
                    </ul>
                </div>
                <hr>
                <ul class="dp-table profile-social-icons">
                    <li><a href="javascript:void(0)"><i class="fa fa-globe"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-linkedin"></i></a></li>
                </ul>
    		</div>
    	</div>
    </div>
    @endsection