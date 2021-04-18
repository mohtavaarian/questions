<!-- header -->
<?php $title="لیست پرسش و پاسخ ها";include '../../includes/header.php'; ?>
<!-- // header -->



<?php

$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$urls = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

if($urls=='questions'){
  $sql = "select * FROM questions ";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()) {
    $formID = $row['formID'];
    $frmsql = "select * FROM forms WHERE id=$formID";
    $frmresult = $conn->query($frmsql);
    $query = $row["query"];
    $responses = $row["responses"];
    $query_key= $row["query_key"];
    

  while($frmrow = $frmresult->fetch_assoc()) { 
    $frmurls = $frmrow["urls"];
    $id = $row["id"];
    echo '
    <section>
    <a href="../edit-questions/'.$id.'">ویرایش </a>
    <span> | </span>
    <a href="../delete_questions/'.$id.'">حذف </a>
    <br>
    سوال : '.$query.'
    <br/>
    پاسخ ها:  '.$responses.'
    <br/>
    پاسخ اصلی: '.$query_key.'
    <br/>
    نام فرم مربوطه: <a href="../../../forms/questions/'.$frmurls.'">
    '.$frmrow["title"].'</a>
    <br/>
    تاریخ ایجاد:  '.$frmrow["created_date"].'
   
    </section>
    <hr>
  ';
  }
}
}





?>

<!-- header -->
<?php include '../../includes/footer.php'; ?>
<!-- // header -->

