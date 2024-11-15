
    <?php require_once "action.php";
include "header.php";
include "menu.php";
?>


                    <!-- Post content-->

                    <section class="mb-5">

                            <h1 class="mb-4 mt-5">Home</h1>
                            <p class="fs-5 mb-4">We are Books shop — a place where books come to life, and reading turns into a true delight. In our collection, you will find both modern bestsellers and classic editions, children's literature, and specialized books. We believe that every book has the power to change lives and open new horizons. So, we invite you to join us in exploring the world of stories, knowledge, and inspiration!</p>
                           
                        </section>
                        <!-- Preview image figure-->
                        <img class="d-block mx-auto" src="assets/img/A_banner_image_for_a_bookstore,_measuring_900x400_ 1.jpg" alt="..." />
                        <!-- Post content-->
                        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    
                    <h2 class="mb-5">Genres</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Fantasy</div>
                                    <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/fantasy 1.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Ice Cream</div>
                                    <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/360_F_299184716_4EtpdMWZn5kGY0kSV4hEXIPIFtsmbotV 1.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Strawberries</div>
                                    <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/fant-1 1.jpg" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Workspace</div>
                                    <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/Kb0IX939FQ 1.jpg" alt="..." />
                        </a>
                    </div>
                </div>
            </div>
        </section>

 <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h1 >Our team</h1>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="assets/img/A_portrait_of_a_person_150x150.jpg" alt="..." />
                                <h5 class="fw-bolder">Ibbie Eckart</h5>
                                <div class="fst-italic text-muted">Founder &amp; CEO</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Arden Vasek</h5>
                                <div class="fst-italic text-muted">CFO</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-sm-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Toribio Nerthus</h5>
                                <div class="fst-italic text-muted">Operations Manager</div>
                            </div>
                        </div>
                        <div class="col mb-5">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Malvina Cilla</h5>
                                <div class="fst-italic text-muted">CTO</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




           
<?php

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

