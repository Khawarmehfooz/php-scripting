<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
    <!-- css -->
    <link rel="stylesheet" href="./assets/stylesheets/style.css">
    <!-- js -->
    <script defer src="./assets/scripts/script.js"></script>
</head>

<body>
    <main>
        <h1>Upload File</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
            <div class="file__preview">
                <img id="img" src="" alt="">
                <p>No File Choosen</p>
                <label onclick="defaultBtnActive()" role="button" id="file__label">Choose File</label>
            </div>

            <input type="file" name="file" id="file" hidden>
            <input type="submit" value="Upload" name="submit">
        </form>
        <?php
        if (isset($_POST["submit"])) {
            $file = $_FILES["file"];
            // File Details
            $file_name = $file["name"];
            $file_tmp_path = $file["tmp_name"];
            $file_size = $file["size"];
            $file_error = $file["error"];

            if ($file_error === UPLOAD_ERR_OK) {
                $uploadDirectory = "./assets/uploads/";
                $unique_file_name = uniqid() . "-" . $file_name;
                $destination = $uploadDirectory . $unique_file_name;
                if (move_uploaded_file($file_tmp_path, $destination)) {
                    echo "File Uploaded Successfully";
                } else {
                    echo "error";
                }
            } else {

                echo "error during file upload";
                echo UPLOAD_ERR_NO_FILE;
            }
        }
        ?>
    </main>
</body>

</html>