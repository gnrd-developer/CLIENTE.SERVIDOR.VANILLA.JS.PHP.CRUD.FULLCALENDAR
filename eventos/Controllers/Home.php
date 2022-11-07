<?php
class Home extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->views->getView($this, 'index');
    }

    public function registrar()
    {
        if(empty($_POST['title']) || empty($_POST['start']) || empty($_POST['color'])) {
            echo json_encode(array('error' => true, 'msg' => 'Todos los campos son obligatorios'));
        } else {
            $title = $_POST['title'];
            $start = $_POST['start'];
            $color = $_POST['color'];
            $id = $_POST['id'];
            if ($id == '') {
                $respuesta = $this->model->registrar($title, $start, $color);
                if($respuesta == 1) {
                    $mensaje = array('estado' => true, 'msg' => 'Registro exitoso', 'tipo' => 'success');
                } else {
                    $mensaje = array('estado' => false, 'msg' => 'Error al registrar', 'tipo' => 'error'); 
                }
            }else{
                $respuesta = $this->model->modificar($title, $start, $color, $id);
                if($respuesta == 1) {
                    $mensaje = array('estado' => true, 'msg' => 'Registro modificado', 'tipo' => 'success');
                } else {
                    $mensaje = array('estado' => false, 'msg' => 'Error al modificar el evento', 'tipo' => 'error'); 
                }
            }//ahora nos toca crear la funsion modificar en la carpeta models en el archivo homemodel.php
            echo json_encode($mensaje);
            die();
        }
    }

    public function eliminar($id){
        $data = $this->model->eliminar($id);
        if($data == 1) {
            $mensaje = array('estado' => true, 'msg' => 'Registro eliminado', 'tipo' => 'success');
        } else {
            $mensaje = array('estado' => false, 'msg' => 'Error al eliminar el evento', 'tipo' => 'error'); 
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar()
    {
        $data = $this->model->listar();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function drop()
    {
        $start = $_POST['start'];
        $id = $_POST['id'];
        $data = $this->model->drop($start, $id);
        if($data == 1) {
            $mensaje = array('estado' => true, 'msg' => 'Registro modificado', 'tipo' => 'success');
        } else {
            $mensaje = array('estado' => false, 'msg' => 'Error al modificar el evento', 'tipo' => 'error'); 
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

}
