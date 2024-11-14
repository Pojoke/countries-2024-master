
    

<?php

require_once "action.php";
include "header.php";
include "menu.php";
$autorized = false;
if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    //echo "$login  $password";
    if (check_autorize($login, $password)) {
        $autorized = true;
        echo "Hello, $login";
        if (check_admin($login, $password)) {
            echo "<a href='hello.php?login=$login'>Просмотр отчета</a>";
        }
    } else {
        echo "You are not registered";
    }
}
$user_form = '<h3>Register</h3><form action="' . $_SERVER['PHP_SELF'] . '" method="post" name="autoForm">
<input type="text" name="login" class="form-control1 mb-3 mt-3"  placeholder="Input login">
<input type="password" name="pass" class="form-control1 mb-3"  placeholder="Input password">
<input type="submit"   value="Register" name="go" class=" btn btn-success mt-2 mb-4">
</form>';

if (!$autorized) {
    echo $user_form;
}

$str_form_s = '<h3>Сортировать по:</h3>
<form action="content.php" method="post" name="sort_form" ">
    <select name="sort" id="sort" size="1">
        <option value="name" >назва </option>
        <option value="area" >площа</option>
        <option value="population" >среднє населення</option>
    </select>
    <input type="submit" name="submit" class="btn btn-info my-3" value="OK" >
</form>';
echo $str_form_s;

if (isset($_POST["sort"])) {
    $how_to_sort = $_POST["sort"];
    sorting($how_to_sort);

    $out = out_arr();

    if (count($out) > 0) {
        foreach ($out as $row) {
            echo $row;
        }
    } else {
        echo "Нет данных";
    }
}

$str_form_search = "
<div class=\"container\">
    <h3>Search:</h3>
    <form name='searchForm' action='content.php' method='post' onSubmit='return overify_login(this);'>
        <input type='text' name='search' class='form-control'>
        <input type='submit' name='gosearch' value='Confirm' class='btn btn-secondary my-2'>
        <input type='reset' name='clear' value='Reset' class='btn btn-secondary my-2'>
    </form>
</div>";

echo $str_form_search;

if (isset($_POST['gosearch'])) {
    $data = test_input($_POST['search']);
    $out = out_search($data);

// виклик функції out_arr() з action.php для отримання массиву
    if (count($out) > 0) {
        foreach ($out as $row) { //вывод массива построчно
            echo $row;
        }
    } else // если нет данных
    {
        echo "Nothing found...";
    }
}
include "footer.php";
?>

