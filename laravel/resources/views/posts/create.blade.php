<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
       <label for="upload">Post:</label>
       <input type="file" class="form-control" name="upload"/>
   </div>
   <button type="submit" class="btn btn-primary">Create</button>
   <button type="reset" class="btn btn-secondary">Reset</button>
</form>