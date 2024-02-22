<?php
    require_once "models/user.php";
    class RegistrarNotasC {
        public function __construct(){}
        public function index(){  
            if ($_SERVER['REQUEST_METHOD'] == 'GET'){
                require_once "views/header.view.php";
                require_once "views/Registro.view.php";
                require_once "views/footer.view.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = new user(
                    null,
                    $_POST['nombre'],
                    $_POST['nota1'],
                    $_POST['nota2'],
                    $_POST['nota3'],
                    $_POST['nota4'],
                    $_POST['fecha'],
                    $_POST['promedio']
                );
                $user->registrarUsuario();
                header("Location: ?c=RegistrarNotasC&a=consultarUsuarios");
            } 
            
            
        }

        public function consultarUsuarios(){
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $users = new user;
                $users = $users->consultarUsuarios();
                require_once "views/header.view.php";
                require_once "views/consultarUsuarios.php";
                require_once "views/footer.view.php";
            }            
        }

        public function actualizarUsuarios(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $user = new user;
                    $user = $user->obtenerUserPorId($_GET['id']);
                    require_once "views/header.view.php";
                    require_once "views/actualizarUsuario.php";
                    require_once "views/footer.view.php";                
                }
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user = new user(
                        $_POST['id'],
                        $_POST['nombre'],
                        $_POST['nota1'],
                        $_POST['nota2'],
                        $_POST['nota3'],
                        $_POST['nota4'],
                        $_POST['fecha'],
                        $_POST['promedio']
                    );                
                    $user->actualizarUsuario();
                    header("Location: ?c=RegistrarNotasC&a=consultarUsuarios");
                }            
        }

        public function eliminarUsuarios(){
                $user = new user;
                $user->eliminarUsuario($_GET['id']);
                header("Location: ?c=RegistrarNotasC&a=consultarUsuarios");
        }
    }