<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once 'config/db.php';
  include_once 'other/post.php';

  $database = new Database();
  $db = $database->connect();
  $post = new Post($db);

  // Get data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to update
  $post->id = $data->id;

  $post->name = $data->name;
  $post->age = $data->age;
  $post->std = $data->std;

  if($post->update()) {
    echo json_encode(
      array('message' => 'Post Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'Post Not Updated')
    );
  }

