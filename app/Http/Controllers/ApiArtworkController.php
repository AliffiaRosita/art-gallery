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
            $users = User::with('artworks')->get();
            foreach ($users as  $user) {
                foreach ($user->artworks as  $artwork) {
                    $data[]= [
                        'id'=> $user->id,
                        'name' => $user->name,
                        'email'=> $user->email,
                        'artworks'=>[
                            'id'=> $artwork->id,
                            'title'=> $artwork->title,
                            'desc'=> $artwork->description,
                            'image'=> url($artwork->image),
                        ]
                    ];
                }
            }
            return response()->json([
                'data'=> $data,
                'message'=> 'Success',
            ],200);
        }catch(Exception $e){
            return $e; 
        }
    }

    public function artworkDetail(Request $request)
    {
        try{
            $artworks = Artwork::where('user_id',$request['user_id'])->get();
                foreach ($artworks as  $artwork) {
                    $data[]= [
                            'id'=> $artwork->id,
                            'title'=> $artwork->title,
                            'desc'=> $artwork->description,
                            'image'=> url($artwork->image),
                    ];
                
            }
            return response()->json([
                'data'=> $data,
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
            
            $artworks = Artwork::with('user')->where('title','like',"%".$request['title']."%")->get();
            foreach ($artworks as  $artwork) {
                    $data[]= [
                        'id'=> $artwork->id,
                            'title'=> $artwork->title,
                            'desc'=> $artwork->description,
                            'image'=> url($artwork->image),
                        
                    ];
                
            }
            return response()->json([
                'data'=> $data,
                'message'=> 'Success',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'message'=> 'Artwork data not found',
            ],404);
        }
   }
}
