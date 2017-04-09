<html>
<body>

<form action="pic.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="dp">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
if ($_FILES["dp"]["size"] < 700000)
            {
                $imagename=uniqid();
                move_uploaded_file($_FILES["dp"]["tmp_name"],'uploads/'.$imagename.'.jpg');
            }
?>
</body>
</html>