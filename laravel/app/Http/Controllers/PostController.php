<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\File;
use App\Models\Visibility;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:posts.list')->only('index');
        $this->middleware('permission:posts.create')->only(['create','store']);
        $this->middleware('permission:posts.read')->only('show');
        $this->middleware('permission:posts.update')->only(['edit','update']);
        $this->middleware('permission:posts.delete')->only('destroy');
    }

    public function index(Post $post)
    {
       
        return view("posts.index", [
            "posts" => Post::all(),
            'file'   => $post->file,
            'author' => $post->user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view("posts.create");  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'body'      => 'required',
            'upload'    => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'  => 'required',
            'longitude' => 'required',
        ]);
        
        // Obtenir dades del formulari
        $body          = $request->get('body');
        $upload        = $request->file('upload');
        $latitude      = $request->get('latitude');
        $longitude     = $request->get('longitude');
        $visibility_id    = $request->get('visibility_id');
        
        // Desar fitxer al disc i inserir dades a BD
        $file = new File();
        $fileOk = $file->diskSave($upload);

        if ($fileOk) {
            // Desar dades a BD
            Log::debug("Saving post at DB...");
            $post = Post::create([
                'body'      => $body,
                'file_id'   => $file->id,
                'latitude'  => $latitude,
                'longitude' => $longitude,
                'author_id' => auth()->user()->id,
                'visibility_id' => $visibility_id
            ]);
            Log::debug("DB storage OK");
            // Patr?? PRG amb missatge d'??xit
            return redirect()->route('posts.show', $post)
                ->with('success', __('Post successfully saved'));
        } else {
            // Patr?? PRG amb missatge d'error
            return redirect()->route("posts.create")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $contlikes = Like::where('post_id', '=', $post->id)->count();

        $control = false;
        
        try {
            if (Like::where('user_id', '=', auth()->user()->id)->where('post_id','=', $post->id)->exists()) {
                $control = true;
            }
        } catch (Exception $e) {
            $control = false;
        }
        $visibility=Visibility::find($post->visibility_id);
        return view("posts.show", [
            'post'   => $post,
            'file'   => $post->file,
            'author' => $post->user,
            'visibility' => $visibility,
            "likes" => $contlikes,
            "control" => $control,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(auth()->user()->id == $post->author_id){
            $visibility=Visibility::find($post->visibility_id);
            return view("posts.edit", [
                'post'   => $post,
                'file'   => $post->file,
                'author' => $post->user,
                'visibility' => $visibility,
            ]);
        }
        else{
            return redirect()->route("posts.show", $post)
            ->with('error',__('traduct.error-post-edit'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'body'      => 'required',
            'upload'    => 'nullable|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'  => 'required',
            'longitude' => 'required',
        ]);

        // Obtenir dades del formulari
        $body      = $request->get('body');
        $upload    = $request->file('upload');
        $latitude  = $request->get('latitude'); 
        $longitude = $request->get('longitude');
        $visibility_id    = $request->get('visibility_id');

        // Desar fitxer (opcional)
        if (is_null($upload) || $post->file->diskSave($upload)) {
            // Actualitzar dades a BD
            Log::debug("Updating DB...");
            $post->body      = $body;
            $post->latitude  = $latitude;
            $post->longitude = $longitude;
            $post->visibility_id = $visibility_id;
            $post->save();
            Log::debug("DB storage OK");
            // Patr?? PRG amb missatge d'??xit
            return redirect()->route('posts.show', $post)
                ->with('success', __('Post successfully saved'));
        } else {
            // Patr?? PRG amb missatge d'error
            return redirect()->route("posts.edit")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Post $post)
    {
        if(auth()->user()->id == $post->author_id){
            // Eliminar post de BD
            $post->delete();
            // Eliminar fitxer associat del disc i BD
            $post->file->diskDelete();
            // Patr?? PRG amb missatge d'??xit
            return redirect()->route("posts.index")
                ->with('success', __('Post successfully deleted'));
        }
        else{
            return redirect()->route("posts.show", $post)
            ->with('error',__('traduct.error-post-delete'));
        }
        
    }

    public function like(Post $post)
    {

        $user=User::find(auth()->user()->id);
        $like = Like::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);
        return redirect()->back();

        
    }
    
    public function unlike(post $post)
    {
        Like::where('user_id',auth()->user()->id)
                 ->where('post_id', $post->id )->delete();
        return redirect()->back();
    }
    

}
