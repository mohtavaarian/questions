<!-- header -->
<?php $title="افزودن پرسش و پاسخ";include '../../includes/header.php'; ?>
<!-- // header -->

<?php

$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$urls = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

if($urls == 'add-questions' || $urls == 'add-questions.php' ){
    $sql = "select * FROM forms";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "نام فرم: <a href=".$row['urls'].">".$row['title']."</a><br/>";
        }
    }
    else{
        echo "فرمی وجود ندارد.";
    }

}else{
    $sql = "select * FROM forms WHERE urls='$urls' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "نام فرم: " . $row["title"]."<br/>";

        echo '
        
        <form method="POST">
            <label for="title">سوال</label>
            <input name="title" id="title" type="text">
            <br />

            <label for="how">نحوه پاسخ این سوال</label>
            <select id="how" name="how">
                <option value="0">checkbox</option>
                <option value="1">radio button</option>
                <option value="2">input</option>
                <option value="3">select</option>
            </select>
            
            <br />
            <label for="responses_key">پاسخ صحیح</label>
            <input name="responses_key" id="responses_key" type="text">
            <br />
            <label for="responses">پاسخ ها</label>
            <textarea name="responses" id="responses"></textarea>
        
            <input type="submit" name="add" id="add" value="ارسال فرم">
        </form>
        
        ';
        if(isset($_POST["add"])){
            $title = $_POST['title'];
            $responses = $_POST['responses'];
            $responses_key = $_POST['responses_key'] ;
            $created_date = date('y-m-d');
            $form_id = $row['id'];
            $how = $_POST['how'];
            $sql = "INSERT INTO questions (formID,query,responses,query_key,created_date,how)
            VALUES ($form_id,'$title','$responses','$responses_key','$created_date',$how)";

            if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }


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
