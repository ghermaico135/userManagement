<?php

require_once 'config.class.php';

class Auth extends Database
{
    //register new user
    public function register($name, $email, $password)
    {

        $sql = "INSERT INTO users (name ,email, password) VALUES (:name, :email, :pass)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'pass' => $password]);
        return true;
    }

    //check if user already existed
    public function user_exist($email)
    {
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    //login user

    public function login($email)
    {
        $sql = "SELECT email,password FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

    }

    //current user
    public function currentUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;

    }

    //forgot password reset
    public function forgot_password($token, $email)
    {
        $sql = "UPDATE users SET token= :token, token_expire = DATE_ADD(NOW(),INTERVAL  10 MINUTE) WHERE email=:email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['token' => $token, 'email' => $email]);

        return true;
    }

    //reset user password  authentication
    public function reset_pass_auth($email, $token)
    {
        $sql = "SELECT id FROM user WHERE email=:email AND token=:token AND token != '' AND token_expire > NOW() AND deleted != 0 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email' => $email, 'token' => $token]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    //Updated user updated password
    public function updated_new_pass($pass, $email)
    {
        $sql = "UPDATE user SET token='' ,password=:pass WHERE email = :email AND deleted != 0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['password' => $pass, 'email' => $email]);

        return true;
    }

    //add new notes

    public function add_new_notes($uid, $title, $note)
    {
        $sql = "INSERT INTO notes(uid,title,note) VALUES(:uid,:title,:note);";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['uid' => $uid, 'title' => $title, 'note' => $note]);
        return true;
    }

    //Fetching notes

    public function get_notes($uid)
    {
        $sql = "SELECT * FROM notes WHERE uid = :uid";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["uid" => $uid]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    //Edit method
    public function edit_note($id)
    {
        $sql = "SELECT * FROM notes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    // Update method

    public function update_note($id, $title, $note)
    {
        $sql = "UPDATE notes SET  title = :title, note = :note , updated_at = NOW() WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['title' => $title, 'note' => $note, 'id' => $id]);
        return true;
    }

    // Delete method
    public function delete_note($id)
    {
        $sql = "DELETE FROM notes WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

}
