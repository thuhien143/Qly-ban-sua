<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Lấy id thành viên từ parameter trên URL
    $id = $_GET["id"];
    $conn = mysqli_connect('localhost', 'root', '', 'quanlythanhvienweb');

    // Thực thi truy vấn DELETE
    $sql = "DELETE FROM users WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng trang sau khi xóa thành công
        header("Location: index.php");
        exit;
    }
}

