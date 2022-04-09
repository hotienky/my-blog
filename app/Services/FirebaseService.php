<?php

namespace App\Services;

use App\Services\Contracts\FirebaseServiceInterface;
use Kreait\Firebase\Factory;

class FirebaseService implements FirebaseServiceInterface
{
    public function connectDatabase()
    {
        $firebase = (new Factory)
            ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
            ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));

        return $firebase->createDatabase();
    }

    public function connectStorage()
    {
        $firebase = (new Factory)
            ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
            ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));

        return $firebase->createStorage();
    }

    public function connectMessage()
    {
        $firebase = (new Factory)
            ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
            ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));

        return $firebase->createMessaging();
    }
}