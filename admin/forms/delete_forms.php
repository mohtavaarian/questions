<!-- header -->
<?php $title="حذف فرم";include '../../includes/header.php'; ?>
<!-- // header -->




<?php

$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$urls = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');

if($urls == 'delete' || $urls == 'delete.php' ){
    header("Location: ../forms");
    exit();
}

else{
    $sql = "DELETE FROM forms WHERE id=$urls";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../");
        exit();
    
    } else {
    echo "Error deleting record: " . $conn->error;
    }
}


?>


