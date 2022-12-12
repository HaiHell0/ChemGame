<?php
require_once('../settings.php');

class AdminItem
{
    /* @var MyPDO */
    protected $db;



    public function __construct()
    {
        $this->db = MyPDO::instance();
    }

    public function find($field, $value)
    {
        return $this->db->run("SELECT * FROM admin WHERE $field = ?", [$value]);
    }


    public function signin($username, $password)
    {

        $query = $this->find('username', $username);
        if ($query->rowCount() == 0)
            return false;
        $result = $query->fetch();

        if (!$password == $result['PASSWORD'])
            return false;
        $_SESSION['ADMIN_ID'] = $result['ADMIN_ID'];
        $_SESSION['USERNAME'] = $result['USERNAME'];

        return true;
    }



    public function addAdmin($username, $password)
    {
        $query = $this->find('username', $username);
        if ($query->rowCount() > 0)
            return false;

        $this->db->run('INSERT INTO admin(username,password) VALUES(?,?)', [$username, $password]);
        $this->signin($username, $password);
        return true;
    }

    public function removeAdmin($id)
    {
        $query = $this->find('username', $id);
        if ($query->rowCount() == 0)
            return false;
        $this->db->run('DELETE FROM admin WHERE ID=?');
        return true;
    }

    public function removeUser($id)
    {
        $query = $this->find('username', $id);
        if ($query->rowCount() == 0)
            return false;
        $this->db->run('DELETE FROM user WHERE ID=?');
        return true;
    }
    public function getName($id)
    {
        $query = $this->find('ADMIN_ID', $id);
        if ($query->rowCount() == 0)
            return false;
        $result = $query->fetch();
        return $result["USERNAME"];
    }
    public function getGameTypes($id)
    {
        $query = $this->find('ADMIN_ID', $id);
        if ($query->rowCount() == 0)
            return false;
        return $this->db->run("SELECT * FROM gametype WHERE ADMIN_ID= ?", [$id])->fetchAll(\PDO::FETCH_ASSOC);
    }
}
//$a = new AdminItem;

//$r = $a -> signin('aaa','aaa');
//print_r($r);
//print_r("something");




?>