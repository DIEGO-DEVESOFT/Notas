<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>id</th>
                    <th>NOMBRE</th>
                    <th>Nota1</th>
                    <th>Nota2</th>
                    <th>Nota3</th>
                    <th>Nota4</th>
                    <th>Fecha</th>
                    <th>Promedio</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr class="text-center">
                        <td><?php echo $user->getid(); ?></td>
                        <td><?php echo $user->getNombre(); ?></td>
                        <td><?php echo $user->getNota1(); ?></td>
                        <td><?php echo $user->getNota2(); ?></td>
                        <td><?php echo $user->getNota3(); ?></td>
                        <td><?php echo $user->getNota4(); ?></td>
                        <td><?php echo $user->getfecha(); ?></td>
                        <td><?php echo $user->getpromedio(); ?></td>
                        <td>
                            <a href="?c=RegistrarNotasC&a=actualizarUsuarios&id=<?php echo $user->getid() ?>" class="btn btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2z" />
                                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466" />
                                </svg>
                            </a>


                        </td>
                        <td>

                            <a href="?c=RegistrarNotasC&a=eliminarUsuarios&id=<?php echo $user->getid() ?>" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-x-fill" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M6.854 6.146 8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 1 1 .708-.708" />
                                </svg>
                            </a>


                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>