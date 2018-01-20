<?php
//__inclusion des différentes classes
	require('model/BDD.php');
	require('model/Map.php');

    $title = "Liste Composition"; // titre de la page

	try {
		$map = new Map();

		//__Ajout d'une information
		if(!empty($_POST)) {
			extract($_POST);

			$filiere = strip_tags($_POST['filiere']);
			$niveau = strip_tags($_POST['niveau']);

			$listeCompo = $map->getLisCompo($filiere, $niveau);

		}else{
            $filiere = "filiere";
            $niveau = "niveau";
        }

//__ On récupère toutes les infos
        $allFilieres = $map->getAllFiliere();
        $allNiveaux = $map->getAllNiveau();

// $infos = $map->getInfos();
// $categories = $map->getCategory();
//
		require_once("view/vueListeCompo.php");

	} catch (Exception $e) {
	    $msgErreur = $e->getMessage();
	}
