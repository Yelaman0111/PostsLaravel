@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">

   <a href="{{route('tags.create')}}" class="btn btn-success">Add tags</a>
</div>
<div class="card card-default">
   <div class="card-header">tags</div>

   <div class="card-body">
      @if($tags->count() > 0)
      <table class="table">
         <thead>
            <th>Name</th>
            <th>Posts count</th>
            <th></th>
         </thead>
         <tbody>

            @foreach($tags as $tag)
            <tr>
               <td>
                  {{$tag->name}}
               </td>
               <td>{{$tag->posts->count()}}</td>

               <td class="row">
                  <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info btn-sm mr-2">Edit</a>

                  <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                     @csrf
                     @method("DELETE")
                     <button class="btn btn-danger btn-sm">
                        Delete
                     </button>
                  </form>

                  <!-- <a href="{{route('tags.destroy', $tag->id)}}" class="btn btn-danger btn-sm">Delete</a> -->
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>

      @else
      <h3 class="text-center">No tags Yet</h3>
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