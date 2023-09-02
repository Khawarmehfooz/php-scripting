<?php 
  include('../private/initialize.php');
    $sectors = select_all_sectors();
    // 
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- css -->
    <link rel="stylesheet" href="./css/style.css" />
    <!-- js -->
    <script src="./js/script.js" defer></script>
    <title>Ajax Product Finder</title>
  </head>
  <body>
    <main>
      <h1>Ajax Product Finder</h1>
      <form action="">
        <div class="form-group">
          <select name="sectors" id="sectors">
            <option value="">Sectors</option>
            <?php while($sector = mysqli_fetch_assoc($sectors)){ 
              $sector_value = $sector['id'];
            ?>
            <option value="<?php echo $sector_value; ?>"><?php echo $sector['sector_name']; ?></option>
            <?php 
              $sector_childs = find_sector_child_by_sector_id($sector['id']);
              while($sector_child = mysqli_fetch_assoc($sector_childs)){;
            ?>
            <option value="<?php echo $sector_child['id'] ?>">&nbsp;&nbsp;- <?php echo $sector_child['sector_child_name'] ?></option>
            <?php }} ?>
          </select>
        </div>
        <div class="form-group">
          <select name="product-type" id="product-type">
            <option value="">Product Type</option>
          </select>
        </div>
        <button id="search-btn">Search</button>
      </form>
    </main>
    <!-- products container -->
    <section class="products" id="products-container">
      
    </section>
  </body>
</html>
