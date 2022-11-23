<?php
require("../Controllers/service_controller.php");


function getAllCategories(){
    $cats=getAllCategory_ctr();
    echo "
    <select class='custom-select' name='cat_id' id='mybrand' >
    ";
    foreach($cats as $categories){
        $catid=$categories['cat_id'];
        $catname=$categories['cat_name'];
        getcatRow_fnc($catid,$catname);
    }
    echo "</select>";
}
function getcatRow_fnc($catid,$catname){
    echo "
    <option value='$catid'>$catname</option>
    
    ";

}

?>