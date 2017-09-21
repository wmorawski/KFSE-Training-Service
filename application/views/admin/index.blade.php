@layout('layouts/admin')
@section('title') Dashboard - KFSE Training Service @endsection
@section('content')
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard 3</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            <a href="#" target="" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
            <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li class="active">Dashboard 3</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- Other sales widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">NEW CLIENTS</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-people text-info"></i></li>
                    <li class="text-right"><span class="counter">23</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">NEW Projects</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-folder text-purple"></i></li>
                    <li class="text-right"><span class="counter">169</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Open Projects</h3>
                <ul class="list-inline two-part">
                    <li><i class="icon-folder-alt text-danger"></i></li>
                    <li class="text-right"><span class="">311</span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">NEW Invoices</h3>
                <ul class="list-inline two-part">
                    <li><i class="ti-wallet text-success"></i></li>
                    <li class="text-right"><span class="">117</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Extra-component -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <div class="white-box">
                <h3 class="box-title">Country visit</h3>
                <div id="usa" style="height: 365px"></div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="white-box">
                <h3 class="box-title">Visit from the countries</h3>
                <ul class="country-state  p-t-20">
                    <li>
                        <h2>6350</h2> <small>From India</small>
                        <div class="pull-right">48% <i class="fa fa-level-up text-success"></i></div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                        </div>
                    </li>
                    <li>
                        <h2>3250</h2> <small>From UAE</small>
                        <div class="pull-right">98% <i class="fa fa-level-up text-success"></i></div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:98%;"> <span class="sr-only">98% Complete</span></div>
                        </div>
                    </li>
                    <li>
                        <h2>1250</h2> <small>From Australia</small>
                        <div class="pull-right">75% <i class="fa fa-level-down text-danger"></i></div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                        </div>
                    </li>
                    <li>
                        <h2>1350</h2> <small>From USA</small>
                        <div class="pull-right">48% <i class="fa fa-level-up text-success"></i></div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="white-box">
                <h3 class="box-title"><small class="pull-right m-t-10 text-success"><i class="fa fa-sort-asc"></i> 18% High then last month</small> Monthly Site Traffic</h3>
                <div class="stats-row">
                    <div class="stat-item">
                        <h6>Overall Growth</h6> <b>80.40%</b></div>
                    <div class="stat-item">
                        <h6>Montly</h6> <b>15.40%</b></div>
                    <div class="stat-item">
                        <h6>Day</h6> <b>5.50%</b></div>
                </div>
                <div id="sparkline8"></div>
            </div>
            <div class="white-box">
                <h3 class="box-title"><small class="pull-right m-t-10 text-danger"><i class="fa fa-sort-desc"></i> 18% High then last month</small>Weekly Site Traffic</h3>
                <div class="stats-row">
                    <div class="stat-item">
                        <h6>Overall Growth</h6> <b>80.40%</b></div>
                    <div class="stat-item">
                        <h6>Montly</h6> <b>15.40%</b></div>
                    <div class="stat-item">
                        <h6>Day</h6> <b>5.50%</b></div>
                </div>
                <div id="sparkline9"></div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- city-weather -->
    <!-- ============================================================== -->
    <div class="row">

        <div class="col-md-12 col-lg-5">
            <div class="weather-with-bg">
                <div class="wt-top">
                    <div class="wt-img" style="background-image: url(../plugins/images/weather-bg.jpg);">
                        <ul class="side-icon-text">
                            <li><span class="di vm"><i class="wi wi-day-sunny"></i></span><span class="di vm"><h1 class="m-b-0">25<sup>o</sup></h1><h4>Mostly Sunny</h4></span></li>
                        </ul>
                        <div class="wt-city-text">
                            <h1>New Delhi, India</h1>
                            <h4>Friday, 19 Jan 2017</h4> </div>
                    </div>
                </div>
                <div class="white-box">
                    <h2>February</h2>
                    <ul class="wt-counter list-unstyled">
                        <li><a href="JavaScript:void(0)">1</a></li>
                        <li><a href="JavaScript:void(0)">2</a></li>
                        <li><a href="JavaScript:void(0)">3</a></li>
                        <li><a href="JavaScript:void(0)">4</a></li>
                        <li><a href="JavaScript:void(0)">5</a></li>
                        <li><a href="JavaScript:void(0)">6</a></li>
                        <li><a href="JavaScript:void(0)">7</a></li>
                        <li><a href="JavaScript:void(0)">8</a></li>
                        <li><a href="JavaScript:void(0)">9</a></li>
                        <li><a href="JavaScript:void(0)">10</a></li>
                        <li><a href="JavaScript:void(0)">11</a></li>
                        <li><a href="JavaScript:void(0)">12</a></li>
                        <li><a href="JavaScript:void(0)">13</a></li>
                        <li><a href="JavaScript:void(0)">14</a></li>
                        <li><a href="JavaScript:void(0)">15</a></li>
                        <li><a href="JavaScript:void(0)">16</a></li>
                        <li><a href="JavaScript:void(0)">17</a></li>
                        <li><a href="JavaScript:void(0)">18</a></li>
                        <li class="active"><a href="JavaScript:void(0)">19</a></li>
                        <li><a href="JavaScript:void(0)">20</a></li>
                        <li><a href="JavaScript:void(0)">21</a></li>
                        <li><a href="JavaScript:void(0)">22</a></li>
                        <li><a href="JavaScript:void(0)">23</a></li>
                        <li><a href="JavaScript:void(0)">24</a></li>
                        <li><a href="JavaScript:void(0)">25</a></li>
                        <li><a href="JavaScript:void(0)">26</a></li>
                        <li><a href="JavaScript:void(0)">27</a></li>
                        <li><a href="JavaScript:void(0)">28</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-7">
            <div class="white-box bg-theme m-b-0">
                <div class="city-weather-widget">
                    <h1>Kufri, Himachal Pradesh</h1>
                    <h4>Friday, 19 Jan 2017</h4>
                    <div class="row p-t-30">
                        <div class="col-sm-6">
                            <ul class="side-icon-text">
                                <li><span class="di vm"><i class="wi wi-day-hail"></i></span><span class="di vm"><h1 class="m-b-0">23<sup>o</sup></h1><h5 class="m-t-0">Mostly Sunny</h5></span></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-icons pull-right text-white">
                                <li><i class="wi wi-day-sunny m-r-5"></i>Humidity 38%</li>
                                <li><i class=" wi wi-day-windy m-r-5"></i>Wind 38%</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div id="ct-city-wth"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel">
                <div class="row">
                    <ul class="list-unstyled city-weather-days">
                        <li class="col-xs-4 col-sm-2"><span>Tue</span><i class="wi wi-day-sunny"></i><span>32<sup>°F</sup></span></li>
                        <li class="col-xs-4 col-sm-2"><span>Wed</span><i class="wi wi-day-cloudy"></i><span>34<sup>°F</sup></span></li>
                        <li class="col-xs-4 col-sm-2"><span>Thu</span><i class="wi wi-day-hail"></i><span>35<sup>°F</sup></span></li>
                        <li class="col-xs-4 col-sm-2 active"><span>Fri</span><i class="wi wi-day-sprinkle"></i><span>34<sup>°F</sup></span></li>
                        <li class="col-xs-4 col-sm-2"><span>Sat</span><i class="wi wi-day-snow"></i><span>30<sup>°F</sup></span></li>
                        <li class="col-xs-4 col-sm-2"><span>Sun</span><i class="wi wi-day-sunny"></i><span>26<sup>°F</sup></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Daily Sales</h3>
                        <div class="text-right"> <span class="text-muted">Todays Income</span>
                            <h1><sup><i class="ti-arrow-up text-success"></i></sup> $12,000</h1> </div> <span class="text-success">20%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">20% Complete</span> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Weekly Sales</h3>
                        <div class="text-right"> <span class="text-muted">Weekly Income</span>
                            <h1><sup><i class="ti-arrow-down text-danger"></i></sup> $5,000</h1> </div> <span class="text-danger">30%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Monthly Sales</h3>
                        <div class="text-right"> <span class="text-muted">Monthly Income</span>
                            <h1><sup><i class="ti-arrow-up text-info"></i></sup> $10,000</h1> </div> <span class="text-info">60%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="white-box">
                        <h3 class="box-title">Yearly Sales</h3>
                        <div class="text-right"> <span class="text-muted">Yearly Income</span>
                            <h1><sup><i class="ti-arrow-up text-inverse"></i></sup> $9,000</h1> </div> <span class="text-inverse">80%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-xs-12">
            <div class="news-slide m-b-30 dashboard-slide">
                <div class="vcarousel slide" >
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <div class="overlaybg"><img src="../plugins/images/heading-bg/slide6.jpg" /></div>
                            <div class="news-content"><span class="label label-danger label-rounded">Primary</span>
                                <h2>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2> <a href="#">Read More</a></div>
                        </div>
                        <div class="item">
                            <div class="overlaybg"><img src="../plugins/images/heading-bg/slide4.jpg" /></div>
                            <div class="news-content"><span class="label label-primary label-rounded">Primary</span>
                                <h2>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2> <a href="#">Read More</a></div>
                        </div>
                        <div class="item">
                            <div class="overlaybg"><img src="../plugins/images/heading-bg/slide6.jpg" /></div>
                            <div class="news-content"><span class="label label-success label-rounded">Primary</span>
                                <h2>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2> <a href="#">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Demo table -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">MANAGE USERS</div>
                <div class="table-responsive">
                    <table class="table table-hover manage-u-table">
                        <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            <th>NAME</th>
                            <th>OCCUPATION</th>
                            <th>EMAIL</th>
                            <th>ADDED</th>
                            <th width="250">CATEGORY</th>
                            <th width="300">MANAGE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td><span class="font-medium">Daniel Kristeen</span>
                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                            <td>Visual Designer
                                <br/><span class="text-muted">Past : teacher</span></td>
                            <td>daniel@website.com
                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                            <td>15 Mar 1988
                                <br/><span class="text-muted">10: 55 AM</span></td>
                            <td>
                                <select class="form-control">
                                    <option>Modulator</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td><span class="font-medium">Daniel Kristeen</span>
                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                            <td>Visual Designer
                                <br/><span class="text-muted">Past : teacher</span></td>
                            <td>daniel@website.com
                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                            <td>15 Mar 1988
                                <br/><span class="text-muted">10: 55 AM</span></td>
                            <td>
                                <select class="form-control">
                                    <option>Modulator</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td><span class="font-medium">Daniel Kristeen</span>
                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                            <td>Visual Designer
                                <br/><span class="text-muted">Past : teacher</span></td>
                            <td>daniel@website.com
                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                            <td>15 Mar 1988
                                <br/><span class="text-muted">10: 55 AM</span></td>
                            <td>
                                <select class="form-control">
                                    <option>Modulator</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td><span class="font-medium">Daniel Kristeen</span>
                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                            <td>Visual Designer
                                <br/><span class="text-muted">Past : teacher</span></td>
                            <td>daniel@website.com
                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                            <td>15 Mar 1988
                                <br/><span class="text-muted">10: 55 AM</span></td>
                            <td>
                                <select class="form-control">
                                    <option>Modulator</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td><span class="font-medium">Daniel Kristeen</span>
                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                            <td>Visual Designer
                                <br/><span class="text-muted">Past : teacher</span></td>
                            <td>daniel@website.com
                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                            <td>15 Mar 1988
                                <br/><span class="text-muted">10: 55 AM</span></td>
                            <td>
                                <select class="form-control">
                                    <option>Modulator</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td><span class="font-medium">Daniel Kristeen</span>
                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                            <td>Visual Designer
                                <br/><span class="text-muted">Past : teacher</span></td>
                            <td>daniel@website.com
                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                            <td>15 Mar 1988
                                <br/><span class="text-muted">10: 55 AM</span></td>
                            <td>
                                <select class="form-control">
                                    <option>Modulator</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td><span class="font-medium">Daniel Kristeen</span>
                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                            <td>Visual Designer
                                <br/><span class="text-muted">Past : teacher</span></td>
                            <td>daniel@website.com
                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                            <td>15 Mar 1988
                                <br/><span class="text-muted">10: 55 AM</span></td>
                            <td>
                                <select class="form-control">
                                    <option>Modulator</option>
                                    <option>Admin</option>
                                    <option>User</option>
                                    <option>Subscriber</option>
                                </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="icon-trash"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                    <li><a href="javascript:void(0)" theme="blue" class="blue-theme">4</a></li>
                    <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                    <li><b>With Dark sidebar</b></li>
                    <br/>
                    <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                    <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme working">10</a></li>
                    <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                </ul>
                <ul class="m-t-20 all-demos">
                    <li><b>Choose other demos</b></li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->

@endsection