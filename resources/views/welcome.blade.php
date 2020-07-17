@extends('layouts.app')
@section('style')
    <style>
        body {
            background-color: aliceblue;
        }
    </style>
@endsection
@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">



        <div class="col-6 row " style="float: right;width: 50%;">
            <div class="col-12">
                <div class="card" id="Annonces">
                    <div class="card-header light-blue darken-3 white-text"> Mes Annonces</div>
                    <div class="card-body">
                        <div class="row">
                        @foreach ($annonces as $item)
                            <!-- one item -->
                                <div class="col col-sm-12 col-md-6 col-12 ">
                                    <div class="card">


                                        <ul class="collection card-content">

                                            <li class="collection-item"><div>Adresse<a href="#!" class="secondary-content">{{$item->address}}</a></div></li>
                                            <li class="collection-item"><div>Details<a href="#!" class="secondary-content">{{$item->details}}</a></div></li>
                                            <li class="collection-item"><div>Prix<a href="#!" class="secondary-content">{{$item->prix}} DH</a></div></li>
                                            <li class="collection-item"><div>Superfice<a href="#!" class="secondary-content">{{$item->superfice}} m²</a></div></li>
                                            <li class="collection-item"><div>Capacité<a href="#!" class="secondary-content">{{$item->capacity}} Pers</a></div></li>
                                            <li class="collection-item"><div>rate<a href="#!" class="secondary-content">{{$item->rate}} &#9733;</a></div></li>

                                        </ul>

                                        <div class="card-action blue-grey lighten-4 d-flex">
                                            <a  class="black-text" href="{{route('showAnnonce',$item->id)}}" class="waves-effect waves-light">
                                                <i class="fa fa-reply" aria-hidden="true"></i>voir plus</a>
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
        <div class="col-6 row ">
            <div class="col-12">
                <div class="card" id="Demmandes">
                    <div class="card-header light-blue darken-3 white-text"> Liste des Demandes</div>
                    <div class="card-body">

                        <div class="row">
                        @foreach ($demandes as $item)
                            <!-- one item -->
                                <div class="col col-sm-12 col-md-6">
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
                                        <div class="card-action blue-grey lighten-4 d-flex">
                                            <a class="black-text" href="{{route('showDemmande',$item->id)}}" >
                                                <i class="fa fa-reply" aria-hidden="true"></i>voir plus</a>

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
