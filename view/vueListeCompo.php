<?php include("view/template/vueHeader.php");  ?>
<body>
        <div class="container">
            <form class="form-inline" action="listeCompo.php" method="post">
                <div class="form-group">
                      <select name="filiere" class="form-control">
                        <?php foreach ($allFilieres as $allFiliere) : ?>
                          <option value="<?php echo $allFiliere->code_filiere ?>" <?php echo ($allFiliere->code_filiere == $filiere) ? "selected" : ""; ?>><?php echo $allFiliere->code_filiere ?></option>
                      <?php endforeach; ?>
                      </select>
                 </div>
                 <div class="form-group">
                       <select name="niveau" class="form-control">
                         <?php foreach ($allNiveaux as $allNiveau) : ?>
                           <option value="<?php echo $allNiveau->niveau ?>" <?php echo ($allNiveau->niveau == $niveau) ? "selected" : ""; ?>><?php echo $allNiveau->niveau ?></option>
                         <?php endforeach; ?>
                       </select>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    <div class="container">
      <h2>CODE FILIERE : <?php echo $filiere ?></h2>
      <p>NIVEAU : <?php echo $niveau ?></p>
      <table class="table table-bordered table-hover">
        <thead class="thead-default">
          <tr>
            <th>NCE</th>
            <th>NOM</th>
            <th>PRENOMS</th>
            <th>DATE NAISSANCE</th>
            <th>LIEU NAISSANCE</th>
            <th>SEXE</th>
          </tr>
        </thead>
        <tbody>
  <?php if(isset ($getEtudiant)) { ?>
        <?php foreach ($getEtudiant as $etudiant) : ?>
          <tr>
            <td><?php echo $etudiant->nce ?></td>
            <td><?php echo $etudiant->nom ?></td>
            <td><?php echo $etudiant->prenom ?></td>
            <td><?php echo $etudiant->dateNaiss ?></td>
            <td><?php echo $etudiant->lieuNais ?></td>
            <td><?php echo $etudiant->sexe ?></td>
          </tr>
      <?php endforeach; ?>
  <?php } ?>
        </tbody>
      </table>
    </div>

</body>
</html>
