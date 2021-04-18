<!-- header -->
<?php $title="ویرایش فرم";include '../../includes/header.php'; ?>
<!-- // header -->



<?php

$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$urls = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

if($urls=='edit'){
    header("Location: ../");
    exit();
}

else{

  $sql = "select * FROM forms WHERE urls='$urls' ";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "نام فرم: " . $row["title"]."<br/>";
          $title = $row['title'];
          $urls = $row['urls'] ;
          $summary = $row['summary'];
          echo '
          
          <form method="POST">
              <label for="title">عنوان</label>
              <input name="title"  value="'.$title.'"  id="title" type="text">
              <br />
              <label for="urls">نامک</label>
              <input name="urls" value="'.$urls.'" id="urls" type="text">
              <br />
              <label for="summary">توضیحات</label>
              <textarea name="summary" id="summary">'.$summary.'</textarea>
          
              <input type="submit" name="add" id="add" value="بروزرسانی فرم">
          </form>
          
          ';
          if(isset($_POST["add"])){
              $title = $_POST['title'];
              $urls = $_POST['urls'] ;
              $summary = $_POST['summary'];
              $form_id = $row['id'];

              $sql = "UPDATE forms SET title='$title',urls='$urls',summary='$summary' WHERE id=$form_id";

              if ($conn->query($sql) === TRUE) {
                echo "<script>alert('بروزرسانی با موفقیت انجام شد');</script>";
                header("Location: ../");
                exit();
              } else {
                echo "Error updating record: " . $conn->error;
              }  
              $conn->close();
          }
      }
  } else {
    echo "404";
  }
  


}



?>

<!-- header -->
<?php include '../../includes/footer.php'; ?>
<!-- // header -->

