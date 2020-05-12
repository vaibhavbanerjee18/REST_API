<?php 
  class Post {
    private $conn;
    private $table = 'studentinfo';

    public $id;
    public $name;
    public $age;
    public $std;

    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {

      $query = 'SELECT * FROM ' . $this->table ;
      
      $stmt = $this->conn->prepare($query);

      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->name = $row['name'];
        $this->age = $row['age'];
        $this->std = $row['std'];
  }

    public function create() {

          $query = 'INSERT INTO ' . $this->table . ' SET name = :name, age = :age, std = :std';

          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->age = htmlspecialchars(strip_tags($this->age));
          $this->std = htmlspecialchars(strip_tags($this->std));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':age', $this->age);
          $stmt->bindParam(':std', $this->std);
          
          if($stmt->execute()) {
            return true;
      }

      printf("Error: %s.\n", $stmt->error);
      return false;
    }

    public function update() {
          $query = 'UPDATE ' . $this->table . ' SET name = :name, age = :age, std = :std WHERE id = :id';

          $stmt = $this->conn->prepare($query);

          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':age', $this->age);
          $stmt->bindParam(':std', $this->std);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {

          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          $stmt = $this->conn->prepare($query);

          $stmt->bindParam(':id', $this->id);

          if($stmt->execute()) {
            return true;
          }
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
  }