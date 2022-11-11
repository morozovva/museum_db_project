<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>База данных музея</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="project/main/main.css">
<!--    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>-->
<!--    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">-->
</head>

<body>
      <script src="/bootstrap/js/bootstrap.bundle.min.js"> </script>

      <!-- <script id="replace_with_header" src="/project/header_/header.js"></script> -->
      <script id="add_nav" src="/project/nav/nav.js"></script>

      <div class="container p-4">
          <h2>Предметы</h2>
          <?php include 'project/tables/items_tb.php';?>
      </div>

      <div class="container p-4">
          <h3>Добавить запись</h3>
          <form action="project/add/items_add.php" method="post">
              <div class="form-group">
                  <div class="row">
                      <div class="col-6">
                          <label for="appearance">Описание</label>
                          <input type="text" class="form-control" id="appearance" name="appearance" placeholder="Введите описание">
                          <label for="origin">Происхождение</label>
                          <input type="text" class="form-control" id="origin" name="origin" placeholder="Введите происхождение">
                          <label for="date_of_admission">Дата поступления</label>
                          <input type="datetime-local" max="" class="form-control" id="date_of_admission" name="date_of_admission" placeholder="Введите дату поступления">
                      </div>
                      <div class="col-6">
                          <label for="record_number">Номер записи в инвентарной книге</label>
                          <select class="form-select" id="record_number" name="record_number">
                              <option value="NULL" selected disabled>Введите номер записи в инвентарной книге</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM inventory_book';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["record_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Номер книги: ". $row["book_number"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="act_number">Номер акта приема</label>
                          <select class="form-select" id="act_number" name="act_number">
                              <option value="NULL" disabled selected>Введите номер акта приема</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM act_of_accepting_an_object';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["act_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Идентификатор сотрудника: ". $row["employee_id"] . ", файл документа: ". $row["document_file"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="cell_number">Номер ячейки на складе</label>
                          <select class="form-select" id="cell_number" name="cell_number">
                              <option value="NULL" selected disabled>Введите номер ячейки на складе</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM storage_place WHERE vacant = "0"';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["cell_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Занятость: ". $row["vacant"] . ", сектор: ". $row["sector"] .")" . "</option>";
                              }
                              ?>
                          </select>
                      </div>
                  </div>


<!--                  <label for="date_of_dismissal">Дата списания</label>-->
<!--                  <input type="datetime-local" class="form-control" id="date_of_dismissal" name="date_of_dismissal" placeholder="Введите дату списания">-->
              </div>
              <br>
              <button type="submit" class="btn btn-dark float-end">Добавить</button>
          </form>
      </div>


      <div class="container p-4">
          <h3>Удалить запись</h3>
          <form action="project/delete/items_del.php" method="post">
              <div class="form-group">
                  <div class="row">
                      <div class="col-6">
                          <label for="appearance">Идентификатор</label>
                          <input type="number" min="1" step="1" class="form-control" id="item_id" name="item_id" placeholder="Введите идентификатор">
                          <label for="appearance">Описание</label>
                          <input type="text" class="form-control" id="appearance" name="appearance" placeholder="Введите описание">
                          <label for="origin">Происхождение</label>
                          <input type="text" class="form-control" id="origin" name="origin" placeholder="Введите происхождение">
