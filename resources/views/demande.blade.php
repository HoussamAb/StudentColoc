@extends('layouts.app')
@section('style')
<style>
    body{
        background-color: aliceblue;    }
    </style>


@endsection
@section('content')

<div class="container ">
<div class="row">
    <div class="col s9 p-5">
      <div class="card">
        <div class="card-content">
        <span class="card-title">{{$annonce->user()->name}} </span>
            <ul class="collection">
                <li class="collection-item avatar">
                    <i class="material-icons circle"></i>
                    <span class="title">{{$annonce->user()->name}}</span>
                    <p>{{$annonce->user()->email}} <br>
                        {{$annonce->user()->telephone}}
                    </p>

                </li>
            </ul>
        <h6>
            <b>Commentaire</b> : {{$annonce->commentaire}}
        </h6>

        <p>
            <b>Budget max</b> : {{$annonce->bdgesmax}} DH
        </p>


        </div>
    </div>
</div>
</div>
</div>



@endsection

@section('script')

@endsection
