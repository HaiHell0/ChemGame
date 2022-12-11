<?php
require_once('../settings.php');

class GameItem
{
    /* @var MyPDO */
    protected $db;



    public function __construct()
    {
        $this->db = MyPDO::instance();
    }

    public function find($field, $value)
    {
        return $this->db->run("SELECT * FROM game WHERE $field = ?", [$value]);
    }


    public function authenticate($username, $password)
    {
        $query = $this->db->run("SELECT * FROM admin WHERE username = ?", [$username]);
        if ($query->rowCount() == 0)
            return false;
        $result = $query->fetch();
        if ($result['password'] != $password)
            return false;
        return true;
    }

    public function getAllGames()
    {
        return $this->db->run("SELECT * FROM game")->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addGame($user_id, $game_type_id, $config, $game_name, $category)
    {
        $query = $this->find('GAME_NAME', $game_name);
        if ($query->rowCount() > 0)
            return false;
        $this->db->run('INSERT INTO game(user_id,game_type_id,config,game_name,category) VALUES(?,?,?,?,?)', [$user_id, $game_type_id, $config, $game_name, $category]);
        return true;
    }

    public function removeGame($id)
    {
        $query = $this->find('username', $id);
        if ($query->rowCount() == 0)
            return false;
        $this->db->run('DELETE FROM game WHERE ID=?');
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
        $query = $this->find('user_id', $id);
        if ($query->rowCount() == 0)
            return false;
        return $query->fetch(0);
    }
}

$gameTypeItem = new GameItem();
$gameTypeItem->addGame("1", "3", "dirPhp", "dirCss", "dirJs");


?>