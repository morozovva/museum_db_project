<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>База данных музея</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="project/main/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!--    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>-->
    <!--    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.5.3/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">-->
</head>

<body>

<script>
</script>

<script src="/bootstrap/js/bootstrap.bundle.min.js"> </script>

<!-- <script id="replace_with_header" src="/project/header_/header.js"></script> -->
<script id="add_nav" src="/project/nav/nav.js"></script>

<script>
    function doHTML(list){
        let string ="";
        let index = 0;
        list.forEach(element => {
            string += `<option value="${index}">${element}</option>`;
            index+=1;
        });
        return string;
    }

    function dynamicdropdown(choise, dif){
        let def = [];
        let act = ['Номер акта', 'Идентификатор сотрудника', 'Документ'];
        let archive = ['Номер книги в архиве'];
        let employee = ['Идентификатор', 'Идентификатор должности', "Фамилия", "Имя", "Отчество", "Номер телефона", "Дата рождения", "Дата принятия на работу", "Дата увольнения", "Статус"];
        let fpc_visit = ['Номер визита', 'Решение ФЗК', "Идентификатор предмета"];
        let book = ['Номер записи', "Номер книги"];
        let item = ['Идентификатор предмета', 'Описание', 'Происхождение', 'Дата поступления','Номер записи в инвентарной книге','Номер акта приема','Номер ячейки на складе','Дата списания'];
        let positions = ['Идентификатор', 'Должность'];
        let storage = ['Номер ячейки на складе', 'Доступность', 'Сектор'];
        let genDropdown = document.getElementById(dif);
        switch (choise) {
            case "act_of_accepting_an_object":
                genDropdown.innerHTML = doHTML(act);
                break;
            case "archive":
                genDropdown.innerHTML = doHTML(archive);
                break;
            case "employee":
                genDropdown.innerHTML = doHTML(employee);
                break;
            case "fpc_visit":
                genDropdown.innerHTML = doHTML(fpc_visit);
                break;
            case "inventory_book":
                genDropdown.innerHTML = doHTML(book);
                break;
            case "item":
                genDropdown.innerHTML = doHTML(item);
                break;
            case "positons":
                genDropdown.innerHTML = doHTML(positions);
                break;
            case "storage_place":
                genDropdown.innerHTML = doHTML(storage);
                break;
            case "":
                genDropdown.innerHTML = doHTML(def);
        }
    }
</script>

<script>
    function doHTMLwithDef(list){
        let string ="<option value=''>умолчанию</option>";
        let index = 0;
        list.forEach(element => {
            string += `<option value="${index}">${element}</option>`;
            index+=1;
        });
        return string;
    }

    function getChosen(select, from) {
        let def = [];
        let act = ['Номер акта', 'Идентификатор сотрудника', 'Документ'];
        let archive = ['Номер книги в архиве'];
        let employee = ['Идентификатор', 'Идентификатор должности', "Фамилия", "Имя", "Отчество", "Номер телефона", "Дата рождения", "Дата принятия на работу", "Дата увольнения", "Статус"];
        let fpc_visit = ['Номер визита', 'Решение ФЗК', "Идентификатор предмета"];
        let book = ['Номер записи', "Номер книги"];
        let item = ['Идентификатор предмета', 'Описание', 'Происхождение', 'Дата поступления','Номер записи в инвентарной книге','Номер акта приема','Номер ячейки на складе','Дата списания'];
        let positions = ['Идентификатор', 'Должность'];
        let storage = ['Номер ячейки на складе', 'Доступность', 'Сектор'];
        var selected = []; var res = [];
        let arr = getChosen1(from);
        switch (arr) {
            case "def":
                res = def;
                break;
            case "act_of_accepting_an_object":
                res = act;
                break;
            case "archive":
                res = archive;
                break;
            case "employee":
                res = employee;
                break;
            case "fpc_visit":
                res = fpc_visit;
                break;
            case "inventory_book":
                res = book;
                break;
            case "positons":
                res = positions;
                break;
            case "storage_place":
                res = storage;
                break;
            case "item":
                res = item;
                break;
        }
        for (var option of document.getElementById(select).options)
        {
            if (option.selected) {
                selected.push(res[option.value]);
            }
        }
        let dropSort = document.getElementById("sort");
        dropSort.innerHTML = doHTMLwithDef(selected);
        let dropFind = document.getElementById("like");
        // document.getElementById("group").innerHTML = doHTMLwithDef(selected);
        dropFind.innerHTML = doHTMLwithDef(selected);
    }

    function getChosen1(from){
        var selected = "";
        for (var option of document.getElementById(from).options)
        {
            if (option.selected) {
                selected = option.value;
            }
        }
        return selected;
    }
</script>

