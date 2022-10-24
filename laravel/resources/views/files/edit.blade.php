<form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
       <label for="upload">File:</label>
       <input type="file" class="form-control" name="upload"/>
   </div>
   <button type="submit" class="btn btn-primary">Edit</button>
   <a class="btn btn-primary" href="{{ route('files.index') }}" role="button">Cancel</a>
</form>