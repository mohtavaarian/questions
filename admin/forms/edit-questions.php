<!-- header -->
<?php $title="ویرایش سوالات";include '../../includes/header.php'; ?>
<!-- // header -->




<?php

$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$urls = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

if($urls=='edit-questions'){
  header("Location: ../questions/");
  exit();
}

else{

  $sql = "select * FROM questions WHERE id=$urls ";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "سوال: " . $row["query"]."<br/>";
          $query = $row['query'];
          $responses = $row['responses'] ;
          $query_key = $row['query_key'];
          $how = $row['how'];

          define("constSelect", $how);

          echo '
          
          <form method="POST">
            <label for="query">سوال</label>
            <input name="query" id="query" value="'.$query.'" type="text">
            <br />

            <label for="how">نحوه پاسخ این سوال</label>
            
            <select id="how" name="how">
                <option value="0">checkbox</option>
                <option value="1">radio button</option>
                <option value="2">input</option>
                <option value="2">select</option>
            </select>
            
            <br />
            <label for="query_key">پاسخ صحیح</label>
            <input name="query_key" value="'.$query_key.'" id="query_key" type="text">
            <br />
            <label for="responses">پاسخ ها</label>
            <textarea name="responses" id="responses">'.$responses.'</textarea>
        
            <input type="submit" name="add" id="add" value="بروزرسانی فرم">
        </form>
          
          ';
          if(isset($_POST["add"])){
              $query = $_POST['query'];
              $responses = $_POST['responses'] ;
              $query_key = $_POST['query_key'];
              $how = $_POST['how'];
              $form_id = $row['id'];

              $sql = "UPDATE questions SET query='$query',responses='$responses',query_key='$query_key',how=$how WHERE id=$form_id";

              if ($conn->query($sql) === TRUE) {
                echo "<script>alert('بروزرسانی با موفقیت انجام شد');</script>";
                header("Location: ../questions/");
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
<script type="text/JavaScript">
  function changeSELECT(value){
      $('#how option[value="'+value+'"]').prop('selected',true);
  }

  changeSELECT(<?php echo constSelect; ?>);
</script>

<!-- header -->
<?php include '../../includes/footer.php'; ?>
<!-- // header -->






