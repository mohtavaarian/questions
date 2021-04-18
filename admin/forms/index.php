<!-- header -->
<?php include('../../includes/header.php') ?>
<!-- // header -->


<?php

$sql = "select * FROM forms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
    while($row = $result->fetch_assoc()) {
        $urls = $row['urls'];
        echo '
        <section>

        نام فرم
        : 
        <a href="edit/'.$urls.'">'.$row["title"].'</a><br/>
        
        
    <span> | </span>
    <a href="../forms/delete_forms/'.$row["id"].'">حذف </a>
    </section>    
    <hr/>
    ';

    }
}
?>


<!-- header -->
<?php include('../../includes/footer.php') ?>
<!-- // header -->
