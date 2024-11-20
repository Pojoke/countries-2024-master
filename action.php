<?php
require_once "db.php";

// function check_autorize($log, $pass)
// {
//     global $users;
//     return array_key_exists($log, $users) && $pass == $users[$log]['pass'];
// }

// if (check_autorize('rodger', 'qwerty455')) {
//     echo "Yes";
// } else {
//     echo "No";
// }

// function check_admin($log, $pass)
// {
//     global $users;
//     //echo $users[$log]['role'];
//     return check_autorize($log, $pass) && $users[$log]['role'] == 'admin';
// }

// if (check_admin('alex', 'admin2233')) {
//     echo "Yes";
// } else {
//     echo "No";
// }

function genres($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["genres"] < $b["genres"]) {
        return -1;
    } elseif ($a["genres"] == $b["genres"]) {
        return 0;
    } else {
        return 1;
    }

}

function price($a, $b)
{ // функция, определяющая способ сортировки (по названию столицы)
    if ($a["price"] < $b["price"]) {
        return -1;
    } elseif ($a["price"] == $b["price"]) {
        return 0;
    } else {
        return 1;
    }

    
}


function name($a, $b)
{ 
    if ($a="name-book" < $b="name-book") {
        return -1;
    } elseif ($a="name-book" == $b="name-book") {
        return 0;
    } else {
        return 1;
    } 

}

function year($a, $b) 
{  
    if ($a["year"] < $b["year"]) {
        return -1;
    } elseif ($a["year"] == $b["year"]) {
        return 0;
    } else {
        return 1;
    }
}

function exemp($a, $b) 
{  
    if ($a["exemp"] < $b["exemp"]) {
        return -1;
    } elseif ($a["exemp"] == $b["exemp"]) {
        return 0;
    } else {
        return 1;
    }
}

function autor($a, $b)

{ 
    if ($a["autor"]["thir"] < $b["autor"]["thir"]) {
        return -1;
    } elseif ($a["autor"]["thir"] == $b["autor"]["thir"]) {
        return 0;
    } else {
        return 1;
    } 
    

}

function sorting($how_to_sort)
{
    global $countries;
    uasort($countries, $how_to_sort);
}

function out_arr()
{
    global $countries;
    // делаем переменную $countries глобальной
    
    $arr_out = [];
    $arr_out[] = "<div ><table class='table table-hover text-black-20'>";
    $arr_out[] = "<tr ><td>№</td><td>Назва книги</td><td>Жанр</td><td>Ціна в грн</td><td>Ім'я автора </td><td>Прізвище </td> <td>Кількість</td><td>Рік</td></tr>";
    foreach ($countries as $country) {
        static $i = 1;
        //статическая глобальная переменная-счетчик
        $str = "<tr>";
        $str .= "<td>" . $i . "</td>";
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                $str .= "<td >$value</td>";
            } else {
                foreach ($value as $k => $v) {
                    $str .= "<td>$v</td>";
                }

            }

        }
        // $str .= "<td>" . (array_sum($country['autor']) / count($country['autor'])) . "</td>";
        $str .= "</tr>";
        $arr_out[] = $str;
        $i++;
    }
    $arr_out[] = "</table> <div/>";
    return $arr_out;
}

function out_arr_search(array $arr_index = null)
{
   
    global $countries; // делаем переменную $countries глобальной
    $arr_out = array();
    $arr_out[] = '<div class="container"><table  class="table table-hover text-black-20">';
    $arr_out[] = "<tr><td>№</td><td>Name</td><td>
    genres</td><td>price UAH</td><td>name-autor</td><td>surname</td><td>number of books</td><td>year</td></tr>";
    foreach ($countries as $index => $country) {
        if ($arr_index != null && in_array($index, $arr_index)) {
            static $i = 1;
            $str = "<tr>" . "<td>" . $i . "</td>";
            foreach ($country as $key => $value) {
                if (!is_array($value)) {
                    $str .= "<td>$value</td>";
                } else {
                    
                    foreach ($value as $k => $v) {
                        $str .= "<td>$v</td>";

                    }

                }
            }
            // $str .= "<td>" . (array_sum($country['autor']) / count($country['autor'])) . "</td></tr>";
            $arr_out[] = $str;
            $i++;
        }
      
            
        
    }
    $arr_out[] = "</table></div>";

    return $arr_out;
}

function out_search($data)
{
    global $countries; // делаем переменную $countries глобальной
    $arr_index = [];
    foreach ($countries as $country_number => $country) {
        foreach ($country as $key => $value) {
            if (!is_array($value)) {
                if (stristr($value, $data)) {
                    $arr_index[] = $country_number;
                }
            } else {
                foreach ($value as $k => $v) {
                    if (stristr($v, $data) || strstr($k, $data)) {
                        $arr_index[] = $country_number;
                    }
                }
            }
        }
    }
    return out_arr_search(array_unique($arr_index));
}

function test_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}



function get_users()
{
    global $users;
    return $users;
}
