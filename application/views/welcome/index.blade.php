@layout('layouts/main')
@section('title') KFSE :: Strona Główna @endsection
@section('content')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Starter Page</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li class="active"><a href="#">Strona domowa</a></li>

            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Blank Starter page</h3>

                <h5 class="box-title">Dane sesji</h5>
                {{$this->router->class}}
                <pre class="prettyprint">
                    {{print_r(json_encode($this->session->userdata(), JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES), true)}}
                </pre>
            </div>

        </div>
    </div>
    <!-- .row -->
@endsection