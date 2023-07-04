<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RSS Feed Reader</title>
  <link rel="stylesheet" href="./assets/stylesheets/style.css" />
</head>

<body>
  <main>
    <h1>RSS Feed Reader</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input type="url" name="url" id="" placeholder="Enter Website Feed URL" />
      <input type="submit" name="submit" value="Read Feed" />
    </form>
  </main>
  <?php

  if (isset($_POST["submit"])) {
    $rss_feed_url = filter_var($_POST["url"], FILTER_SANITIZE_URL);
    $xml = simplexml_load_file($rss_feed_url);
    $max_items = 10;
    if ($xml) {
      echo "<h2 class='site-title'>Site Title: " . $xml->channel->title . "</h2>";

      $counter = 0;
  ?>
      <table border="1">
        <tr>
          <th>Title</th>
          <th>Link</th>
          <th>Description</th>
          <th>Publication Date</th>
        </tr>

        <?php
        foreach ($xml->channel->item as $item) {
          $title = $item->title;
          $link = $item->link;
          $description = $item->description;
          $pub_date = $item->pubDate;
        ?>
          <tr>
            <td><?php echo $title; ?></td>
            <td><a href="<?php echo $link; ?>"><?php echo $link; ?></a></td>
            <td><?php echo $description; ?></td>
            <td><?php echo $pub_date; ?></td>
          </tr>
        <?php
          $counter++;
          if ($counter >= $max_items) {
            break;
          }
        }
        ?>

      </table>
  <?php
    } else {
      echo "Error";
    }
  }

  ?>
</body>

</html>