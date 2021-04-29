<?php 
  // Headers


header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Product.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new \Model\Product($db);

  // Get ID
  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $post->id,
    'name' => $post->name,
    'description' => $post->description,
    'sku' => $post->sku,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
  );

  // Make JSON
  print_r(json_encode($post_arr));