<?php 
include('../private/initialize.php');

if(is_get_request()){
      $sector_child_id = $_GET['sector_child_id']??'';
      $product_types = find_product_type_with_sector_child_id($sector_child_id);
}
?>
<option value="">Product Type</option>
<?php while($product_type = mysqli_fetch_assoc($product_types)){ ?>
<option value="<?php echo $product_type['id'] ?>"><?php echo $product_type['product_name'] ?></option>
<?php }?>