<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\File;
use App\Models\Visibility;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:places.list')->only('index');
        $this->middleware('permission:places.create')->only(['create','store']);
        $this->middleware('permission:places.read')->only('show');
        $this->middleware('permission:places.update')->only(['edit','update']);
        $this->middleware('permission:places.delete')->only('destroy');
    }

    public function index(Place $place)
    {
        $contfav = Favorite::where('place_id', '=', $place->id)->count();

        $control = false;
        
        try {
            if (Favorite::where('user_id', '=', auth()->user()->id)->where('place_id','=', $place->id)->exists()) {
                $control = true;
            }
        } catch (Exception $e) {
            $control = false;
        }
        return view("places.index", [
            "places" => Place::all(),
            'file'   => $place->file,
            'author' => $place->user,
            "control" => $control,
            "favorites" => $contfav,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("places.create");
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
            'name'        => 'required',
            'description' => 'required',
            'upload'      => 'required|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'    => 'required',
            'longitude'   => 'required',
        ]);
        
        // Obtenir dades del formulari
        $name        = $request->get('name');
        $description = $request->get('description');
        $upload      = $request->file('upload');
        $latitude    = $request->get('latitude');
        $longitude   = $request->get('longitude');
        $visibility_id    = $request->get('visibility_id');

        // Desar fitxer al disc i inserir dades a BD
        $file = new File();
        $fileOk = $file->diskSave($upload);

        if ($fileOk) {
            // Desar dades a BD
            Log::debug("Saving place at DB...");
            $place = Place::create([
                'name'        => $name,
                'description' => $description,
                'file_id'     => $file->id,
                'latitude'    => $latitude,
                'longitude'   => $longitude,
                'author_id'   => auth()->user()->id,
                'visibility_id' => $visibility_id
            ]);
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('places.show', $place)
                ->with('success', __('Place successfully saved'));
        } else {
            \Log::debug("Disk storage FAILS");
            // Patró PRG amb missatge d'error
            return redirect()->route("places.create")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {

        $contfav = Favorite::where('place_id', '=', $place->id)->count();
        

        $control = false;
        
        try {
            if (Favorite::where('user_id', '=', auth()->user()->id)->where('place_id','=', $place->id)->exists()) {
                $control = true;
            }
        } catch (Exception $e) {
            $control = false;
        }
        $visibility=Visibility::find($place->visibility_id);
        return view("places.show", [
            "place" => $place,
            'file'   => $place->file,
            'author' => $place->user,
            'visibility' => $visibility,
            "control" => $control,
            "favorites" => $contfav,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        
        if(auth()->user()->id == $place->author_id){
            $visibility=Visibility::find($place->visibility_id);
            return view("places.edit", [
                'place'  => $place,
                'file'   => $place->file,
                'author' => $place->user,
                'visibility' => $visibility,
            ]);
        }
        else{
            return redirect()->route("places.show", $place)
            ->with('error',__('fpp_traduct.place-error-edit'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        // Validar dades del formulari
        $validatedData = $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'upload'      => 'nullable|mimes:gif,jpeg,jpg,png,mp4|max:2048',
            'latitude'    => 'required',
            'longitude'   => 'required',
        ]);
        
        // Obtenir dades del formulari
        $name        = $request->get('name');
        $description = $request->get('description');
        $upload      = $request->file('upload');
        $latitude    = $request->get('latitude');
        $longitude   = $request->get('longitude');
        $visibility_id = $request->get('visibility_id');

        // Desar fitxer (opcional)
        if (is_null($upload) || $place->file->diskSave($upload)) {
            // Actualitzar dades a BD
            Log::debug("Updating DB...");
            $place->name        = $name;
            $place->description = $description;
            $place->latitude    = $latitude;
            $place->longitude   = $longitude;
            $place->visibility_id = $visibility_id;
            $place->save();
            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('places.show', $place)
                ->with('success', __('Place successfully saved'));
        } else {
            // Patró PRG amb missatge d'error
            return redirect()->route("places.create")
                ->with('error', __('ERROR Uploading file'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {

        if(auth()->user()->id == $place->author_id){
            // Eliminar place de BD
            $place->delete();
            // Eliminar fitxer associat del disc i BD
            $place->file->diskDelete();
            // Patró PRG amb missatge d'èxit
            return redirect()->route("places.index")
            ->with('success', 'Place successfully deleted');
        }
        else{
            return redirect()->route("places.index", $place)
            ->with('error',__('fpp_traduct.error-place_delete'));
        }
    }

    public function favorite(Place $place)
    {

        $user=User::find(auth()->user()->id);
        $favorite = Favorite::create([
            'user_id' => $user->id,
            'place_id' => $place->id,
        ]);
        return redirect()->back();

        
    }
    
    public function unfavorite(Place $place){
        Favorite::where('user_id',auth()->user()->id)
        ->where('place_id', $place->id )->delete();
        return redirect()->back();
    }
}
