@layout('layouts/main')
@section('title') KFSE :: Kalendarz @endsection
@section('headcss')
    <!-- Calendar CSS -->
    <link href="{{base_url('public/plugins/bower_components/calendar/dist/fullcalendar.css')}}" rel="stylesheet" />
    @endsection

@section('bscript')
    <!-- Calendar JavaScript -->
    <script src="{{base_url('public/plugins/bower_components/calendar/jquery-ui.min.js')}}"></script>
    <script src="{{base_url('public/plugins/bower_components/moment/moment.js')}}"></script>
    <script src='{{base_url('public/plugins/bower_components/calendar/dist/fullcalendar.min.js')}}'></script>
    <script src="{{base_url('public/plugins/bower_components/calendar/dist/locale/pl.js')}}"></script>
    <script src="{{base_url('public/plugins/bower_components/calendar/dist/cal-init.js')}}"></script>
    @endsection
@section('content')
	<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Kalendarz</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li class="active">Kalendarz</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-md-3">
            <div class="white-box">
                <h3 class="box-title">Kategorie</h3>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="calendar-events" class="m-t-20">
                            <div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> Treningi Online</div>
                            <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> Zajęcia</div>
                            <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> Mecze</div>
                            <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> Turnieje</div>                            
                            <div class="calendar-events" data-class="bg-inverse"><i class="fa fa-circle text-warning"></i> Inne</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="white-box">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    @endsection