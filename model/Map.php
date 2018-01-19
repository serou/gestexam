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

//__Seletion maquette en fontion de la filiere
    function getMaquette($code_fil, $semestre) {
        $bdd = parent::getBdd();

		$sql = "SELECT *";
		$sql .= " FROM  t_maquette";
		$sql .= " WHERE code_filiere='".$code_fil."' AND semestre = '".$semestre."'";
        $sql .= " ORDER BY  code_ue";

        $datas = $bdd->query($sql);

        $count =  array();
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }

		return $count; // Accès au résultat
    }

//   Seletion de toutes les filiere
            function getAllFiliere() {
                $bdd = parent::getBdd();

        		$sql = "SELECT distinct code_filiere";
        		$sql .= " FROM  t_maquette";

                $datas = $bdd->query($sql);

                $count =  array();
        		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
                    $count[] = $resultat;
                }

        		return $count; // Accès au résultat
            }

//   Seletion de tous les semestre
            function getAllSemestre() {
                $bdd = parent::getBdd();

        		$sql = "SELECT distinct semestre";
        		$sql .= " FROM  t_maquette";

                $datas = $bdd->query($sql);

                $count =  array();
        		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
                    $count[] = $resultat;
                }

        		return $count; // Accès au résultat
            }

//__Seletion des etudiants composants
    function getEtudiant($code_fil, $niveau) {
        $bdd = parent::getBdd();

		$sql = "SELECT *";
		$sql .= " FROM  t_etudiant_inscrit";
		$sql .= " WHERE filiere='".$code_fil."' AND niveau = '".$niveau."'";
        $sql .= " ORDER BY  nom";

        $datas = $bdd->query($sql);

        $count =  array();
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }

		return $count; // Accès au résultat
    }

//   Seletion de tous les niveau
    function getAllNiveau() {
        $bdd = parent::getBdd();

		$sql = "SELECT distinct niveau";
		$sql .= " FROM  t_etudiant_inscrit";

        $datas = $bdd->query($sql);

        $count =  array();
		while ($resultat = $datas->fetch(PDO::FETCH_OBJ)) {
            $count[] = $resultat;
        }

		return $count; // Accès au résultat
    }

}
