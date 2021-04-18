
<!-- header -->
<?php include('includes/header.php') ?>
<!-- // header -->



<div>
<h1>فرم مورد نظر خود را انتخاب کنید</h1>

<div>
<?php
$sql = "SELECT * FROM forms";
$result = $conn->query($sql);
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<section><a href='".$row[urls]."'>".$row[title]."</a><section>";
    }
  
?>
</div>

</div>





<!-- footer -->
<?php include('includes/footer.php') ?>
<!-- // footer -->