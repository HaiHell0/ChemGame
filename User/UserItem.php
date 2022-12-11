<?php

require_once('../settings.php');

class UserItem
{
    /* @var MyPDO */
    protected $db;



    public function __construct()
    {
        $this->db = MyPDO::instance();
    }

    public function find($field, $value)
    {
        return $this->db->run("SELECT * FROM user WHERE $field = ?", [$value]);
    }


    public function login($username, $password)
    {
        $query = $this->find('username', $username);
        if ($query->rowCount() == 0)
            return false;
        $result = $query->fetch();

        if (!$password === $result['PASSWORD'])
            return false;
        $_SESSION['USER_ID'] = $result['USER_ID'];
        $_SESSION['USERNAME'] = $result['USERNAME'];

        return true;
    }

    public function addUser($username, $password)
    {
        $query = $this->find('username', $username);
        if ($query->rowCount() > 0)
            return false;
        $this->db->run('INSERT INTO user(username,password) VALUES(?,?)', [$username, $password]);
        return true;
    }
    public function removeUser($id)
    {
        $query = $this->find('user_id', $id);
        if ($query->rowCount() == 0)
            return false;
        $this->db->run('DELETE FROM user WHERE ID=?');
        return true;
    }
    public function getName($id)
    {
        $query = $this->find('user_id', $id);
        if ($query->rowCount() == 0)
            return false;
        $result = $query->fetch();
        return $result["USERNAME"];
    }
}









?>