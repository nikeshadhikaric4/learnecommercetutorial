@extends('website.backend.layouts.main')
@section('content')
<div class="container">

     <div class="row">
       <div class="col-12 text-right">
         <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-post" onclick="addPost()">Add Post</a>
       </div>
    </div>
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <table  class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($image as $post)
                <tr id="row_{{$post->id}}">
                   <td>{{ $post->id  }}</td>
                   <td>{{ $post->img_title }}</td>
                   <td>{{ $post->image }}</td>
                   <td><a href="javascript:void(0)" data-id="{{ $post->id }}" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td>
                   <td>
                    <a href="javascript:void(0)" data-id="{{ $post->id }}" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
       </div>
    </div>
</div>



<div class="modal fade" id="post-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
              <form name="userForm" class="form-horizontal">
                 <input type="hidden" name="post_id" id="post_id">
                  <div class="form-group">
                      <label for="name" class="col-sm-2">title</label>
                      <div class="col-sm-12">
                          <input type="text" class="form-control" id="img_title" name="img_title" placeholder="Enter title">
                          <span id="titleError" class="alert-message"></span>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2">Image</label>
                      <div class="col-sm-12">
                          <input type="file" id="image" name="image">
                          <span id="descriptionError" class="alert-message"></span>
                      </div>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
          </div>
      </div>
    </div>
  </div>



<script>
    $('#laravel_crud').DataTable();

    function addPost() {
      $("#id").val('');
      $('#post-modal').modal('show');
    }

    function editPost(event) {
      var id  = $(event).data("id");
      let _url = `/dashboard/image/${id}`;

      $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            if(response) {
              $("#id").val(response.id);
              $("#title").val(response.title);
              $("#description").val(response.description);
              $('#post-modal').modal('show');
            }
        }
      });
    }

    function createPost() {
      var img_title = $('#img_title').val();
      var image = $('#image').val();
      var id = $('#id').val();

      let _url     = `/dashboard/image`;
      let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          url: _url,
          type: "POST",
          data: {
            id: id,
            img_title: img_title,
            image: image,
            _token: _token
          },
          success: function(response) {
              if(response.code == 200) {
                if(id != ""){
                  $("#row_"+id+" td:nth-child(2)").html(response.data.img_title);
                  $("#row_"+id+" td:nth-child(3)").html(response.data.image);
                } else {
                  $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.img_title+'</td><td>'+response.data.img_title+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
                }
                $('#img_title').val('');
                $('#image').val('');

                $('#post-modal').modal('hide');
              }
          },

        });
    }

    function deletePost(event) {
      var id  = $(event).data("id");
      let _url = `/dashboard/image/${id}`;
      let _token   = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          url: _url,
          type: 'DELETE',
          data: {
            _token: _token
          },
          success: function(response) {
            $("#row_"+id).remove();
          }
        });
    }

  </script>
@endsection

