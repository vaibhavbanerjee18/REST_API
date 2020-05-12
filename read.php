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

  // post query & count row
  $result = $post->read();
  $num = $result->rowCount();

  // Check if any posts
  if($num > 0) {
    
    $posts_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $post_item = array(
        'id' => $id,
        'name' => $name,
        'age' => $age,
        'std' => $std
      );

      array_push($posts_arr, $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }
