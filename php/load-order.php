<?php

  session_start();

  include('connect.php');

  if (isset($_POST['acceptFalse'])){
    $stmt = $pdo->query('SELECT * FROM orders WHERE status=0');
    $count = $stmt->rowCount();
    if ($count > 0) {
    $i = 1;
    
    ?>
  
      <?php foreach($stmt as $row) { ?>
        <tr class="<?php/* <?= $row['zaplacil']==0 ? 'text-danger' : 'text-success' ?> */ ?>" >
          <td class="tdu1"><?= $i; ?></td>
          <td class="tdu2"><?= $row['imie'] ?></td>
          <td class="tdu3"><?= $row['co'] ?></td>
          <td class="tdu4"><?= $row['cena'] ?></td>
          <td class="tdu5"></td>
          <?php if ($_SESSION["page"] == "user"){ ?>
          <td class="tdu6">
            <?php if ($row['zaplacil']==0) {
              echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" class="btn btn-outline-danger btn-xs disabled">Nie</button></div>';
            } else {
              echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" class="btn btn-outline-success btn-xs disabled">Tak</button></div>';
            }
            ?>
          </td>
          <?php } else if ($_SESSION["page"] == "admin"){ ?>
          <td class="tda6">
            <?php if ($row['zaplacil']==0) {
              echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" id="btnZaplacil" value="'.$row['id'].'" zaplacil="1" class="btn btn-outline-danger btn-xs">Nie</button></div>';
            } else {
              echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" id="btnZaplacil" value="'.$row['id'].'" zaplacil="0" class="btn btn-outline-success btn-xs">Tak</button></div>';
            }
            ?>
          </td>
          <?php } ?>
          <?php if ($_SESSION["page"] == "admin"){ ?>
            <td class="tda7">
                <div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-outline-success" id="btnAccept" value="<?= $row['id'] ?>" >Akceptuj</button>

                  <button type="button" class="btn btn-outline-danger" id="btnDelete" value="<?= $row['id'] ?>">Usuń</button>
                </div>
            </td>
          <?php } ?>
        </tr>
      <?php $i++; } ?>


    <?php } else {
      echo "Brak zamowien!";
    }
  } else if (isset($_POST['acceptTrue'])){
      $stmt = $pdo->query('SELECT * FROM orders WHERE status=1 ORDER BY co ASC');
      $count = $stmt->rowCount();
      if ($count > 0) {
      $i = 1; ?>

        <?php foreach($stmt as $row) { ?>
          <tr class="<?php /* <?= $row['zaplacil']==0 ? 'text-danger' : 'text-success' ?> */ ?>  " >
            <td class="tdu1"><?= $i; ?></td>
            <td class="tdu2"><?= $row['imie'] ?></td>
            <td class="tdu3"><?= $row['co'] ?></td>
            <td class="tdu4"><?= $row['cena'] ?></td>
            <td class="tdu5"></td>
            <?php if ($_SESSION["page"] == "user"){ ?>
            <td class="tdu6">
              <?php if ($row['zaplacil']==0) {
                echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" class="btn btn-outline-danger btn-xs disabled">Nie</button></div>';
              } else {
                echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" class="btn btn-outline-success btn-xs disabled">Tak</button></div>';
              }
              ?>
            </td>
            <?php } else if ($_SESSION["page"] == "admin"){ ?>
            <td class="tda6">
              <?php if ($row['zaplacil']==0) {
                echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" id="btnZaplacil" value="'.$row['id'].'" zaplacil="1" id="btnZaplacil" value="'.$row['id'].'" zaplacil="1" class="btn btn-outline-danger btn-xs">Nie</button></div>';
              } else {
                echo '<div class="btn-group btn-group-xs" role="group" aria-label="Basic example"><button type="button" id="btnZaplacil" value="'.$row['id'].'" zaplacil="0" id="btnZaplacil" value="'.$row['id'].'" zaplacil="1" class="btn btn-outline-success btn-xs">Tak</button></div>';
              }
              ?>
            </td>
            <?php } ?>
            <?php if ($_SESSION["page"] == "admin"){ ?>
              <td class="tda7">
                <div class="btn-group btn-group-xs" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-outline-primary" id="btnEdit" value="<?= $row['id'] ?>" data-toggle="modal" data-target="#modalEdit">Edytuj</button>
                  <button type="button" class="btn btn-outline-danger" id="btnDelete" value="<?= $row['id'] ?>">Usuń</button>
                </div>
              </td>
            <?php } ?>
          </tr>
        <?php $i++; } ?>


      <?php } else {
        echo "Brak zamowien!";
      }
  }

ob_end_flush();
?>
