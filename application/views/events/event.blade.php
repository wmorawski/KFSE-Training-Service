@layout('layouts/main')
@section('title') KFSE :: Konkretne wydarzenie @endsection
@section('headcss')
    @endsection

@section('bscript')
    @endsection
@section('content')
	<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Konkretne wydarzenie</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">            	
                <li><a href="{{base_url()}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{base_url('events')}}">Wydarzenia</a></li>
                <li class="active">Konkretne wydarzenie</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    <!-- .row -->

    <div class="row">
        <div class="col-md-8">
            <div class="white-box">
                <h3 class="box-title">Informacje</h3>
                <p>Lorem Ipsum jest tekstem stosowanym jako przykładowy wypełniacz w przemyśle poligraficznym. Został po raz pierwszy użyty w XV w. przez nieznanego drukarza do wypełnienia tekstem próbnej książki. Pięć wieków później zaczął być używany przemyśle elektronicznym, pozostając praktycznie niezmienionym. Spopularyzował się w latach 60. XX w. wraz z publikacją arkuszy Letrasetu, zawierających fragmenty Lorem Ipsum, a ostatnio z zawierającym różne wersje Lorem Ipsum oprogramowaniem przeznaczonym do realizacji druków na komputerach osobistych, jak Aldus PageMaker</p>
                <h3>Skąd się to wzięło?</h3>
                <p>W przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock, wykładowca łaciny na uniwersytecie Hampden-Sydney w Virginii, przyjrzał się uważniej jednemu z najbardziej niejasnych słów w Lorem Ipsum – consectetur – i po wielu poszukiwaniach odnalazł niezaprzeczalne źródło: Lorem Ipsum pochodzi z fragmentów (1.10.32 i 1.10.33) „de Finibus Bonorum et Malorum”, czyli „O granicy dobra i zła”, napisanej właśnie w 45 p.n.e. przez Cycerona. Jest to bardzo popularna w czasach renesansu rozprawa na temat etyki. Pierwszy wiersz Lorem Ipsum, „Lorem ipsum dolor sit amet...” pochodzi właśnie z sekcji 1.10.32.</p>
                <p>Standardowy blok Lorem Ipsum, używany od XV wieku, jest odtworzony niżej dla zainteresowanych. Fragmenty 1.10.32 i 1.10.33 z „de Finibus Bonorum et Malorum” Cycerona, są odtworzone w dokładnej, oryginalnej formie, wraz z angielskimi tłumaczeniami H. Rackhama z 1914 roku.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="white-box">
                <h3 class="box-title">Gry</h3>
                <ul class="list-event games">
                    <li class="csgo" data-toggle="tooltip" title="Counter Strike Global Offensive"></li>
                    <li class="lol" data-toggle="tooltip" title="League of Legends"></li>
                    <li class="dota" data-toggle="tooltip" title="Dota 2"></li>
                    <li class="mortal-kombat" data-toggle="tooltip" title="Mortal Kombat X"></li>
                    <li class="hearthstone" data-toggle="tooltip" title="Hearthstone"></li>
                </ul>
            </div>
            <div class="white-box">
                <h3 class="box-title">Lokalizacja</h3>
            </div>
        </div>
    </div>
    <!-- .row -->
    
    @endsection