<?php

use App\Services\FirebaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

if (!function_exists('api_success')) {
    function api_success($data = null, $msg = 'response success')
    {
        return response()->json([
            'status' => 'success',
            'message' => $msg,
            'data' => $data
        ]);
    }
}

if (!function_exists('api_errors')) {
    function api_errors($data = null, $msg = 'response errors')
    {
        return response()->json([
            'status' => 'errors',
            'message' => $msg,
            'errors' => $data
        ]);
    }
}

if (!function_exists('storage_url')) {
    function storage_url($files)
    {
        if (is_array($files)) {
            return collect($files)->map(function ($file) {
                return Storage::url($file);
            });
        };
        return Storage::url($files);
    }
}

if (!function_exists('upload_files')) {
    function upload_files($image)
    {
        $firebaseService = new FirebaseService();
        $storage =$firebaseService->connectStorage();
        $now = Carbon::now()->getTimestamp();
        $firebase_storage_path = 'Images/';
        $name    =  $image->getClientOriginalName() . $now;
        $localfolder = public_path('firebase-temp-uploads') .'/';
        $extension = $image->getClientOriginalExtension();
        $file      = $name. '.' . $extension;
        if ($image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder.$file, 'r');
            response()->json( $storage->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $file]));
            //will remove from local laravel folder
            unlink($localfolder . $file);
        }
        return $firebase_storage_path.$file;
    }
}

if (!function_exists('get_path_file_image')) {
    function get_path_file_image($fileName)
    {
        $firebaseService = new FirebaseService();
        $storage =$firebaseService->connectStorage();
        $expiresAt = Carbon::createFromFormat('Y-m-d H', '2070-05-21 22');

        $imageReference = $storage->getBucket()->object($fileName);
        if ($imageReference->exists()) {
            $image = $imageReference->signedUrl($expiresAt);
        } else {
            $image = null;
        }
        return $image;
    }
}

if (!function_exists('send_notification')) {
    function send_notification($deviceTokens, $title, $content)
    {
        $firebaseService = new FirebaseService();
        $cloudMessage =$firebaseService->connectMessage();
        $content =CloudMessage::new()->withNotification(['title' => $title, 'body' => $content]);
        $cloudMessage->sendMulticast($content , $deviceTokens);
    }
}

