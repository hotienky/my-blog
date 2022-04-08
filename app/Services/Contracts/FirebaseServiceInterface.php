<?php 
namespace App\Services\Contracts;

interface FirebaseServiceInterface
{
  public  function connectDatabase();
  public  function connectStorage();
}
