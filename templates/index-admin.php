<?php session_start(); opcache_reset(); ob_start();?>

<?php include('_head.php'); ?>

<body>


<div id="notification">
  
</div>

<?php include('php/load-admin-data.php') ?>

<div class="col-md-2">
  <div id="adminData">
  </div>
</div>

<div class="col-md-7 col-md-offset-1">
  
   <section class="dodaj">
    <!-- <div class="container"> -->
      <form class="" id="formOrderAdmin" method="post" action="php/add_order.php">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="validationCustom01">Imie:</label>
            <input type="text" class="form-control" name="imie" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="validationCustom02">Cena:</label>
            <input type="number" class="form-control" step="0.01" name="cena" min="0" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 mb-3">
            <label for="validationCustom03">Co bym zjadł :)</label>
            <input type="text" class="form-control" name="co" required>
          </div>
          <div class="col-md-2">
              <button id="submitOrderAdmin" type="submit" name="adminOrder" class="btn btn-outline-primary baddu">Dodaj</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-md-12">
          <div id="info"></div>
        </div>
      </div>
    <!-- </div> -->
  </section>

  <section class="usun">
    <div class="row">
      <div class="col-md-12">
      <button id="usunWszystkie" type="submit" class="btn btn-outline-danger baddu pull-right" data-toggle="modal" data-target="#modalUsunWszystkie">Usun wszystkie</button>
    </div>
    </div>
  </section>

  <section class="zamowienia">
    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-md-12">
          <div id="ordersTrue">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nr</th>
                  <th>Imie</th>
                  <th>Co</th>
                  <th>Cena</th>
                  <th>Z dostawa</th>
                  <th>Zaplacone</th>
                  <th>Opcje</th>
                </tr>
              </thead>
              <tbody id="ordsTrue">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </section>
  <hr>

<?php /* NOWE ZAMOWIENIA ============================================= */ ?>

  <section class="newOrders">
    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-md-12">
          <div id="ordersFale">
            <p class="tno">Nowe zamowienia:</p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nr</th>
                  <th>Imie</th>
                  <th>Co</th>
                  <th>Cena</th>
                  <th>Z dostawa</th>
                  <th>Zaplacone</th>
                  <th>Opcje</th>
                </tr>
              </thead>
              <tbody id="ordsFalse">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </section>

</div>



<!-- ===== MODAL USUN WSZYSKIE ===== -->
<div class="modal fade" id="modalUsunWszystkie">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Usun wszystkie</h5>
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Czy na pewno chcesz usunąć wszystkie zamowienia?</p>
      </div>
      <div class="modal-footer">
        <button id="btnuwNie" type="button" class="btn btn-secondary" data-dismiss="modal">NIE</button>
        <button id="btnuwTak" type="button" class="btn btn-primary" data-dismiss="modal">TAK</button>
      </div>
    </div>
  </div>
</div>



<!-- ===== MODAL EDYCJA ZAMOWIENIA ===== -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalEdit">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <form id="formEditData" class="form-inline" method="post" style="margin:30px" >

        <div class="form-group">
          <label for="kto">Kto:</label>
          <input id="inputKto" type="text" class="form-control" name="kto" value="">
        </div>
        <div class="form-group">
          <label for="co">Co: </label>
          <input id="inputCo" type="text" class="form-control" name="co" value="">
        </div>
        <div class="form-group">
          <label for="cena">Cena: </label>
          <input id="inputCena" type="number" step="0.01" class="form-control" name="cena" value="">
        </div>

        <input id="inputId" type="hidden" name="id" value="">
        <button id="btnEditData" type="submit" name="admin" class="btn btn-primary" data-dismiss="modal">Dodaj</button>
      </form>
    </div>
  </div>
</div>

<!-- ===== MODAL ADMIN ===== -->
<?php

?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modalSetAdminData">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form role="form" method="post" id="formSetAdminData" style="margin:30px">
          <div class="modal-body">
              <div class="form-group">
                <label for="imie" class="control-label">Zamawia:</label>
                <input type="text" class="form-control" name="imie" value="<?= $admin['imie'] ?>">
              </div>
              <div class="form-group">
                <label for="miejsce" class="control-label">Miejsce:</label>
                <input type="text" class="form-control" name="miejsce" value="<?= $admin['miejsce'] ?>">
              </div>
              <div class="form-group">
                <label for="link" class="control-label">Link:</label>
                <input type="text" class="form-control" name="link" value="<?= $admin['link'] ?>">
              </div>
              <div class="form-group">
                <label for="co" class="control-label">Nr tel:</label>
                <input type="tel" class="form-control" name="tel" value="<?= $admin['tel'] ?>">
              </div>
              <div class="form-group">
                <label for="cena" class="control-label">Deadline:</label>
                <input id="clockactrue" name="deadline" min="" max="14:00" required class="form-control clockpicker" type="text" value="">
              </div>
          </div>
          <div class="modal-footer">
            <form role="form" action="" method="post"><button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
            <button type="submit" name="admin" id="btnSetAdminData" class="btn btn-primary" data-dismiss="modal">Zatwierdz</button>
          </div>
      </form>

    </div>
  </div>
</div>

<?php
 ob_end_flush();
?>


</body>
</html>

