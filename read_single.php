<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once 'config/db.php';
  include_once 'other/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate post object
  $post = new Post($db);
  
  if(isset($_GET['id']))
  {
    $post->id = $_GET['id'];
  }
  else{
    die();
  }
  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $post->id,
    'name' => $post->name,
    'age' => $post->age,
    'std' => $post->std
  );

  // Make JSON
  print_r(json_encode($post_arr));