@layout('layouts/main')
@section('title') KFSE :: Ustawienia konta @endsection

@section('headcss')
    <link href="{{base_url('public/plugins/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
    @endsection

@section('bscript')
    <script src="{{base_url('public/js/mask.js')}}"></script>
    <script src="{{base_url('public/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
    </script>
    @endsection

@section('content')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Ustawienia</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{base_url('usersss')}}">{{$this->user->getUsername()}}</a></li>
                <li class="active">Ustawienia</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-info">
    			<div class="panel-wrapper collapse in" aria-expanded="true">
    				<div class="panel-body">
    					<form action="#" class="form-horizontal">
    						<div class="form-body">
    							<h3 class="box-title">Bezpieczeństwo</h3>
    							<hr class="m-t-0 m-b-40">
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Login</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj login">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">E-mail</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj e-mail">
    										</div>
    									</div>
    								</div>
    							</div>
    							<!--/row-->
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Hasło</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj hasło">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Powtórz hasło</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Powtórz nowe hasło">
    										</div>
    									</div>
    								</div>
    							</div>
    							<!--/row-->
    							<h3 class="box-title">Informacje osobiste</h3>
    							<hr class="m-t-0 m-b-40">
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Imię</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj imię">
    										</div>
    									</div>
    								</div>
    								<!--/span-->
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Nazwisko</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj nazwisko">
    										</div>
    									</div>
    								</div>
    								<!--/span-->
    							</div>
    							<!--/row-->
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Płeć</label>
    										<div class="col-md-9">
    											<select class="form-control">
    												<option value="">Mężczyzna</option>
    												<option value="">Kobieta</option>
    											</select>
    											<span class="help-block">Wybierz swoją płeć</span>
    										</div>
    									</div>
    								</div>
    								<!--/span-->
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Data urodzenia</label>
    										<div class="col-md-9">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Podaj datę urodzenia" data-mask="9999-99-99">
                                                    <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                                </div>
    											<span class="help-block">Wprowadź datę urodzenia w formacie rrrr/mm/dd</span>
    										
                                            </div>
    									</div>
    								</div>
    								<!--/span-->
    							</div>
    							<!--/row-->    							
    							<h3 class="box-title">Adres</h3>
    							<hr class="m-t-0 m-b-40">
    							<!--/row-->
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Ulica/Miejscowość</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj nazwę ulicy lub miejscowość">
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Numer</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj numer domu lub bloku i mieszkania">
    										</div>
    									</div>
    								</div>
    							</div>
    							<div class="row">
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Kod pocztowy</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Podaj kod pocztowy formacie 99-999" data-mask="99-999">
    										</div>
    									</div>
    								</div>
    								<!--/span-->
    								<div class="col-md-6">
    									<div class="form-group">
    										<label class="control-label col-md-3">Miasto</label>
    										<div class="col-md-9">
    											<input type="text" class="form-control" placeholder="Wprowadź nazwę miasta">
    										</div>
    									</div>
    								</div>
    								<!--/span-->
    							</div>
    							<!--/row-->
                                <h3 class="box-title">Avatar i tło</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="white-box">                                            
                                            <input type="file" id="input-file-now-custom-3" class="dropify" data-height="150" data-default-file="{{$this->session->photo}}" accept="image/*"/>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tło profilu</label>
                                            <div class="col-md-9">
                                                <select class="form-control">
                                                    <option value="">Domyślny: KFSE</option>
                                                    <option value="">Counter-Strike: Global Offensive</option>
                                                    <option value="">League of Legends</option>
                                                </select>
                                                <span class="help-block">Wybierz tło Twojego profilu</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
    						</div>
    						<div class="form-actions">
    						 	<div class="row">
    						 		<div class="col-md-6">
    						 			<div class="row">
    						 				<div class="col-md-offset-3 col-md-9">
    						 					<button type="submit" class="btn btn-success">Zapisz zmiany</button>
    						 				</div>
    						 			</div>
    						 		</div>
    					 			<div class="col-md-6"></div>
    					 		</div>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- .row -->
    @endsection