<div class="container p-4">
    <h3>Ввести запрос на вывод</h3>
    <form action="show_query.php" method="post">
        <div class="form-group">
            <label for="">Из какой таблицы вывести данные?</label>
            <select class="form-select" id="from" name="from" required onchange="javascript:dynamicdropdown(this.options[this.selectedIndex].value, 'select'); javascript:make_join(this.options[this.selectedIndex].value);">
                <option value="" selected disabled>Выберите таблицу для вывода</option>
                <option value="act_of_accepting_an_object">Акты принятия предметов</option>
                <option value="archive">Архивы</option>
                <option value="employee">Сотрудники</option>
                <option value="fpc_visit">Визит в ФЗК</option>
                <option value="inventory_book">Инвентарные книги</option>
                <option value="item">Предметы</option>
                <option value="positons">Должности сотрудников</option>
                <option value="storage_place">Склад</option>
            </select>
            <label for="select">Что вывести?</label>
            <select class="form-select" multiple="multiple" id="select" name="select[]" required onclick="getChosen('select','from')">
                <option value="" selected disabled>Выберите поля для вывода</option>
            </select>
            <label for="sort">Сортировать по</label>
            <div class="row">
                <div class="col-8">
                    <select class="form-select" id="sort" name="sort">
                        <option value="" selected>умолчанию</option>
                    </select>
                </div>
                <div class="col-4">
                    <select class="form-select" id="asc" name="asc">
                        <option value="asc" selected>по возрастанию</option>
                        <option value="desc">по убыванию</option>
                    </select>
                </div>
            </div>
<!--            <label for="sort">Группировать по</label>-->
<!--            <select class="form-select" id="group" name="group">-->
<!--                <option value="" selected>умолчанию</option>-->
<!--            </select>-->
            <div class="row">
                <div class="col-6">
                    <label for="appearance">Сколько записей вывести?</label>
                    <input type="number" min="1" step="1" class="form-control" id="limit" name="limit" placeholder="По умолчанию выведутся все">
                </div>
                <div class="col-6">
                    <label for="appearance">Начиная с</label>
                    <input type="number" min="1" step="1" class="form-control" id="offset" name="offset" placeholder="По умолчанию с 1">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="select">Где?</label>
                    <select class="form-select" id="like" name="like">
                        <option value="" selected disabled>В каком поле хотите найти</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="appearance">Что хотите найти?</label>
                    <input type="text" class="form-control" id="find_what" name="find_what">
                </div>
            </div>


        </div>
        <br>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="background-color: #bcd0c7; color: black">
                        Добавить поля из другой таблицы
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <br>
                    <div class="form-group">
                        <label for="">Выберите вариант соединения</label>
                        <select class="form-select" id="join_type" name="join_type">
                            <option value="inner" selected>Внутреннее соединение</option>
                            <option value="left">Левое соединение</option>
                            <option value="right">Правое соединение</option>
                        </select>
                        <label for="">Из какой таблицы вывести данные?</label>
                        <select class="form-select" id="join_from" name="join_from" onchange="javascript:dynamicdropdown(this.options[this.selectedIndex].value, 'join_select');">
                            <option value="" disabled selected >Выберите таблицу для вывода</option>
                            <script>
                                function make_join(choise) {
                                    let genDropdown1 = document.getElementById('join_from');
                                    let def = "<option value=''>Выберите таблицу для вывода</option>";
                                    let act = "<option value='act_of_accepting_an_object'>Акты принятия предметов</option>";
                                    let archive = "<option value='archive'>Архивы</option>";
                                    let employee = "<option value='employee'>Сотрудники</option>";
                                    let fpc_visit = "<option value='fpc_visit'>Визит в ФЗК</option>";
                                    let book = "<option value='inventory_book'>Инвентарные книги</option>";
                                    let item = "<option value='item'>Предметы</option>";
                                    let positions = "<option value='positons'>Должности сотрудников</option>";
                                    let storage = "<option value='storage_place'>Склад</option>";
                                    switch (choise) {
                                        case "act_of_accepting_an_object":
                                            genDropdown1.innerHTML = def + employee + item;
                                            break;
                                        case "archive":
                                            genDropdown1.innerHTML = def + book;
                                            break;
                                        case "employee":
                                            genDropdown1.innerHTML = def + act + positions;
                                            break;
                                        case "fpc_visit":
                                            genDropdown1.innerHTML = def + item;
                                            break;
                                        case "inventory_book":
                                            genDropdown1.innerHTML = def + archive + item;
                                            break;
                                        case "item":
                                            genDropdown1.innerHTML = def + act + book + fpc_visit + storage;
                                            break;
                                        case "positons":
                                            genDropdown1.innerHTML = def + employee;
                                            break;
                                        case "storage_place":
                                            genDropdown1.innerHTML = def + item;
                                            break;
                                    }
                                }
                            </script>
<!--                            <option value="act_of_accepting_an_object">Акты принятия предметов</option>-->
<!--                            <option value="archive">Архивы</option>-->
<!--                            <option value="employee">Сотрудники</option>-->
<!--                            <option value="fpc_visit">Визит в ФЗК</option>-->
<!--                            <option value="inventory_book">Инвентарные книги</option>-->
<!--                            <option value="item">Предметы</option>-->
<!--                            <option value="positons">Должности сотрудников</option>-->
<!--                            <option value="storage_place">Склад</option>-->
                        </select>
                        <label for="duties">Что вывести?</label>
                        <select class="form-select" multiple id="join_select" name="join_select[]">
                            <option value="NULL" selected disabled>Выберите поля для вывода</option>
                        </select>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-dark float-end">Отправить</button>
    </form>
</div>

<?php //include 'project/query/show_query.php';?>
</body>
</html>

