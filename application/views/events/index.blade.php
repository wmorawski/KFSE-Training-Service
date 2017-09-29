@layout('layouts/main')
@section('title') KFSE :: Wydarzenia @endsection
@section('headcss')
    @endsection

@section('bscript')
	<script src="{{base_url('public/js/jquery.slimscroll.js')}}"></script>
    <script>
        $('.slimtext').slimScroll({
            height: '150px'
        });
    </script>
    @endsection
@section('content')
	<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Wydarzenia</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li class="active">Wydarzenia</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->
    <div class="row">
    	<div class="col-md-6">
    		<div class="white-box" id="event-1">
    			<h3 class="box-title"><a href="{{base_url('events/event')}}">RUSH TOURNAMENT ZDZ KATOWICE</a><span class="pull-right">23/10/2017</span></h3>
    			<div class="row">
    				<div class="col-sm-3">
    					<img src="{{base_url('public/plugins/images/big/img1.jpg')}}" class="img-responsive" />
    				</div>
    				<div class="col-sm-9 slimtext">
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-3">
    					<ul class="list-event games">
    						<li class="csgo" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
    						<li class="lol" data-toggle="tooltip" title="League of Legends"></li>
    						<li class="dota" data-toggle="tooltip" title="Dota 2"></li>
    						<li class="mortal-kombat" data-toggle="tooltip" title="Mortal Kombat X"></li>
                            <li class="csgo none" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
                            <li class="lol none" data-toggle="tooltip" title="League of Legends"></li>
                            <li class="dota none" data-toggle="tooltip" title="Dota 2"></li>
                            <li class="mortal-kombat none" data-toggle="tooltip" title="Mortal Kombat X"></li>
                            <li class="hearthstone none" data-toggle="tooltip" title="Hearthstone"></li>     
    						<li class="more" data-toggle="tooltip" title="Pokaż wszytkie tytuły"><a href="javascript:void(0)" id="more-1" class="le-games-more"><i class="ti-more-alt"></i></a></li>							
    					</ul>
    				</div>
    				<div class="col-sm-9">
    					<a href="{{base_url('events/event')}}" class="btn btn-default btn-outline">Zobacz więcej</a>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<div class="white-box" id="event-2">
    			<h3 class="box-title"><a href="{{base_url('events/event')}}">ProVirtual ESPORT Championship 2017</a><span class="pull-right">23/10/2017</span></h3>
    			<div class="row">
    				<div class="col-sm-3">
    					<img src="{{base_url('public/plugins/images/big/img1.jpg')}}" class="img-responsive" />
    				</div>
    				<div class="col-sm-9 slimtext">
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-3">
    					<ul class="list-event games">
    						<li class="csgo" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
    						<li class="lol" data-toggle="tooltip" title="League of Legends"></li>
    						<li class="dota" data-toggle="tooltip" title="Dota 2"></li>
    						<li class="mortal-kombat" data-toggle="tooltip" title="Mortal Kombat X"></li>
                            <li class="csgo none" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
                            <li class="lol none" data-toggle="tooltip" title="League of Legends"></li>
                            <li class="dota none" data-toggle="tooltip" title="Dota 2"></li>
                            <li class="mortal-kombat none" data-toggle="tooltip" title="Mortal Kombat X"></li>                            
                            <li class="hearthstone none" data-toggle="tooltip" title="Hearthstone"></li>     
                            <li class="more" data-toggle="tooltip" title="Pokaż wszytkie tytuły"><a href="javascript:void(0)" id="more-2" class="le-games-more"><i class="ti-more-alt"></i></a></li>
    					</ul>
    				</div>
    				<div class="col-sm-9">
    					<a href="{{base_url('events/event')}}" class="btn btn-default btn-outline">Zobacz więcej</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- .row -->
    <div class="row">
    	<div class="col-md-6">
    		<div class="white-box" id="event-3">
    			<h3 class="box-title"><a href="{{base_url('events/event')}}">RUSH TOURNAMENT ZDZ KATOWICE</a><span class="pull-right">23/10/2017</span></h3>
    			<div class="row">
    				<div class="col-sm-3">
    					<img src="{{base_url('public/plugins/images/big/img1.jpg')}}" class="img-responsive" />
    				</div>
    				<div class="col-sm-9 slimtext">
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-3">
    					<ul class="list-event games">
    						<li class="csgo" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
    						<li class="lol" data-toggle="tooltip" title="League of Legends"></li>
    						<li class="dota" data-toggle="tooltip" title="Dota 2"></li>
    						<li class="mortal-kombat" data-toggle="tooltip" title="Mortal Kombat X"></li>
                            <li class="csgo none" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
                            <li class="lol none" data-toggle="tooltip" title="League of Legends"></li>
                            <li class="dota none" data-toggle="tooltip" title="Dota 2"></li>
                            <li class="mortal-kombat none" data-toggle="tooltip" title="Mortal Kombat X"></li>                            
                            <li class="hearthstone none" data-toggle="tooltip" title="Hearthstone"></li>     
                            <li class="more" data-toggle="tooltip" title="Pokaż wszytkie tytuły"><a href="javascript:void(0)" id="more-3" class="le-games-more"><i class="ti-more-alt"></i></a></li>
    					</ul>
    				</div>
    				<div class="col-sm-9">
    					<a href="{{base_url('events/event')}}" class="btn btn-default btn-outline">Zobacz więcej</a>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<div class="white-box" id="event-4">
    			<h3 class="box-title"><a href="{{base_url('events/event')}}">ProVirtual ESPORT Championship 2017</a><span class="pull-right">23/10/2017</span></h3>
    			<div class="row">
    				<div class="col-sm-3">
    					<img src="{{base_url('public/plugins/images/big/img1.jpg')}}" class="img-responsive" />
    				</div>
    				<div class="col-sm-9 slimtext">
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-3">
    					<ul class="list-event games">
    						<li class="csgo" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
    						<li class="lol" data-toggle="tooltip" title="League of Legends"></li>
    						<li class="dota" data-toggle="tooltip" title="Dota 2"></li>
    						<li class="mortal-kombat" data-toggle="tooltip" title="Mortal Kombat X"></li>
                            <li class="csgo none" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
                            <li class="lol none" data-toggle="tooltip" title="League of Legends"></li>
                            <li class="dota none" data-toggle="tooltip" title="Dota 2"></li>
                            <li class="mortal-kombat none" data-toggle="tooltip" title="Mortal Kombat X"></li>                            
                            <li class="hearthstone none" data-toggle="tooltip" title="Hearthstone"></li>     
                            <li class="more" data-toggle="tooltip" title="Pokaż wszytkie tytuły"><a href="javascript:void(0)" id="more-4" class="le-games-more"><i class="ti-more-alt"></i></a></li>
    					</ul>
    				</div>
    				<div class="col-sm-9">
    					<a href="{{base_url('events/event')}}" class="btn btn-default btn-outline">Zobacz więcej</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- .row -->
    <div class="row">
    	<div class="col-md-6">
    		<div class="white-box" id="event-5">
    			<h3 class="box-title"><a href="{{base_url('events/event')}}">RUSH TOURNAMENT ZDZ KATOWICE</a><span class="pull-right">23/10/2017</span></h3>
    			<div class="row">
    				<div class="col-sm-3">
    					<img src="{{base_url('public/plugins/images/big/img1.jpg')}}" class="img-responsive" />
    				</div>
    				<div class="col-sm-9 slimtext">
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-3">
    					<ul class="list-event games">
    						<li class="csgo" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
    						<li class="lol" data-toggle="tooltip" title="League of Legends"></li>
    						<li class="dota" data-toggle="tooltip" title="Dota 2"></li>
    						<li class="mortal-kombat" data-toggle="tooltip" title="Mortal Kombat X"></li>
                            <li class="csgo none" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
                            <li class="lol none" data-toggle="tooltip" title="League of Legends"></li>
                            <li class="dota none" data-toggle="tooltip" title="Dota 2"></li>
                            <li class="mortal-kombat none" data-toggle="tooltip" title="Mortal Kombat X"></li>                            
                            <li class="hearthstone none" data-toggle="tooltip" title="Hearthstone"></li>     
                            <li class="more" data-toggle="tooltip" title="Pokaż wszytkie tytuły"><a href="javascript:void(0)" id="more-5" class="le-games-more"><i class="ti-more-alt"></i></a></li>
    					</ul>
    				</div>
    				<div class="col-sm-9">
    					<a href="{{base_url('events/event')}}" class="btn btn-default btn-outline">Zobacz więcej</a>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="col-md-6">
    		<div class="white-box" id="event-6">
    			<h3 class="box-title"><a href="{{base_url('events/event')}}">ProVirtual ESPORT Championship 2017</a><span class="pull-right">23/10/2017</span></h3>
    			<div class="row">
    				<div class="col-sm-3">
    					<img src="{{base_url('public/plugins/images/big/img1.jpg')}}" class="img-responsive" />
    				</div>
    				<div class="col-sm-9 slimtext">
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    					<p>Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat.</p>
    					<p>Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-sm-3">
    					<ul class="list-event games">
    						<li class="csgo" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
    						<li class="lol" data-toggle="tooltip" title="League of Legends"></li>
    						<li class="dota" data-toggle="tooltip" title="Dota 2"></li>
    						<li class="mortal-kombat" data-toggle="tooltip" title="Mortal Kombat X"></li>
                            <li class="csgo none" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
                            <li class="lol none" data-toggle="tooltip" title="League of Legends"></li>
                            <li class="dota none" data-toggle="tooltip" title="Dota 2"></li>
                            <li class="mortal-kombat none" data-toggle="tooltip" title="Mortal Kombat X"></li>                            
                            <li class="hearthstone none" data-toggle="tooltip" title="Hearthstone"></li>     
                            <li class="more" data-toggle="tooltip" title="Pokaż wszytkie tytuły"><a href="javascript:void(0)" id="more-6" class="le-games-more"><i class="ti-more-alt"></i></a></li>
    					</ul>
    				</div>
    				<div class="col-sm-9">
    					<a href="{{base_url('events/event')}}" class="btn btn-default btn-outline">Zobacz więcej</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- /.Row -->
    <div class="row">
    	<ul class="pager">
    		<li class="previous">
    			<a href="">← Nowsze</a>
    		</li>
    		<li>
    			<a href="">1</a>
    		</li>
    		<li class="active">
    			<a href="">2</a>
    		</li>
    		<li>
    			<a href="">3</a>
    		</li>
    		<li>
    			<a>...</a>
    		</li>

    		<li>
    			<a href="">15</a>
    		</li>
    		<li class="next">
    			<a href="">Starsze →</a>
    		</li>
    	</ul>
	</div>
    <!-- /.Row -->
    @endsection