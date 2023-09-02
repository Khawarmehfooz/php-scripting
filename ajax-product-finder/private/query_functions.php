<?php
function select_all_sectors(){
    global $db;
    $sql = "SELECT * FROM sector";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}
function find_sector_child_by_sector_id($sector_id){
    global $db;
    $sql = "SELECT * FROM sector_childs ";
    $sql .= "WHERE sector_id= '" . $sector_id . "'";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}
function find_product_type_with_sector_child_id($sector_child_id){
    global $db;
    $sql = "SELECT * FROM product_types ";
    $sql .= "WHERE sector_child_id='" . $sector_child_id . "'";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;

}
function find_product_with_product_type_id($product_type_id){
    global $db;
    $sql = "SELECT * FROM products ";
    $sql.= "WHERE product_type='". $product_type_id . "'";
    $result = mysqli_query($db,$sql);
    confirm_result_set($result);
    return $result;
}