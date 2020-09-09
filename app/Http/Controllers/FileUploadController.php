<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Session;

class FileUploadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('fileupload');
    }
    public function fileUpload(Request $request)
    {
        echo env(AWS_BUCKET);exit;
        $this->validate($request, ['image' => 'required|mimes:mp4|max:50000']);
        if($request->hasfile('image'))
         {
            $file = $request->file('image');
            $name=$file->getClientOriginalName();
            $filePath = env('AWS_FOLDER').'/'. $name;
            $upload = Storage::disk('s3')->put($filePath, file_get_contents($file));
            try{

                \App\File::create(['name'=>$name,'url'=>"https://".env(AWS_BUCKET).".s3.us-east-2.amazonaws.com/".env('AWS_FOLDER').$name]);
                echo "file upload success";

            }catch(Exception $e){
                echo $e->getMessage(); 
                
            }

         }
         exit;
    }
}