<!--                          TODO: add date of adm constraint-->
                          <label for="date_of_admission">Дата поступления</label>
                          <input type="datetime-local" class="form-control" id="date_of_admission" name="date_of_admission" max="<?= date('YYYY-MM-DDTHH:ii'); ?>" placeholder="Введите дату поступления">
                      </div>
                      <div class="col-6">
                          <label for="record_number">Номер записи в инвентарной книге</label>
                          <select class="form-select" id="record_number" name="record_number">
                              <option value="NULL" selected disabled>Введите номер записи в инвентарной книге</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM inventory_book';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["record_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Номер книги: ". $row["book_number"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="act_number">Номер акта приема</label>
                          <select class="form-select" id="act_number" name="act_number">
                              <option value="NULL" disabled selected>Введите номер акта приема</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM act_of_accepting_an_object';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["act_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Идентификатор сотрудника: ". $row["employee_id"] . ", файл документа: ". $row["document_file"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="cell_number">Номер ячейки на складе</label>
                          <select class="form-select" id="cell_number" name="cell_number">
                              <option value="NULL" selected disabled>Введите номер ячейки на складе</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM storage_place';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["cell_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Занятость: ". $row["vacant"] . ", сектор: ". $row["sector"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="date_of_dismissal">Дата списания</label>
                          <input type="datetime-local" class="form-control" id="date_of_dismissal" name="date_of_dismissal" placeholder="Введите дату списания">
                      </div>
                      </div>
                  </div>
              <br>
              <button type="submit" class="btn btn-dark float-end">Удалить</button>
          </form>
      </div>

      <div class="container p-4">
          <h3>Изменить запись</h3>
          <form action="project/update/items_update.php" method="post">
              <div class="row">
                  <div class="col-6">
                      <label for="condition" style="font-weight: bold">Где</label>
                      <div class="form-group">
                          <label for="appearance">Идентификатор</label>
                          <input type="number" min="1" step="1" class="form-control" id="w_item_id" name="w_item_id" placeholder="Введите идентификатор">
                          <label for="appearance">Описание</label>
                          <input type="text" class="form-control" id="w_appearance" name="w_appearance" placeholder="Введите описание">
                          <label for="origin">Происхождение</label>
                          <input type="text" class="form-control" id="w_origin" name="w_origin" placeholder="Введите происхождение">
                          <label for="date_of_admission">Дата поступления</label>
                          <input type="datetime-local" class="form-control" id="w_date_of_admission" name="w_date_of_admission" placeholder="Введите дату поступления">
                          <label for="record_number">Номер записи в инвентарной книге</label>
                          <select class="form-select" id="w_record_number" name="w_record_number">
                              <option value="NULL" selected disabled>Введите номер записи в инвентарной книге</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM inventory_book';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["record_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Номер книги: ". $row["book_number"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="act_number">Номер акта приема</label>
                          <select class="form-select" id="w_act_number" name="w_act_number">
                              <option value="NULL" disabled selected>Введите номер акта приема</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM act_of_accepting_an_object';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["act_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Идентификатор сотрудника: ". $row["employee_id"] . ", файл документа: ". $row["document_file"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="cell_number">Номер ячейки на складе</label>
                          <select class="form-select" id="w_cell_number" name="w_cell_number">
                              <option value="NULL" selected disabled>Введите номер ячейки на складе</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM storage_place';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["cell_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Занятость: ". $row["vacant"] . ", сектор: ". $row["sector"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="date_of_dismissal">Дата списания</label>
                          <input type="datetime-local" class="form-control" id="w_date_of_dismissal" name="w_date_of_dismissal" placeholder="Введите дату списания">
                      </div>
                  </div>
                  <div class="col-6">
                      <label for="change" style="font-weight: bold">Изменить</label>
                      <div class="form-group">
                          <label for="appearance">Идентификатор</label>
                          <input type="number" min="1" step="1" class="form-control" id="s_item_id" name="s_item_id" placeholder="Введите идентификатор">
                          <label for="appearance">Описание</label>
                          <input type="text" class="form-control" id="s_appearance" name="s_appearance" placeholder="Введите описание">
                          <label for="origin">Происхождение</label>
                          <input type="text" class="form-control" id="s_origin" name="s_origin" placeholder="Введите происхождение">
                          <label for="date_of_admission">Дата поступления</label>
                          <input type="datetime-local" class="form-control" id="s_date_of_admission" name="s_date_of_admission" placeholder="Введите дату поступления">
                          <label for="record_number">Номер записи в инвентарной книге</label>
                          <select class="form-select" id="s_record_number" name="s_record_number">
                              <option value="NULL" selected disabled>Введите номер записи в инвентарной книге</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM inventory_book';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["record_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Номер книги: ". $row["book_number"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="act_number">Номер акта приема</label>
                          <select class="form-select" id="s_act_number" name="s_act_number">
                              <option value="NULL" disabled selected>Введите номер акта приема</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM act_of_accepting_an_object';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["act_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Идентификатор сотрудника: ". $row["employee_id"] . ", файл документа: ". $row["document_file"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="cell_number">Номер ячейки на складе</label>
                          <select class="form-select" id="s_cell_number" name="s_cell_number">
                              <option value="NULL" selected disabled>Введите номер ячейки на складе</option>
                              <?php
                              $conn = mysqli_connect("localhost", "root", "root", "museum_database");
                              $sql = 'SELECT * FROM storage_place WHERE vacant = "0"';
                              $result = $conn->query($sql);
                              var_dump($result);
                              while($row = $result-> fetch_assoc()) {
                                  $temp = $row["cell_number"];
                                  echo '<option value="'. $temp.'" >' . $temp . " (Занятость: ". $row["vacant"] . ", сектор: ". $row["sector"] .")" . "</option>";
                              }
                              ?>
                          </select>
                          <label for="date_of_dismissal">Дата списания</label>
                          <input type="datetime-local" class="form-control" id="s_date_of_dismissal" name="s_date_of_dismissal" placeholder="Введите дату списания">
                      </div>
                  </div>
              </div>
              <br>
              <button type="submit" class="btn btn-dark float-end">Изменить</button>
          </form>
          <br><br><br>
      </div>

<!--      <div class="container p-4">-->
<!--          <h3>Ввести запрос на вывод</h3>-->
<!--          <form action="project/query/positions_query.php" method="post">-->
<!--              <div class="form-group">-->
<!--                  <label for="duties">Выбрать</label>-->
<!--                  <input type="text" class="form-control" id="duties" name="duties" aria-describedby="dutiesHelp" placeholder="Введите должность">-->
<!--              </div>-->
<!--              <br>-->
<!--              <button type="submit" class="btn btn-dark">Отправить</button>-->
<!--          </form>-->
<!---->
<!--      </div>-->

</body>
</html>