<?php

namespace App\Http\Controllers;

use App\Facades\Requirement;
use App\Services\Contracts\FirebaseServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{

    private $database;
    private $storage;

    public function __construct()
    {
        // $this->database = FirebaseServiceInterface::connectDatabase();
        // $this->storage = FirebaseServiceInterface::connectStorage();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    //     // return response()->json($this->database->getReference('test/blogs')->getValue());
    //     $imageReference = $this->storage->getBucket()->object("Images/123.png");
    //    if ($imageReference->exists()) {
    //     $image = $imageReference->signedUrl($expiresAt);
    //   } else {
    //     $image = null;
    //   }

    $a= Requirement::test();
    //   return  response()->json($image);
        return api_success( $a );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) 
    {
        // $this->database
        //     ->getReference('test/blogs/' . $request['title'])
        //     ->set([
        //         'title' => $request['title'] ,
        //         'content' => $request['content']
        //     ]);
        // app('firebase.storage')
        $image = $request->file('image');
        $a= upload_files($image);
        return response()->json(get_path_file_image($a));
    }
    public function edit(Request $request) 
    {
        $this->database->getReference('test/blogs/' . $request['title'])
            ->update([
                'content/' => $request['content']
            ]);
    
        return response()->json('blog has been edited');
    }
    public function delete(Request $request)
    {
        $this->database
            ->getReference('test/blogs/' . $request['title'])
            ->remove();
    
        return response()->json('blog has been deleted');
    }
}
