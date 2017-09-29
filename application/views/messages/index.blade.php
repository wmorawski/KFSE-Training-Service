@layout('layouts/main')
@section('title') KFSE :: Wiadomości @endsection
@section('headcss')
    @endsection

@section('bscript')
    <script src="{{base_url('public/js/chat.js')}}"></script>
    @endsection
@section('content')
	<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Wiadomości</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li class="active">Wiadomości</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->
    <div class="chat-main-box">
        <!-- .chat-left-panel -->
        <div class="chat-left-aside">
            <div class="open-panel"><i class="ti-angle-right"></i></div>
            <div class="chat-left-inner">
                <div class="form-material">
                    <input class="form-control p-20" type="text" placeholder="Znajdź kontakt">
                </div>
                <ul class="chatonline style-none ">
                </ul>
            </div>
        </div>
        <!-- .chat-left-panel -->
        <!-- .chat-right-panel -->
        <div class="chat-right-aside">
            <div class="chat-main-header">
                <div class="p-20 b-b">
                    <h3 class="box-title">Chat Message</h3>
                </div>
            </div>
            <div class="chat-box">
                <div class="alert alert-warning">Przepraszamy, nad tą funkcją jeszcze pracujemy.</div>
            </div>
        </div>
        <!-- .chat-right-panel -->
    </div>
    <!-- /.chat-row -->
    @endsection