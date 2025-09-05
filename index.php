<?php
    require_once 'controller.php';
    $taches = $tache->read();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/bootstrap.min.css">
        <link rel="stylesheet" href="assets/style.css">
        <title>My To Do App</title>
    </head>
    <body>
        <div class="conteneur">
            <h2>Todo App</h2>


            <form action="controller.php?action=create" method="POST">
                <input type="text" name="tache"  placeholder="Ajouter Une nouvelle Tache"> <br> <br>
                <button type="submit" id="btn">Ajouter une Nouvelle Tache</button>
            </form>



            <div>
                <br>
                <table  border="1px solid black">
                    <tr class="tr1">
                        <th>NOM</th>
                        <th>ACTION</th>
                    </tr>
                    <?php
                        foreach ($taches as $T) {
                    ?>
                            <tr>
                                <td>
                                    <?= $T['nom'] ?>
                                </td>
                                <td>
                                    <button aria-label="Modifier" class="btn btn-sm btn-warning btn-update" data-bs-toggle="modal" data-bs-target="#formModal" onclick="update(<?= $T['id_taches'] ?>)">
                                        Modifier
                                    </button>
                                    <button aria-label="Supprimer" class="btn btn-sm btn-danger btn-delete" onclick="del(<?= $T['id_taches'] ?>)">
                                        supprimer
                                    </button>
                                </td>
                            </tr>
                    <?php
                        } 
                    ?>
                </table> <br>
                <button class="btn btn-sm btn-danger btn-delete" style="margin-left:300px" onclick="deleteAll()">DELETE ALL</button>
            </div>




            <div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Nouvelle tache</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="form_edit" id="form_edit" method="POST" action="" enctype="multipart/form-data">
                                <p>
                                    <label class="form-label fw-bold">
                                        Entrez la nouvelle tache
                                    </label>
                                    <input type="text" name="newTache" id="first_name" required  />
                                </p>
                                <p class="text-right">
                                    <input type="submit" class="btn btn-success" value="Enregistrer" />
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="assets/bootstrap.bundle.min.js"></script>
        <script>
            function del(id){
                document.location.href=`index.php?action=delete&id=${id}`;
            }
            function deleteAll(){
                document.location.href=`index.php?action=deleteAll`;
            }
            async function update(id){
                const response= await fetch(`controller.php?action=read&id=${id}`);
                const data = await response.json();
                document.querySelector("#first_name").value = data.nom;
                document.querySelector("#form_edit").setAttribute("action",`index.php?action=update&id=${data.id_taches}`);
            }
        </script>
        
    </body>
</html>