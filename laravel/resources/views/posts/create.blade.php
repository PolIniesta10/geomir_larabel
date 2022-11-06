<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
       <label for="upload">Body:</label>
       <br>
       <textarea name="body" rows="4" cols="50"></textarea>
       <br>
       <label for="upload">Latitude:</label>
       <input type="text" class="form-control" name="latitude"/>
       <br>
       <label for="upload">Longitude:</label>
       <input type="text" class="form-control" name="longitude"/>
       <br>
       <label for="upload">Post:</label>
       <input type="file" class="form-control" name="upload"/>
   </div>
   <button type="submit" class="btn btn-primary">Create</button>
   <button type="reset" class="btn btn-secondary">Reset</button>
</form>