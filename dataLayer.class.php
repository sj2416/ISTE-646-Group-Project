<?php
class DataLayer {
  
  private $mysqli;

  public function __construct(){
    require "/home/npcomplete/dbCon.php";
    $this->mysqli = new mysqli($hostname, $username, $password, $database);
    if ($mysqli->connect_error){
      echo "Connect failed: " . $mysqli->connect_error;
      exit();
    }
    else
      return $mysqli;
  }

  /*
  * returns 2D associative array with each array representing a row in the student table
  * the key to each row is the student's ID
  * @return array(array())
  */
  public function getAll(){
    $query = "SELECT id, lName, fName, topic, link, status
              FROM student
              WHERE role = 2";

    $mysqli = $this->mysqli;
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $last, $first, $topic, $link, $status);
    $students = array();
    while($stmt->fetch()){
      $student = array($id, $last, $first, $topic, $link, $status);
      $students[$id] = $student;
    }

    return $students;
  }
  
  /*
  * Returns the row for a specified student ID
  * @param int $id
  * @return array 
  */
  public function getStudent($id){
    $query = "SELECT id, lName, fName, topic, link, status, role
              FROM student
              WHERE id = ?";

    $mysqli = $this->mysqli;
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $last, $first, $topic, $link, $status, $role);
    $stmt->fetch();

    return array($id, $last, $first, $topic, $link, $status, $role);
  }
  
  /*
  * retrieves id and role for given username
  * @param string username
  * @return array contains user id and role
  */
  public function getStudentByUser($user){
    $query = "SELECT id, role
              FROM student
              WHERE userName = ?";

    $mysqli = $this->mysqli;
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $role);
    $stmt->fetch();

    return array($id, $role);
  }
  
  /*
  * Compares the user entered password to the one stored in the DB
  * @param string userName
  * @param string password
  * @return boolean
  */
  public function testPass($user, $pw){
  	$query = "SELECT password
  	          FROM student
  	          WHERE userName = ?";

  	$mysqli = $this->mysqli;
  	$stmt = $mysqli->prepare($query);
  	$stmt->bind_param("s", $user);
  	$stmt->execute();
  	$stmt->store_result();
  	$stmt->bind_result($pw2);
  	$stmt->fetch();

  	if($pw === $pw2)
  		return true;
  	else
  		return false;
  }

  /*
  * stores the users token after successful login
  * @param int user ID
  * @param string session ID token
  * @return boolean
  */
  public function storeToken($id, $token){
    
  	$query = "UPDATE student
  	          SET session = ?
  	          WHERE id = ?";

  	$mysqli = $this->mysqli;
  	if($stmt = $mysqli->prepare($query)){
      $stmt->bind_param("si", $token, $id);
  	  $stmt->execute();
  	  return true;
  	}
  	else{
      return false;
    }
  }
  
  /*
  * compares the session id of current session with the session id stored in DB
  * @param int user ID
  * @param string session ID token
  * @return boolean
  */
  public function checkToken($id, $token){
    $query = "SELECT session
              FROM student 
              WHERE id = ?";

    $mysqli = $this->mysqli;
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($session);
    $stmt->fetch();

    if($session === $token){
      return true;
    }
    else{
      return false;
    }
  }
  
  /*
  * updates the status for a specified student
  * @param int user ID
  * @param string status
  */ 
  public function updateStatus($id, $status){
    $query = "UPDATE student
              SET status = ?
              WHERE id = ?";

    $mysqli = $this->mysqli;
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
  }

}//end class
?>