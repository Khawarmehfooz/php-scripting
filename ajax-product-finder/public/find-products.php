<?php 
include('../private/initialize.php');

if(is_get_request()){
      $product_type_id = $_GET['product-type']??'';
      $products = find_product_with_product_type_id($product_type_id);
}
while($product = mysqli_fetch_assoc($products)){
?>

<div class="product-card">
    <h1 class="product-name"><?php echo $product['product_name'] ?></h1>
    <img class="product-img" src="./images/product-img.png" alt="">
    <p class="product-short-description"><?php echo $product['product_short_description']; ?></p>
</div>
<?php }?>