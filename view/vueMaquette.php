<?php include("view/template/vueHeader.php");  ?>
<body>
        <div class="container">
            <form class="form-inline" action="maquette.php" method="post">
                <div class="form-group">
                      <select name="filiere" class="form-control">
                        <?php foreach ($allFilieres as $allFiliere) : ?>
                          <option value="<?php echo $allFiliere->code_filiere ?>" <?php echo ($allFiliere->code_filiere == $filiere) ? "selected" : ""; ?>><?php echo $allFiliere->code_filiere ?></option>
                      <?php endforeach; ?>
                      </select>
                 </div>
                 <div class="form-group">
                       <select name="semestre" class="form-control">
                         <?php foreach ($allSemestres as $allSemestre) : ?>
                           <option value="<?php echo $allSemestre->semestre ?>" <?php echo ($allSemestre->semestre == $semestre) ? "selected" : ""; ?>><?php echo $allSemestre->semestre ?></option>
                         <?php endforeach; ?>
                       </select>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

    <div class="container">
      <h2>CODE FILIERE : <?php echo $filiere ?></h2>
      <p>SEMESTRE : <?php echo $semestre ?></p>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Code UE</th>
            <th>UE</th>
            <th>ECU</th>
            <th>Crédit ECUE</th>
            <th>CECT</th>
          </tr>
        </thead>
        <tbody>
  <?php if(isset ($getMaquette)) { ?>
        <?php foreach ($getMaquette as $maquette) : ?>
          <tr>
            <td><?php echo $maquette->code_ue ?></td>
            <td><?php echo $maquette->lib_ue ?></td>
            <td><?php echo $maquette->lib_ecue ?></td>
            <td><?php echo $maquette->credit_ecue ?></td>
            <td><?php echo $maquette->credit_ue ?></td>
          </tr>
      <?php endforeach; ?>
  <?php } ?>
        </tbody>
      </table>
    </div>

</body>
</html>
