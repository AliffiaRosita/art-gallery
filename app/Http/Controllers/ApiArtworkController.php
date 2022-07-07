<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ApiArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getArtwork()
    {
        try{
            $artworks = User::with('artworks')->get();
            return response()->json([
                'data'=> $artworks,
                'message'=> 'Success',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message'=> 'Artwork data not found',
            ],404);  
        }
    }

    public function artworkDetail(Request $request)
    {
        try{
            $artworks = Artwork::where('user_id',$request['user_id'])->get();
            return response()->json([
                'data'=> $artworks,
                'message'=> 'Success',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message'=> 'Artwork data not found',
            ],404);
        }
    }

   public function searchByUser(Request $request)
   {
        try{
            
            $result = Artwork::with('user')->where('title','like',"%".$request['title']."%")->get();
            return response()->json([
                'data'=> $result,
                'message'=> 'Success',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message'=> 'Artwork data not found',
            ],404);
        }
   }
}
