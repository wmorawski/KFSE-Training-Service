@layout('layouts/main')
@section('title') KFSE :: Przyjaciele @endsection

@section('headcss')
    <!-- Footable CSS -->
    <link href="{{base_url('public/plugins/bower_components/footable/css/footable.core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{base_url('public/plugins/bower_components/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    @endsection

@section('bscript')
    <!-- Footable -->
    <script src="{{base_url('public/plugins/bower_components/footable/js/footable.all.min.js')}}"></script>
    <script src="{{base_url('public/plugins/bower_components/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="{{base_url('public/js/footable-init.js')}}"></script>
    <script src="{{base_url('public/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    @endsection

@section('content')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Przyjaciele</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li class="active"><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li class="active"><a href="{{base_url('usersss')}}">{{$this->user->getUsername()}}</a></li>
                <li>Przyjaciele</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-md-12">
            <div class="white-box p-0">
                <!-- .left-right-aside-column-->
                <div class="page-aside">
                    <!-- .left-aside-column-->
                    <div class="left-aside">
                        <div class="scrollable">
                            <ul class="list-style-none">
                                <li class="box-label"><a href="javascript:void(0)">Wszystkich <span>123</span></a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)">Rodzina <span>103</span></a></li>
                                <li><a href="javascript:void(0)">Trenerzy <span>19</span></a></li>
                                <li><a href="javascript:void(0)">Znajomi <span>623</span></a></li>
                                <li><a href="javascript:void(0)">Inne <span>53</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.left-aside-column-->
                    <div class="right-aside">
                        <div class="right-page-header">
                            <div class="pull-right">
                                <input type="text" id="demo-input-search2" placeholder="Znajdź znajomego" class="form-control">
                            </div>
                            <h3>Lista znajomych</h3>
                        </div>
                        <div class="clearfix"></div>
                        <div class="scrollable">
                            <div class="table-responsive">
                                <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                    <thead>
                                        <tr>
                                            <th>Lp</th>
                                            <th>Imię i nazwisko</th>
                                            <th>Rola</th>
                                            <th>Wiek</th>
                                            <th>Akcja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <a href="contact-detail.html">
                                                    <img src="{{base_url('public/plugins/images/users/genu.jpg')}}" alt="user" class="img-circle" />
                                                    Genelia Deshmukh
                                                </a>
                                            </td>
                                            <td><span class="label label-danger">Designer</span> </td>
                                            <td>23</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Edytuj"><i class="ti-pencil-alt" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Usuń"><i class="ti-close" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-contact">Dodaj znajomego</button>
                                            </td>
                                            <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h4 class="modal-title" id="myModalLabel">Add New Contact</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <from class="form-horizontal form-material">
                                                                <div class="form-group">
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Type name">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Email">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Phone">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Designation">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Age">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Date of joining">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <input type="text" class="form-control" placeholder="Salary">
                                                                    </div>
                                                                    <div class="col-md-12 m-b-20">
                                                                        <div class="fileupload btn btn-danger btn-rounded waves-effect waves-light">
                                                                            <span><i class="ion-upload m-r-5"></i>Upload Contact Image</span>
                                                                            <input type="file" class="upload">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </from>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <td colspan="7">
                                                <div class="text-right">
                                                    <ul class="pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- .left-aside-column-->
                </div>
                <!-- /.left-right-aside-column-->
            </div>
        </div>
    </div>
    <!-- /.row -->
    @endsection