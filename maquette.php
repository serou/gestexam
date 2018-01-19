<?php
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');

    $title = "Maquette"; // titre de la page
    
	try {
		$map = new Map();

		//__Ajout d'une information
		if(!empty($_POST)) {
			extract($_POST);

			$filiere = strip_tags($_POST['filiere']);
			$semestre = strip_tags($_POST['semestre']);

			$getMaquette = $map->getMaquette($filiere, $semestre);

		}else{
            $filiere = "filiere";
            $semestre = "semestre";
        }

//__ On récupère toutes les infos
        $allFilieres = $map->getAllFiliere();
        $allSemestres = $map->getAllSemestre();

// $infos = $map->getInfos();
// $categories = $map->getCategory();
//
		require_once("view/vueMaquette.php");

	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	}
