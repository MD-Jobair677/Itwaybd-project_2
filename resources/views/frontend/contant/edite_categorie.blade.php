@extends('frontend.layout.applayout')

@section('content')

<div class="container">

<div class="row">

<div class="col-md-6">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
<div class="card mt-4">
<div class="card-header">
<h1>Edite Categorie</h1>
<div class="card-title">

<form action="{{route('categorie.Update',$Categorie->id)}}" method="POST">

@csrf
@method('put')
<input class="form-control form-control-lg mt-2" type="text" value="{{ $Categorie->name  }}" name="categorie_name" placeholder="Enter Categorie" aria-label=".form-control-lg example">
@error('categorie_name')

<div class="alert alert-danger mt-2">{{$message}}</div>
    
@enderror


   <button type="submit" class="btn btn-primary mt-2"> Update</button> 
   

</form>


</div>


</div>



</div>
</div>

</div>


</div>

@endsection