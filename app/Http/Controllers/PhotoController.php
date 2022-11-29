<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {

        do {
            $photoId = rand(700, 1000);
            $count = Photo::query()->where('photo_id', '=', $photoId)->count();
            // echo $photoId. ' '. $count .' '.$i."<br>";
        } while ($count > 0);

        Photo::query()->create(['photo_id' => $photoId]);
        return view('photos.index', ['photoId' => $photoId]);
    }

    public function update(string $photo, Request $request)
    {
        $photo=Photo::query()->where('photo_id','=',$photo)->first();
        $photo->status=$request->status;
        $photo->save();
    }
}
