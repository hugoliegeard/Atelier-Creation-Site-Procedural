<?php // add-vehicle.php

// Inclusion du header de la page
require_once(__DIR__ . '/partials/header.php');

// 1. Déclaration de variables
$brand = $model = $color = $registration = $message = null;

// 2. Traitement POST du Formulaire | Si $_POST n'est pas vide...
if (!empty($_POST)) { //      /!\ ETAPE IMPORTANTE /!\

    // 3a. Affectation manuel des variables ;
    // Récupération des données saisies dans le formulaire.
    // $brand = $_POST['brand'];
    // $model = $_POST['model'];
    // $color = $_POST['color'];
    // $registration = $_POST['registration'];

    /*
     * 3b. Au lieu de faire une affectation manuel,
     * vous pouvez automatiser la création des variables
     * --------------------------------------------------
     * Création dynamique des variables en PHP { BONUS }
     * https://www.php.net/manual/fr/language.variables.variable.php
     */
    foreach ($_POST as $cle => $valeur) {
        $$cle = $valeur;
    }

    // var_dump( $brand ); var_dump( $model ); var_dump( $color ); var_dump( $registration );

    // 4. Vérification des données saisies
    $errors = []; // Création d'un tableau pour stocker les erreurs

    if (empty($brand)) {
        $errors['brand'] = "Vous avez oublié de saisir la marque du véhicule";
    }

    if (strlen($brand) > 80) {
        $errors['brand'] = "Pas plus de 80 caractères.";
    }

    if (empty($model)) {
        $errors['model'] = "Vous avez oublié de saisir le modèle du véhicule";
    }

    if (empty($color)) {
        $errors['color'] = "Vous avez oublié de saisir la couleur du véhicule";
    }

    if (empty($registration)) {
        $errors['registration'] = "Vous avez oublié de saisir l'immatriculation du véhicule";
    }

    // echo '<pre>';
    // print_r( $errors );
    // echo '</pre>';

    // 5. Aprés les vérifications, je vérifie s'il y a des erreurs dans le tableau
    if (empty($errors)) {

        // Dans cette condition, le tableau est vide. Pas d'erreurs...
        // Insertion dans la BDD
        $idVehicle = addVehicle($brand, $model, $color, $registration);
        if ($idVehicle) {
            redirection('manage-vehicle.php');
        }

    } else {

        // Le tableau n'est pas vide. Il y a des erreurs.
        // Affichage des erreurs à l'utilisateur
        $message = '
            <div class="alert alert-danger">
                Attention, veuillez bien remplir vos champs.
            </div>
        ';

    } // if(empty($errors))

} // if(!empty($_POST))

?>

<!-- Contenu de la page -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Ajouter un véhicule</h1>
</div>

<div class="py-5 bg-light">
    <div class="container ">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm p-4">

                    <?= $message ?>

                    <form method="post">

                        <!-- brand -->
                        <div class="form-group">
                            <label>Marque du véhicule</label>
                            <input type="text" name="brand"
                                   placeholder="Saisissez la marque du véhicule."
                                   class="form-control <?= isset($errors['brand']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['brand']) ? $errors['brand'] : '' ?>
                            </div>
                            <small class="form-text text-muted">
                                Exemple : BMW, Mercedes, Audi, Renault, ...
                            </small>
                        </div>

                        <!-- model -->
                        <div class="form-group">
                            <label>Modèle du véhicule</label>
                            <input type="text" name="model"
                                   placeholder="Saisissez le modèle du véhicule."
                                   class="form-control <?= isset($errors['model']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['model']) ? $errors['model'] : '' ?>
                            </div>
                            <small class="form-text text-muted">
                                Exemple : Serie 3, A8, Clio, ...
                            </small>
                        </div>

                        <!-- color -->
                        <div class="form-group">
                            <label>Couleur du véhicule</label>
                            <input type="text" name="color"
                                   placeholder="Saisissez la couleur du véhicule."
                                   class="form-control <?= isset($errors['color']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['color']) ? $errors['color'] : '' ?>
                            </div>
                            <small class="form-text text-muted">
                                Exemple : Rouge, Noir, Blanc, Gris, ...
                            </small>
                        </div>

                        <!-- registration -->
                        <div class="form-group">
                            <label>Immatriculation du véhicule</label>
                            <input type="text" name="registration"
                                   placeholder="Saisissez la plaque d'immatriculation du véhicule."
                                   class="form-control <?= isset($errors['registration']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['registration']) ? $errors['registration'] : '' ?>
                            </div>
                            <small class="form-text text-muted">
                                Exemple : DJ-445-TY, ...
                            </small>
                        </div>

                        <!-- submit -->
                        <button class="btn btn-block btn-dark">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                            </svg>
                            Ajouter le véhicule
                        </button>

                    </form>
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /.bg-light -->

<?php

// Inclusion du footer de la page
require_once(__DIR__ . '/partials/footer.php');

?>
