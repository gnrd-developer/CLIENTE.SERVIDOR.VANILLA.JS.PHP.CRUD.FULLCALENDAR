<?php
class HomeModel extends Query{
    public function __construct()
    {
        parent::__construct();
    }


    public function registrar($title, $start, $color)
    {
        $sql = "INSERT INTO eventos (title, start, color) VALUES (?, ?, ?)";
        $array = array($title, $start, $color);
        $data = $this->save($sql, $array);
        if($data == 1) {
            $msg = 1;
        } else {
            $msg = 0;
        }
        return $msg;
    }

    
    public function modificar($title, $start, $color, $id)
    {
        $sql = "UPDATE eventos SET title = ?, start = ?, color = ? WHERE id = ?";
        $array = array($title, $start, $color, $id);
        $data = $this->save($sql, $array);
        if($data == 1) {
            $msg = 1;
        } else {
            $msg = 0;
        }
        return $msg;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM eventos WHERE id = ?";
        $array = array($id);
        $data = $this->save($sql, $array);
        if($data == 1) {
            $msg = 1;
        } else {
            $msg = 0;
        }
        return $msg;
    }
    

    public function drop($start, $id)
    {
        $sql = "UPDATE eventos SET start=? WHERE id=?";
        $array = array($start, $id);
        $data = $this->save($sql, $array);
        if($data == 1) {
            $msg = 1; 
        } else {
            $msg = 0;
        }
        return $msg;
    }


    public function listar()
    {
        $sql = "SELECT * FROM eventos";
        $data = $this->selectAll($sql);
        return $data;
    }

}

?>