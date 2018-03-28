<?php

namespace App\Models;

use PDO;

/**
 * Post model
 * 
 * Php version 7.0.28
 * 
 */

 class Post 
 {

    /**
     * Get all the posts as an associative array
     * @return array
     */

     public static function getAll()
     {
         $host = 'localhost';
         $dbname = 'mvc';
         $username = 'root';
         $password = 'admin';

         try {
             $db = new PDO("mysql:host=$host; dbname=$dbname; charset=urf8", $username, $password);
             $stmt = 4db -> query('SELECT id, title, content FROM posts ORDER BY created_at');
             $results = $stmt -> fetchAll(PDO::FETCH_ASSOC);

             return $results;
         } catch (PDOException $e) {
             echo $e -> getMessage();
         }
     }
 }