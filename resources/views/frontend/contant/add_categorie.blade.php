@extends('frontend.layout.applayout')

@section('content')

<div class="container">

<div class="row">

<div class="col-md-6">

        @if (session('success'))
            <div class="success alert-success">
                {{ session('success') }}
            </div>
        @endif
<div class="card mt-4">
<div class="card-header">
<h1>Add Categorie</h1>
<div class="card-title">

<form action="{{route('categorie.store')}}" method="POST">

@csrf
@method('post')
<input class="form-control form-control-lg mt-2" type="text" value="{{ old('categorie_name')  }}" name="categorie_name" placeholder="Enter Categorie" aria-label=".form-control-lg example">
@error('categorie_name')

<div class="alert alert-danger mt-2">{{$message}}</div>
    
@enderror


   <button type="submit" class="btn btn-primary mt-2"> Add</button> 
   

</form>


</div>


</div>



</div>
</div>

</div>


</div>

@endsection