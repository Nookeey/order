<?php session_start(); opcache_reset(); ob_start();

$_SESSION['page']='user';
?>

<?php include('_head.php'); ?>
<body>

<?php include('php/load-admin-data.php') ?>



<div class="row" style="padding: 0 10px;">
<div class="col-lg-3 col-xl-2">
  <div id="adminData">
  </div>
</div>



<div class="col-lg-9 col-xl-9  ">
  
  <section class="dodaj">
    <!-- <div class="container"> -->
      <form class="" id="formOrderUser" method="post" action="php/add_order.php" >
        <div class="row">
          <div class="col-md-12 col-lg-6 mb-3">
            <label for="validationCustom01">Imie:</label>
            <input id="fouKto" type="text" class="form-control" name="imie" required>
          </div>
          <div class="col-lg-6 mb-3">
            <label for="validationCustom02">Cena:</label>
            <input id="fouCena" type="number" class="form-control" step="0.01" name="cena" min="0" required>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 mb-3">
            <label for="validationCustom03">Co bym zjadł :)</label>
            <input id="fouCo" type="text" class="form-control" name="co" required>
          </div>
          <div class="col-lg-2">
              <button id="submitOrderUser" type="submit" name="userOrder" class="btn btn-outline-primary baddu">Dodaj</button>
          </div>
        </div>
      </form>
      <div class="row">
        <div class="col-lg-12">
          <div id="info"></div>
        </div>
      </div>
    <!-- </div> -->
  </section>

  <section class="zamowienia">
    <!-- <div class="container"> -->
      <div class="row">
        <div class="col-lg-12">
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
</div>
</div>






<!-- ===== MODAL ===== -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="modalEdit">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <form class="form-inline" style="margin:30px" >

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
        <button type="submit" name="user" class="btn btn-primary">Dodaj</button>
      </form>
    </div>
  </div>
</div>


<?php
 ob_end_flush();
?>


</body>
</html>
