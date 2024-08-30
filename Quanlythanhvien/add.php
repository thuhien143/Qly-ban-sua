<?php
$error = "";
$conn = mysqli_connect('localhost', 'root', '', 'quanlythanhvienweb');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form thêm thành viên
    $username = $_POST["username"];
    $hoTen = $_POST["hoten"];
    $email = $_POST["email"];
    $capDo = $_POST["capdo"];

    // Kiểm tra xem tên đăng nhập đã tồn tại trong cơ sở dữ liệu chưa
    $checkQuery = "SELECT * FROM users WHERE tendn='$username'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        $error = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.";
    } else {
        // Thực thi truy vấn INSERT để thêm thành viên mới vào cơ sở dữ liệu
        $insertQuery = "INSERT INTO users (tendn, hoten, email, capdo) VALUES ('$username', '$hoTen', '$email', '$capDo')";
        if (mysqli_query($conn, $insertQuery)) {
            // Chuyển hướng trang sau khi thêm thành công
            header("Location: index.php");
            exit;
        } else {
            $error = "Lỗi khi thêm thành viên: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
       @layer base {
        input[type='number']::-webkit-outer-spin-button,
        input[type='number']::-webkit-inner-spin-button,
        input[type='number'] {
          -webkit-appearance: none;
          margin: 0;
        }
     }
   </style>
  <title>Document</title>
</head>
<body>
  <div class="container mx-auto">
  <div class="max-w-md mx-auto bg-white p-8 my-10 rounded-md shadow-md">
    <h2 class="text-2xl font-bold mb-6">Thêm thành viên</h2>
    <form method="post">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="ho-ten">Tên đăng nhập:</label>
        <input class="border border-gray-300 rounded-md px-3 py-2 w-full" type="text" id="username" name="username">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="ho-ten">Họ tên:</label>
        <input class="border border-gray-300 rounded-md px-3 py-2 w-full" type="text" id="hoten" name="hoten">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">Địa chỉ email:</label>
        <input class="border border-gray-300 rounded-md px-3 py-2 w-full" type="email" id="email" name="email">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="cap-do">Cấp độ:</label>
        <select class="border border-gray-300 rounded-md px-3 py-2 w-full" id="capdo" name="capdo">
          <option value="admin">Quản trị viên</option>
          <option value="members">Thành Viên</option>
        </select>
      </div>
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Thêm thành viên</button>
    </form>
    <?php echo $error; ?>
  </div>
</div>
</body>
</html>
