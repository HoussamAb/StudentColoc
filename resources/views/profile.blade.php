@extends('layouts.app')
@section('style')
<style>
    body{
        background-color: aliceblue;
    }
    </style>


@endsection
@section('content')

<div class="container ">
<div class="row">
    <div class="col-8 s8 p-6">
      <div class="card">
        <div class="card-content">
            <h3>Profile</h3>
        <form method="POST" action="{{route('saveprofile')}}">
            @csrf
        <p>Email : {{Auth::user()->email}}</p>
            <div class="form-row">
                <div class="form-group mb-3 col-md-5">
                  <label for="inputAddress">username</label>
                  <input type="text" class="form-control" name="username" id="inputAddress" placeholder="cordonnees" value="{{Auth::user()->username}}">
                </div>
                <div class="form-group mb-3 col-md-5">
                  <label for="commentaire">&#9742; Telephone</label>
                  <input type="text" class="form-control" name="telephone" id="inputAddress" placeholder="commentaire" value="{{Auth::user()->telephone}}">
                </div>
              </div>
              <button class="btn blue">Enregistrer</button>
            </form>


        </div>
    </div>
</div>
</div>
</div>



@endsection

@section('script')

@endsection
