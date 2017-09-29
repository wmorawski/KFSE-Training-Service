@layout('layouts/main')
@section('title') KFSE :: Mecze @endsection
@section('headcss')
    @endsection

@section('bscript')
    @endsection
@section('content')
	<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Mecze</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li class="active">Mecze</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->
    <div class="alert alert-warning">Przepraszamy, nad tą funkcją jeszcze pracujemy.</div>
    @endsection