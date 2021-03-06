@extends('layout.conquer')

@section('content')
<div class="container">
  <h2>List of Categories</h2>
  <p>Category Table</p>    
  
  @if(session("status"))
    <div class="note note-success">
      {{session('status')}}
    </div>
  @endif
  <div class="note note-success" id='pesan' style="display:none">

    </div>

  @if(session("error"))
    <div class="note note-danger">
      {{session('error')}}
    </div>
  @endif
  <table class="table">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>description</th>
        <th>
              <a  href="{{url('categoriesCreate')}}" class="btn btn-info" type="button ">+ Categories</a>
        </th>


      </tr>
    </thead>
  

          <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="modelContent">
                  <div style = "text-align:center">
                    <img src="{{asset('assets/img/loading.gif')}}">
                  </div>
                
              </div>
            </div>
          </div>




    <tbody>
        @foreach($data as $d)
        <tr id='tr_{{$d->id}}'>
            <td>{{$d->id}}</td>
            <td id="td_name_{{$d->id}}">{{$d->name}}</td>
            <td id="td_description_{{$d->id}}">{{$d->description}}</td>
            <td>
              <a href="{{url('categoriesEdit/'.$d->id)}}" class="btn btn-warning">Edit</a>

            </td>
       
            <td>
              @can('delete-permission')
              <form  method="POST" action="{{url('category/'.$d->id)}}">
                  @csrf;
                  @method("DELETE")
                  <input type="submit" value="Delete" class="btn btn-danger"
                  onclick=
                  "if(!confirm('Are you sure you want to delete {{$d->name}} ?')) 
                  {
                    return false;
                  }else{
                    if(!confirm('Are You really sure?')) 
                    {
                      return false;
                    }
                  }" />
                </form>
                @endcan
                <a class="btn btn-xs btn-danger"
                onclick="
                  if('Are you really sure?')
                  { 
                    deleteDataRemoveTR({{$d->id}})
                  }"
                >
                delete</a>
                


            </td>
            
 
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
@section('javascript')
<script>
function deleteDataRemoveTR(id){

$.ajax({
  type:'POST',
  url:'{{route("category.deleteData")}}',
  data:{'_token':'<?php echo csrf_token() ?>',
        'id':id
      },
  success: function(data){
    if(data.status == "ok"){
      alert(data.msg)
      $("#tr_"+id).remove();
     
    }
    else{
      alert(data.msg)
    }
  }

});

}

</script>
@endsection


