<?php // manage-vehicle.php

// Inclusion du header de la page
require_once(__DIR__ . '/partials/header.php');

?>

<!-- Contenu de la page -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Gestion des véhicules</h1>
</div>

<div class="py-5 bg-light">
    <div class="container ">
        <div class="row">
            <div class="col">
                <h3>
                    Mes Véhicules
                    <a href="add-vehicle.php" class="btn">
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    </a>
                </h3>
            </div>
        </div>
    </div>
</div>

<?php

// Inclusion du footer de la page
require_once(__DIR__ . '/partials/footer.php');

?>
