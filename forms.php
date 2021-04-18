<!-- header -->
<?php include 'includes/header.php'; ?>
<!-- // header -->

<script>
$('#responses').change(function() {
    var responses = $('#responses').val();
    $('#query_key').append('<option value="'+responses+'">'+responses+'</option>');
});

</script>

<?php
$url = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
if ($escaped_url != 'forms') {
    $sql = "SELECT * FROM forms WHERE urls='$escaped_url'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row['urls'] == $escaped_url) {
                echo "
            <form method='post'>
            <div>
            <label for='query'>سوال:</label>
            <input type='text' name='query' id='query'>

            <label for='responses'>پاسخ ها (هرسطر = یک پاسخ):</label>
            <textarea type='text' name='responses' id='responses'></textarea>

            <select id='query_key'>

            </select>

            <label for='query'>سوال:</label>
            <input type='text' name='query' id='query'>


            </div>
            </form>
        ";
            }
        }
    } else {
        echo "آدرس فرم را بدرستی وارد نمایید [404 error]";
    }
} else {
    echo "<h1>افزودن فرم جدید</h1>";
    echo "
        <form method='post'>
        <div>
        <h2>افزودن محتوا به فرم: </h2>
        <label for='title'>عنوان</label>
        <input type='text' id='title' name='title'>

        <label for='urls'>آدرس</label>
        <input type='text' id='urls' name='urls'>

        <label for='summary'>توضیحات</label>
        <textarea type='text' id='summary' name='summary'></textarea>
        <input type='submit' value='ساخت فرم' name='create'><br/><br/>
        </div>
        </form>
        ";

    if (isset($_POST["create"])) {
        $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
        $urls = mysqli_real_escape_string($conn, $_REQUEST['urls']);
        $summary = mysqli_real_escape_string($conn, $_REQUEST['summary']);
        $created_date = date('Y-m-d');
        $sql = "INSERT INTO forms (title, urls, summary,created_date)
            VALUES ('$title', '$urls', '$summary','$created_date')";

        if (mysqli_query($conn, $sql)) {
            echo "Records added successfully.";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}


?>
