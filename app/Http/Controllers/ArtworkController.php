<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artworks = Artwork::with('user')->where('user_id',Auth::id())->get();
        return view('artwork.index',[
            "artworks"=>$artworks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artwork.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title"=> "required",
            "description"=> "required",
            "image"=> "required|image|file|max:3000",
        ]);
        $image = $request->file("image");
        $validatedData['image'] = $image->move('artwork',$image->hashName());
        $validatedData['user_id'] = Auth::id();
        Artwork::create($validatedData);

        return redirect('admin/artwork');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Artwork $artwork)
    {
        return view('artwork.edit',['artwork'=>$artwork]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artwork $artwork)
    {
        $validatedData = $request->validate([
            "title"=> "required",
            "description"=> "required",
            "image"=> "image|file|max:3000",
        ]);
        if ($request->file("image")) {
            $oldImage = $artwork->img;
            File::delete(public_path($oldImage));
            $image = $request->file("image");
            $validatedData['image'] = $image->move('artwork',$image->hashName());
            
        }
        $validatedData['user_id'] = Auth::id();
        Artwork::where('id',$artwork->id)->update($validatedData);
        return redirect('admin/artwork');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artwork  $artwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artwork $artwork)
    {
        $artworkData = Artwork::findOrFail($artwork->id);

        File::delete(public_path($artworkData->image));
        Artwork::destroy($artwork->id);
        return response()->json([
            "message"=> "successfully delete data"
        ]);
    }
}
