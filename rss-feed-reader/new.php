  $xml = simplexml_load_file($rss_feed_url);
  $max_items = 10;
  if ($xml) {
    echo "<h2>" . $xml->channel->title . "</h2>";
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
          <td><?php echo $link; ?></td>
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

