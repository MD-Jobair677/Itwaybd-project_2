@extends('frontend.layout.applayout')

@section('content')
{{-- @dd($editecategory); --}}


<div class="container">
    <div class="row">
        <div class="col-8">
            <table class="table border mt-2 p-4">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>

               @foreach ($allCategories as $key=>$allCategorie)
               <tr>
                    <td>{{$allCategories->firstItem()+$key}} </td>
                    <td>{{$allCategorie->name}}</td>
                    <td>
                        <a href="{{Route('categorie.edite',$allCategorie->id)}}"><button class="btn btn-primary">Edite</button> </a>

                        <a href="#" class="btn btn-danger dltbtn">Delete</a>
                         <form action="{{ Route('categorie.delete',$allCategorie->id)}}" method="post"> 
                            @csrf
                            @method('DELETE')
                        </form>

                    </td>

                </tr>
                    
                @endforeach
              
               
               

                  
            </table>
            <div>
                {{ $allCategories ->links() }}
            </div>

        </div>
      
    </div>
</div>





@endsection


@push('sweetalert')
{{-- sweet alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function(){
        $('.dltbtn').click(function(e){
            e.preventDefault();
            
  Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {

    $(this).next('form').submit().prev
    
  }
});

        })
    })

</script>

   

    
@endpush

{{-- Swal.fire({
    title: "Deleted!",
    text: "Your file has been deleted.",
    icon: "success"
  }); --}}