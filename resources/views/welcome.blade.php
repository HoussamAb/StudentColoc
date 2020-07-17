@extends('layouts.app')
@section('style')
    <style>
        body {
            background-color: aliceblue;
        }
    </style>
@endsection
@section('content')
    <nav class="nav-extended orange mb-5">
        <div class="nav-content">
            <div class="container">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a class="active" href="#Annonces"> Annonces</a></li>
                    <li class="tab"><a class="active" href="#Demmandes"> Demandes</a></li>

                </ul>
            </div>

        </div>
    </nav>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">



        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card" id="Annonces">
                    <div class="card-header grey darken-3 white-text"> Mes Annonces</div>
                    <div class="card-body">
                        <div class="row">
                        @foreach ($annonces as $item)
                            <!-- one item -->
                                <div class="col col-sm-12 col-md-4 col-12 ">
                                    <div class="card">
                                        <div class="card-image">

                                            @if(empty($item->images1) && empty($item->images2) && empty($item->images2))
                                                <img src="https://www.allianceplast.com/wp-content/uploads/2017/11/no-image.png" height="190px">
                                            @else
                                                @if(!empty($item->images1))
                                                    <img src="{{asset("importedImages/".$item->images1)}}" height="190px">
                                                @else
                                                    @if(!empty($item->images2))
                                                        <img src="{{asset("importedImages/".$item->images2)}}" height="190px">
                                                    @else

                                                        <img src="{{asset("importedImages/".$item->images3)}}" height="190px">



                                                    @endif
                                                @endif
                                            @endif


                                        </div>


                                        <ul class="collection card-content">

                                            <li class="collection-item"><div>Adresse<a href="#!" class="secondary-content">{{$item->address}}</a></div></li>
                                            <li class="collection-item"><div>Details<a href="#!" class="secondary-content">{{$item->details}}</a></div></li>
                                            <li class="collection-item"><div>Prix<a href="#!" class="secondary-content">{{$item->prix}} DH</a></div></li>
                                            <li class="collection-item"><div>Superfice<a href="#!" class="secondary-content">{{$item->superfice}} m²</a></div></li>
                                            <li class="collection-item"><div>Capacité<a href="#!" class="secondary-content">{{$item->capacity}} Personne</a></div></li>

                                        </ul>

                                        <div class="card-action d-flex">
                                            <a href="{{route('showAnnonce',$item->id)}}" class="waves-effect waves-light"><i
                                                    class="material-icons blue-text" >remove_red_eye</i></a>


                                        </div>
                                    </div>
                                </div>
                                <!-- one item -->
                            @endforeach


                        </div>


                    </div>
                </div>
            </div>
        </div>



        <hr>

        <!-- demmandes -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card" id="Demmandes">
                    <div class="card-header grey darken-3 white-text"> Liste des Demandes</div>
                    <div class="card-body">

                        <div class="row">
                        @foreach ($demandes as $item)
                            <!-- one item -->
                                <div class="col col-sm-12 col-md-4">
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-title">{{$item->user()->name}}</div>
                                            <p>
                                                {{$item->commentaire}}
                                            </p>
                                            <p class="grey-text">
                                                budget max :{{$item->bdgesmax}} dh/mois
                                            </p>
                                        </div>
                                        <div class="card-action grey lighten-4 d-flex">
                                            <a href="{{route('showDemmande',$item->id)}}" class="waves-effect waves-light"><i
                                                    class="material-icons blue-text" >remove_red_eye</i></a>


                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        <!-- one item -->


                        </div>


                    </div>
                </div>
            </div>
        </div>





    </div>
















@endsection

@section('script')

@endsection
