<!DOCTYPE html>
<html lang="pt">
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-12">
                <h2 class=" p-2 alert-primary">Lista de Empresas</h2>
                <div class="table-responsive">
                    <table class="table table-light table-striped h-auto">
                        <thead>
                        <tr>
                            <th scope="col"><h6>Id</h6></th>
                            <th scope="col"><h6>Designação Social</h6></th>
                            <th scope="col"><h6>Email</h6></th>
                            <th scope="col"><h6>Telefone</h6>
                            <th scope="col"><h6>NIF</h6></th>
                            <th scope="col"><h6>Ações</h6></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($empresas as $empresa) { ?>
                            <tr>
                                <th scope="row"><?= $empresa->id ?></th>
                                <td><?= $empresa->designacaosocial ?></td>
                                <td><?= $empresa->email ?></td>
                                <td><?= $empresa->telefone ?></td>
                                <td><?= $empresa->nif ?></td>
                                <td>
                                    <ul style="z-index: 2" class="navbar-nav align-items-center">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="actionDropDown"
                                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Ações
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end"
                                                aria-labelledby="actionDropDown">
                                                <li><a href="#"
                                                       class="dropdown-item btn btn-info" role="button">Show</a></li>
                                                <li><a href="#"
                                                       class="dropdown-item btn btn-info" role="button">Edit</a></li>
                                                <li><a href="#"
                                                       class="dropdown-item btn btn-warning" role="button">Delete</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <!--div class="row">
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 m-lg-0 m-1">

                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 m-lg-0 m-1">
                                            <a href="#"
                                               class="btn btn-info" role="button">Edit</a>
                                        </div>
                                        <div class="col-lg-4 col-md-12 col-sm-12 col-12 m-lg-0 m-1">
                                            <a href="#"
                                               class="btn btn-warning" role="button">Delete</a>
                                        </div>
                                    </div-->
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</html>