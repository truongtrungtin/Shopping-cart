<?php
class User {

  /* Mapped */
  
  private $id;
  public function getId () { return $this->id; }
  private function setId ($id) { $this->id = $id; }


  private $name; 
  public function getName () { return $this->name; }
  public function setName ($name) { $this->name = $name; }

  private $lastName; 
  public function getLastName () { return $this->lastName; }
  public function setLastName ($lastName) { $this->lastName = $lastName; }

  private $phone; 
  public function getPhone () { return $this->phone; }
  public function setPhone ($phone) { $this->phone = $phone; }

  private $email; 
  public function getEmail () { return $this->email; }
  public function setEmail ($email) { $this->email = $email; }

  private $username;
  public function getUsername () { return $this->username; }
  public function setUsername ($username) { $this->username = $username; }

  private $password;
  public function getPassword () { return $this->password; }
  public function setPassword ($password) { $this->password = $password; }

  private $role;
  public function getRole () { return $this->role; }
  public function setRole ($role) { $this->role = $role; }

  /* Not mapped */
  private $message;
  public function getMessage () { return $this->message; }
  public function setMessage ($message) { $this->message = $message; }

  /**
   * Creates a user with the given parameters
   *
   * @param string $username
   * @param string $password
   * @param string $name
   * @param string $lastName
   * @param string $phone
   * @param string $email
   * @param string $role
   * @param int $id
   */
  public function __construct(
    $username,
    $password,
    $name = '',
    $lastName = '',
    $phone = '',
    $email = '',
    $role = '',
    $id = null
  ) {
    
    $this->name = $name;
    $this->lastName = $lastName;
    $this->phone = $phone;
    $this->email = $email;
    $this->username = $username;
    $this->password = $password;
    $this->role = $role;
    $this->id = $id;
  }

  public function Login() {
    
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `ID`, `PASSWORD` FROM `USERS` WHERE `USERNAME` = ?');
    
    $statement->bind_param('s', $this->username);
    $statement->bind_result($ID, $PASSWORD);

    $id = null;

    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        if ($this->password == $PASSWORD) {
          $id = $ID;
        }
      }
    }

    return $id;

  }

  /**
   * Fetches a user by the given id
   *
   * @param int $id Id of the user to get
   * @return User The user with the corresponding id, otherwise null
   */
  public static function GetUserById ($id) {
    $model = null;
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERNAME`, `PASSWORD`, `NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `ROLE`, `ID` FROM `users` WHERE `ID` = ?');
    $statement->bind_param('i', $id);
    $statement->bind_result($USERNAME, $PASSWORD, $NAME, $LASTNAME, $PHONE, $EMAIL, $ROLE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new User($USERNAME, $PASSWORD, $NAME, $LASTNAME, $PHONE, $EMAIL, $ROLE, $ID);
      }
    }
    return $model;
  }

  /**
   * Fetches all the users on the database
   *
   * @return array An array of users
   */
  public static function GetAllUsers () {
    $models = [];
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('SELECT `USERNAME`, `PASSWORD`, `NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `ROLE`, `ID` FROM `users`');
    $statement->bind_result($USERNAME, $PASSWORD, $NAME, $LASTNAME, $PHONE, $EMAIL, $ROLE, $ID);
    if ($statement->execute()) {
      while ($row = $statement->fetch()) {
        $model = new User($USERNAME, $PASSWORD, $NAME, $LASTNAME, $PHONE, $EMAIL, $ROLE, $ID);
        array_push($models, $model);
      }
    }
    return $models;
  }

  /**
   * Inserts the current user on the database
   *
   * @return void
   */
  public function Create () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'INSERT INTO `users` (`NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `USERNAME`, `PASSWORD`, `ROLE`) 
      VALUES (?, ?, ?, ?, ?, ?, ?)'
    );
    $statement->bind_param(
      'sssssss',

      $this->name,
      $this->lastName,
      $this->phone,
      $this->email,
      $this->username,
      $this->password,
      $this->role
    );
    $statement->execute();
  }
  /**
   * Register
   *
   * @return void
   */
  public function Register () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'INSERT INTO `users` (`NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `USERNAME`, `PASSWORD`,`ROLE`) 
      VALUES (?, ?, ?, ?, ?, ?, ?)'
    );
    $statement->bind_param(
      'sssssss',
      $this->name,
      $this->lastName,
      $this->phone,
      $this->email,
      $this->username,
      $this->password,
      $this->role
    );
    $statement->execute();
  }

  /**
   * Updates this user (ID NEEDED) on the database
   *
   * @return void
   */
  public function Edit () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare(
      'UPDATE `users` 
      SET 
        `NAME`=?,
        `LASTNAME`=?,
        `PHONE`=?,
        `EMAIL`=?,
        `USERNAME`=?,
        `PASSWORD`=?,
        `ROLE`=? 
      WHERE `ID`=?'
    );
    $statement->bind_param(
      'sssssssi',
      $this->name,
      $this->lastName,
      $this->phone,
      $this->email,
      $this->username,
      $this->password,
      $this->role,
      $this->id
    );
    $statement->execute();
  }

  /**
   * Removes this user on the database, 
   * doesn't delete this object
   *
   * @return void
   */
  public function Delete () {
    $db = (new DataBase())->CreateConnection();
    $statement = $db->prepare('DELETE FROM `users` WHERE `ID` = ? ');
    $statement->bind_param('i', $this->id);
    $statement->execute();
    $statement = $db->prepare('ALTER TABLE `users` AUTO_INCREMENT=1');
    $statement->execute();
  }

  public function ToAssociativeArray () {
    return array(
      'id' => $this->id,
      'name' => $this->name,
      'lastName' => $this->lastName,
      'phone' => $this->phone,
      'email' => $this->email,
      'username' => $this->username,
      'password' => $this->password,
      'role' => $this->role,
      'message' => $this->message
    );
  }

}
?>