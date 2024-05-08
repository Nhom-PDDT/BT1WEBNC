<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>File Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file[]" id="fileInput" multiple>
        <input type="submit" value="Upload" name="submit">
    </form>
    <?php include 'fileList.php'; ?>
</body>
</html>
