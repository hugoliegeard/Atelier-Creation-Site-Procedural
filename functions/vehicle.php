<?php

// Fonction getVehicles() : Retourne tous les véhicules
function getVehicles()
{
    global $db;
    $sql = 'SELECT * FROM vehicle';
    $query = $db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

// Fonction deleteVehicle(...) : Supprimer un véhicule
function deleteVehicle($id)
{
    global $db;
    $delete = $db->prepare('DELETE from vehicle WHERE id = :id');
    $delete->bindValue(':id', $id, PDO::PARAM_INT);
    return $delete->execute();
}

// Fonction addVehicle(...) : Insérer un véhicule
function addVehicle($brand, $model, $color, $registration)
{

    global $db; // Récupération de $db dans l'espace global de PHP ; voir database.php
    $query = $db->prepare('INSERT INTO vehicle (brand, model, color, registration) 
                                        VALUES (:brand, :model, :color, :registration)');
    $query->bindValue(':brand', $brand, PDO::PARAM_STR);
    $query->bindValue(':model', $model, PDO::PARAM_STR);
    $query->bindValue(':color', $color, PDO::PARAM_STR);
    $query->bindValue(':registration', $registration, PDO::PARAM_STR);

    // Si le véhicule est bien inséré, alors je retourne l'ID sinon je retourne faux.
    return $query->execute() ? $db->lastInsertId() : false;

}

// TODO Fonction updateVehicle(...) : Mettre à jour un véhicule
// TODO Fonction getVehicleById($id) : Retourne un véhicule via son ID