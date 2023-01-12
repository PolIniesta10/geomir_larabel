<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Api\Find;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'data'    => Post::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar fitxer
        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,png|max:2048'
        ]);
        // Desar fitxer al disc i inserir dades a BD
        $upload = $request->file('upload');
        $post = new Post();
        $ok = $file->diskSave($upload);

        if ($ok) {
            return response()->json([
                'success' => true,
                'data'    => $post
            ], 201);
        } else {
            return response()->json([
                'success'  => false,
                'message' => 'Error uploading post'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($post = Post::find($id)){
            return response()->json([
                'success' => true,
                'data'    => $post
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message'    => "Post read ERROR"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($post == null){
            return response()->json([
                'success' => false,
                'message'    => "ERROR not found"
            ], 404);
        }
        // Validar fitxer
        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,png|max:2048'
        ]);

        // Desar fitxer al disc i actualitzar dades a BD
        $upload = $request->file('upload');
        
        $ok = $post->diskSave($upload);
        if ($ok) {
            return response()->json([
                'success' => true,
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success'  => false,
                'message' => 'Error uploading file'
            ], 422);
        }
    }
    public function update_workaround(Request $request, $id)
    {
        return $this->update($request, $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        
        if($post == null){
            return response()->json([
                'success' => false,
                'message'    => "ERROR not found"
            ], 404);
        }

        $ok = $post->diskDelete();
        
        if($ok){
            return response()->json([
                'success' => true,
                'data'    => $post
            ], 200);
        }
    }
}
