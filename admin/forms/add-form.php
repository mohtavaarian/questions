<!-- header -->
<?php $title="افزودن فرم"; include '../../includes/header.php'; ?>
<!-- // header -->

<form method="POST">
    <label for="title">عنوان</label>
    <input name="title" id="title" type="text">
    <br />
    <label for="urls">نامک</label>
    <input name="urls" id="urls" type="text">
    <br />
    <label for="summary">توضیحات</label>
    <textarea name="summary" id="summary"></textarea>

    <input type="submit" name="create" id="create" value="ارسال فرم">
</form>



<?php



    if(isset($_POST["create"])){
        $title = $_POST['title'];
        $urls = $_POST['urls'];
        $summary = $_POST['summary'] ;
        $created_date = date('y-m-d');

        $sql = "INSERT INTO forms (title,urls,summary,created_date)
        VALUES ('$title','$urls','$summary','$created_date')";

        if ($conn->query($sql) === TRUE) {
            header("Location: edit/$urls");
            exit();
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }
        
       
        
        



?>


<!-- header -->
<?php include '../../includes/footer.php'; ?>
<!-- // header -->