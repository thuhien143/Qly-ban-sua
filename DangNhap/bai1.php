<?php
$username = "";
$password = "";
$error = "";
// Kiểm tra xem có dữ liệu được gửi từ form hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy thông tin đăng nhập từ form
    $username = $_POST["username"];
    $password = $_POST["password"];

    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);

    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'root', '', 'usersweb');

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Tạo truy vấn kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    // Thực hiện truy vấn
    $result = mysqli_query($conn, $query);

    // Kiểm tra số hàng trả về từ truy vấn
    if (mysqli_num_rows($result) > 0) {
        // Đăng nhập thành công
        // Lưu thông tin đăng nhập vào session
        session_start();
        $_SESSION["username"] = $username;

        // Tiến hành kiểm tra quyền hạn và chuyển hướng đến trang khác (ví dụ: trang chính)
        // Thay đổi "home.php" thành đường dẫn trang chính bạn muốn chuyển hướng
        header("Location: hienthi.php");
        exit();
    } else {
        // Đăng nhập thất bại
        $error = "Thông tin đăng nhập không đúng!";
    }

    // Đóng kết nối cơ sở dữ liệu
    mysqli_close($conn);
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
  <title>Sign In</title>
</head>
<body class="flex items-center justify-center h-full min-h-[100vh]">
  <div class="w-full max-w-[600px] border border-purple-500">
    <form method="post" class="flex flex-col gap-3 px-10 py-8 relative">

      <span class="absolute top-0 left-3 -translate-y-2/4 bg-white p-3">Đăng nhập</span>
      <div class="flex items-center gap-3">
        <label for="username" class="w-full max-w-[100px] cursor-pointer">Username:</label>
        <input type="text" id="username" name="username" class="border border-gray-300 py-1 px-2 outline-none rounded-lg w-full">
      </div>

      <div class="flex items-center gap-3">
        <label for="password" class="cursor-pointer w-full max-w-[100px]">Password:</label>
        <input type="password" id="password" name="password" class="border border-gray-300 py-1 px-2 outline-none rounded-lg w-full">
      </div>

      <button type="submit" class="bg-[#0096c7] hover:bg-[#90e0ef] transition-all !inline-block w-[100px] p-2 rounded-lg mx-auto">Đăng nhập</button>
    </form>
    <p class="text-center font-bold text-xl text-red-700"><?php echo $error ?></p>
  </div>  
</body>
</html>
