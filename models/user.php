<?php
class user
{
    # Atributos
    private $dbh;
    private $id;
    private $Nombre;
    private $Nota1;
    private $Nota2;
    private $Nota3;
    private $Nota4;
    private $fecha;
    private $promedio;

    # Sobrecarga de Constructores
    public function __construct()
    {
        try {
            $this->dbh = DataBase::connection();
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this, $f = '__construct' . $i)) {
                call_user_func_array(array($this, $f), $a);
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    // public function __construct6($id, $Nombre, $Nota1, $Nota2, $Nota3, $Nota4)
    // {
    //     $this->id = $id;
    //     $this->Nombre = $Nombre;
    //     $this->Nota1 = $Nota1;
    //     $this->Nota2 = $Nota2;
    //     $this->Nota3 = $Nota3;
    //     $this->Nota4 = $Nota4;
    // }

    // public function __construct7($id, $Nombre, $Nota1, $Nota2, $Nota3, $Nota4, $fecha)
    // {
    //     $this->id = $id;
    //     $this->Nombre = $Nombre;
    //     $this->Nota1 = $Nota1;
    //     $this->Nota2 = $Nota2;
    //     $this->Nota3 = $Nota3;
    //     $this->Nota4 = $Nota4;
    //     $this->fecha = $fecha;
    // }

    public function __construct8($id, $Nombre, $Nota1, $Nota2, $Nota3, $Nota4, $fecha, $promedio)
    {
        $this->id = $id;
        $this->Nombre = $Nombre;
        $this->Nota1 = $Nota1;
        $this->Nota2 = $Nota2;
        $this->Nota3 = $Nota3;
        $this->Nota4 = $Nota4;
        $this->fecha = $fecha;
        $this->promedio = $promedio;
    }




    # Métodos: id
    public function setid($id)
    {
        $this->id = $id;
    }
    public function getid()
    {
        return $this->id;
    }
    # Métodos: Nombre
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }
    public function getNombre()
    {
        return $this->Nombre;
    }
    # Métodos: Nota1
    public function setNota1($Nota1)
    {
        $this->Nota1 = $Nota1;
    }
    public function getNota1()
    {
        return $this->Nota1;
    }
    # Métodos: Nota2
    public function setNota2($Nota2)
    {
        $this->Nota2 = $Nota2;
    }
    public function getNota2()
    {
        return $this->Nota2;
    }
    # Métodos: Nota3
    public function setNota3($Nota3)
    {
        $this->Nota3 = $Nota3;
    }
    public function getNota3()
    {
        return $this->Nota3;
    }
    # Métodos: nota4
    public function setnota4($Nota4)
    {
        $this->Nota4 = $Nota4;
    }
    public function getNota4()
    {
        return $this->Nota4;
    }

    # Métodos: fecha
    public function setfecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getfecha()
    {
        return $this->fecha;
    }

    # Métodos: promedio
    public function setpromedio($promedio)
    {
        $this->promedio = $promedio;
    }
    public function getpromedio()
    {
        return $this->promedio;
    }

    public function registrarUsuario()
    {
        try {
            $promedio = ($this->getNota1() + $this->getNota2() + $this->getNota3() + $this->getNota4()) / 4;
            $sql = 'INSERT INTO notas VALUES (
                            :id,
                            :Nombre,
                            :Nota1,
                            :Nota2,
                            :Nota3,
                            :Nota4,
                            :fecha,
                            :promedio
                        )';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('id', $this->getid());
            $stmt->bindValue('Nombre', $this->getNombre());
            $stmt->bindValue('Nota1', $this->getNota1());
            $stmt->bindValue('Nota2', $this->getNota2());
            $stmt->bindValue('Nota3', $this->getNota3());
            $stmt->bindValue('Nota4', $this->getNota4());
            $stmt->bindValue('fecha', $this->getfecha());
            $stmt->bindValue('promedio', $promedio);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    #Consultar Usuarios
    public function consultarUsuarios()
    {
        try {
            $usersList = [];
            $sql = 'SELECT * FROM notas';
            $stmt = $this->dbh->query($sql);
            foreach ($stmt->fetchAll() as $users) {
                $usersList[] = new user(
                    $users['id'],
                    $users['nombre'],
                    $users['nota1'],
                    $users['nota2'],
                    $users['nota3'],
                    $users['nota4'],
                    $users['fecha'],
                    $users['promedio']
                );
            }
            return $usersList;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // #Actualizar Usuario
    public function actualizarUsuario()
    {
        try {
            $sql = 'UPDATE notas SET
                             nombre = :nombre,
                             nota1 = :nota1,
                             nota2 = :nota2,
                             nota3 = :nota3,
                             nota4 = :nota4
                         WHERE id = :id';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('id', $this->getid());
            $stmt->bindValue('nombre', $this->getNombre());
            $stmt->bindValue('nota1', $this->getNota1());
            $stmt->bindValue('nota2', $this->getNota2());
            $stmt->bindValue('nota3', $this->getNota3());
            $stmt->bindValue('nota4', $this->getNota4());
            $stmt->execute();
            // Después de actualizar, recalcular el promedio y actualizar la base de datos
            $promedio = ($this->getNota1() + $this->getNota2() + $this->getNota3() + $this->getNota4()) / 4;
            $sqlUpdatePromedio = 'UPDATE notas SET promedio = :promedio WHERE id = :id';
            $stmtUpdatePromedio = $this->dbh->prepare($sqlUpdatePromedio);
            $stmtUpdatePromedio->bindValue('id', $this->getid());
            $stmtUpdatePromedio->bindValue('promedio', $promedio);
            $stmtUpdatePromedio->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    #Obtener Usuario por Id
    public function obtenerUserPorId($id)
    {
        try {
            $sql = "SELECT * FROM notas WHERE id=:id";
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('id', $id);
            $stmt->execute();
            $userDB = $stmt->fetch();
            $user = new user(
                $userDB['id'],
                $userDB['nombre'],
                $userDB['nota1'],
                $userDB['nota2'],
                $userDB['nota3'],
                $userDB['nota4'],
                $userDB['fecha'],
                $userDB['promedio']
            );
            return $user;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    # Eliminar Usuario
    public function eliminarUsuario($id)
    {
        try {
            $sql = 'DELETE FROM notas WHERE id = :id';
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue('id', $id);
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
