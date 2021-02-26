@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">

   <a href="{{route('categories.create')}}" class="btn btn-success">Add Categories</a>
</div>
<div class="card card-default">
   <div class="card-header">Categories</div>

   <div class="card-body">
      @if($categories->count() > 0)
      <table class="table">
         <thead>
            <th>Name</th>
            <th>Posts count</th>
            <th></th>
         </thead>
         <tbody>

            @foreach($categories as $category)
            <tr>
               <td>
                  {{$category->name}}
               </td>
               <td>{{$category->posts->count()}}</td>
               <td class="row">
                  <a href="{{route('categories.edit', $category->id)}}" class="btn btn-info btn-sm mr-2">Edit</a>

                  <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                     @csrf
                     @method("DELETE")
                     <button class="btn btn-danger btn-sm">
                        Delete
                     </button>
                  </form>

                  <!-- <a href="{{route('categories.destroy', $category->id)}}" class="btn btn-danger btn-sm">Delete</a> -->
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>

      @else
      <h3 class="text-center">No Categories Yet</h3>
      @endif


      <!-- Modal -->
      <!-- <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  ...
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> -->



      @endsection


      <!-- @section('scripts')
<script>
function handleDelete(params) {
   console.log('Deleting')
}
</script>

@endsection -->