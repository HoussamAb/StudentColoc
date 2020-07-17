@extends('layouts.app',['script'=>false])
@section('style')
<style>
    body{
        background-color: aliceblue;    }
    </style>


@endsection
@section('content')

<div class="container ">
<div class="row">
    <div class="col s12 ">
      <div class="card">
        <div class="card-content">
        <span class="card-title">Annonce </span>
            <iframe
                width="100%"
                height="300"
                frameborder="0"

                marginheight="0"
                marginwidth="0"
                src="https://maps.google.com/maps?q={{$annonce->position}}&hl=en&z=14&amp;output=embed"
            >
            </iframe>
<ul class="collection" >
<li class="collection-item"><div>Adresse<a href="#!" class="secondary-content">{{$annonce->address}}</a></div></li>
<li class="collection-item"><div>Details<a href="#!" class="secondary-content">{{$annonce->details}}</a></div></li>
<li class="collection-item"><div>Prix<a href="#!" class="secondary-content">{{$annonce->prix}} DH</a></div></li>
<li class="collection-item"><div>Superfice<a href="#!" class="secondary-content">{{$annonce->superfice}} m²</a></div></li>
<li class="collection-item"><div>Capacité<a href="#!" class="secondary-content">{{$annonce->capacity}} Personne(s)</a></div></li>
<li class="collection-item"><div>rate<a href="#!" class="secondary-content">{{$annonce->rate}} &#9733;</a></div></li>
</ul>
<p><b>L'annonceure : </b></p>
 <ul class="collection">
  <li class="collection-item avatar">
    <i class="material-icons circle"></i>
    <span class="title">{{$annonce->user()->name}}</span>
    <p>{{$annonce->user()->email}} <br>
      {{$annonce->user()->telephone}}
    </p>

  </li></ul>
        </div>
    </div>
</div>
</div>
</div>



@endsection

@section('script')
    <script>
         $(document).ready(function(){
    $('.carousel').carousel();
  });
    </script>
@endsection
