<!-- header -->
<?php $title="لیست فرم ها - ادمین";include 'includes/header.php'; ?>
<!-- // header -->


<?php
$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$urls = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
if ($urls == 'forms') {
    $sql = "select * FROM forms";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "نام فرم: <a href=forms/".$row['urls'].">".$row['title']."</a><br/>";
        }
    }
    else{
        echo "فرمی وجود ندارد.";
    }
}
else{
    $sql = "select * FROM forms WHERE urls='$urls'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
        }

        $sql = "select * FROM questions WHERE formID=$id";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $res = $row["responses"];
            $how = $row["how"];
            $id = $row["id"];
            switch ($how) {
                case "0":
                    // checkbox
                    echo '<div><h3>'.$row["query"].'</h3>';
                    
                    foreach(preg_split("/((\r?\n)|(\r\n?))/", $res) as $line){
                        echo ' <input type="checkbox" name="'.$id.'" value="'.$res.'">';
                        echo $line."<br>";
                    }

                   echo '</div>';
                  break;
                case "1":
                    // radiobutton
                    echo '<div><h3>'.$row["query"].'</h3>';
                    
                    foreach(preg_split("/((\r?\n)|(\r\n?))/", $res) as $line){
                        echo ' <input type="radio" name="'.$id.'" value="'.$res.'">';
                        echo $line."<br>";
                    }

                   echo '</div>';
                  break;
                  case "2":
                    // input
                    echo '<div><h3>'.$row["query"].'</h3>';
                    
                    foreach(preg_split("/((\r?\n)|(\r\n?))/", $res) as $line){
                        echo '<input type="text" name="'.$id.'">';
                        echo $line."<br>";
                    }

                   echo '</div>';
                    break;
                case "3":
                    // select
                    echo '<div><h3>'.$row["query"].'</h3><select>';
                    
                    foreach(preg_split("/((\r?\n)|(\r\n?))/", $res) as $line){
                        echo ' <option name="'.$id.'" value="'.$line.'">'.$line.'</option>';
                        echo $line."<br>";
                    }

                   echo '</select></div>';
                    break;
                default:
                  echo "نوع سوالات مشخص نشده است!!";
              }
            



        }
    }
    else{
        echo 'questions empty!';
    }


    }


    
}

?>



<!-- 
<script type="text/JavaScript">
  function how0(value){
      $('#how option[value="'+value+'"]').prop('selected',true);
  }

  function how1(value){
      $('#how option[value="'+value+'"]').prop('selected',true);
  }

  function how2(value){
      $('#how option[value="'+value+'"]').prop('selected',true);
  }

  function how3(value){
      $('#how option[value="'+value+'"]').prop('selected',true);
  }

  changeSELECT(<?php echo constSelect; ?>);
</script> -->




<!-- footer -->
<?php include('includes/footer.php') ?>
<!-- // footer -->