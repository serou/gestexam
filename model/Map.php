<?php
/*
 * Modele de classe PHP : Map-2.php
 * Classe d'affichage des markers sur une Google Maps
 */

class Map extends BDD{

//__Insert les t_etudiants inscrits
    function setEtudInscr($nce, $nom, $prenom, $dateNaiss, $lieuNais, $nationnalite, $sexe, $ufr, $filiere, $niveau) {
        $bdd = parent::getBdd();

        $sql = "INSERT INTO t_etudiant_inscrit (nce, nom, prenom, dateNaiss, lieuNais, nationnalite, sexe, ufr, filiere, niveau)";
		$sql .= " VALUES (:nce, :nom, :prenom, :dateNaiss, :lieuNais, :nationnalite, :sexe, :ufr, :filiere, :niveau)";

		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':nce', $nce);
		$stmt->bindParam(':nom', $nom);
		$stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':dateNaiss', $dateNaiss);
		$stmt->bindParam(':lieuNais', $lieuNais);
		$stmt->bindParam(':nationnalite', $nationnalite);
        $stmt->bindParam(':sexe', $sexe);
		$stmt->bindParam(':ufr', $ufr);
		$stmt->bindParam(':filiere', $filiere);
        $stmt->bindParam(':niveau', $niveau);

		$stmt->execute();

    }

    //__Insert les t_maquette
        function setMaquette($code_filiere, $code_ue, $lib_ue, $lib_ecue, $code_ecue, $semestre, $credit_ue, $credit_ecue, $anscol) {
            $bdd = parent::getBdd();

            $sql = "INSERT INTO t_maquette (code_filiere, code_ue, lib_ue, lib_ecue, code_ecue, semestre, credit_ue, credit_ecue, anscol)";
    		$sql .= " VALUES (:code_filiere, :code_ue, :lib_ue, :lib_ecue, :code_ecue, :semestre, :credit_ue, :credit_ecue, :anscol)";

    		$stmt = $bdd->prepare($sql);
    		$stmt->bindParam(':code_filiere', $code_filiere);
    		$stmt->bindParam(':code_ue', $code_ue);
    		$stmt->bindParam(':lib_ue', $lib_ue);
            $stmt->bindParam(':lib_ecue', $lib_ecue);
            $stmt->bindParam(':code_ecue', $code_ecue);
    		$stmt->bindParam(':semestre', $semestre);
    		$stmt->bindParam(':credit_ue', $credit_ue);
            $stmt->bindParam(':credit_ecue', $credit_ecue);
    		$stmt->bindParam(':anscol', $anscol);

    		$stmt->execute();

        }





//__Affiche tous les catégories
    function getCategory() {
        $bdd = parent::getBdd();

		$sql = "SELECT *";
		$sql .= " FROM  markers_icone as MKI";
		$sql .= " ORDER BY icone_categorie ASC";

        $datas = $bdd->query($sql);

		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }

		return $count; // Accès au résultat
    }

//__Insertion d'une info dans la to-do list
    function getInsertInfo($actif, $categorie, $ville, $longitude, $latitude, $text ) {
        $bdd = parent::getBdd();

		$sql = "INSERT INTO markers (marker_actif, marker_categorie, marker_ville, marker_longitude, marker_latitude, marker_text)";
		$sql .= " VALUES (:actif, :categorie, :ville, :longitude, :latitude, :text)";

		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':actif', $actif);
		$stmt->bindParam(':categorie', $categorie);
		$stmt->bindParam(':ville', $ville);
		$stmt->bindParam(':longitude', $longitude);
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':text', $text);

		$stmt->execute();
    }

//__Insertion d'une info dans la to-do list
    function getInsertCategory($category, $actif, $image) {
        $bdd = parent::getBdd();

		$sql = "INSERT INTO markers_icone (icone_actif, icone_categorie, icone_icon)";
		$sql .= " VALUES (:actif, :categorie, :icone)";

		$stmt = $bdd->prepare($sql);
		$stmt->bindParam(':actif', $actif);
		$stmt->bindParam(':categorie', $category);
		$stmt->bindParam(':icone', $image);

		$stmt->execute();
    }

//Mise à jour d'une info quelconque de la to-do list
    function getUpdateInfo($id, $actif, $categorie, $ville, $longitude, $latitude, $text) {
        $bdd = parent::getBdd();

		$sql = "UPDATE markers";
		$sql .= " SET marker_actif=:actif, marker_categorie=:categorie, marker_ville=:ville, marker_longitude=:longitude, marker_latitude=:latitude, marker_text=:text";
		$sql .= " WHERE marker_id=:id";

		$stmt = $bdd->prepare($sql);


		$stmt->bindParam(':actif', $actif);
		$stmt->bindParam(':categorie', $categorie);
		$stmt->bindParam(':ville', $ville);
		$stmt->bindParam(':longitude', $longitude);
		$stmt->bindParam(':latitude', $latitude);
		$stmt->bindParam(':text', $text);
		$stmt->bindParam(':id', $id);

		$stmt->execute();
    }

//Mise à jour d'une info quelconque de la to-do list
    function getUpdateCat($id, $actif, $categorie, $image) {
        $bdd = parent::getBdd();

		$sql = "UPDATE markers_icone";
		$sql .= " SET icone_actif=:actif, icone_categorie=:categorie, icone_icon=:image";
		$sql .= " WHERE icone_id=:id";

		$stmt = $bdd->prepare($sql);


		$stmt->bindParam(':actif', $actif);
		$stmt->bindParam(':categorie', $categorie);
		$stmt->bindParam(':image', $image);
		$stmt->bindParam(':id', $id);

		$stmt->execute();
    }

//__Suppression d'une info.
    function getIdInfo( $id ) {
        $bdd = parent::getBdd();

		$sql = "SELECT *";
		$sql .= " FROM markers";
		$sql .= " WHERE marker_id=".$id;

		$datas = $bdd->query($sql);

		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }

		return $count; // Accès au résultat
    }

//__Affiche tous les infos
    function getIdInfosCat( $id ) {
        $bdd = parent::getBdd();

		$sql = "SELECT *";
		$sql .= " FROM markers_icone";
		$sql .= " WHERE icone_id=".$id;

        $datas = $bdd->query($sql);

		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }

		return $count; // Accès au résultat
    }

//__Suppression d'une info dans la to-do list
    function getDeleteInfo( $id ) {
        $bdd = parent::getBdd();

		$sql = "DELETE FROM markers";
		$sql .= " WHERE marker_id=".$id;

		$datas = $bdd->query($sql);

		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }

		return $count; // Accès au résultat
    }

//__Suppression d'une catégorie
    function getDeleteCategory( $id ) {
        $bdd = parent::getBdd();

		$sql = "DELETE FROM markers_icone";
		$sql .= " WHERE icone_id=".$id;

		$datas = $bdd->query($sql);

		if ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count = $resultat;
        }

		return $count; // Accès au résultat
    }
}
