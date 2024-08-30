<?php
$error = "";
// Kiểm tra nếu người dùng đã ấn nút đăng ký thì mới xử lý
if (isset($_POST['register'])) {
    // Lấy thông tin từ form bằng phương thức POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];

    // Kiểm tra điều kiện bắt buộc đối với các field
    if (empty($username) || empty($password) || empty($fullName) || empty($email)) {
        echo "Vui lòng điền đầy đủ thông tin";
    } else {
        $conn = mysqli_connect('localhost', 'root', '', 'dangkythanhvienweb');

        // Làm sạch thông tin, xóa bỏ các tag HTML và các ký tự đặc biệt
        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);
        $fullName = strip_tags($fullName);
        $fullName = addslashes($fullName);
        $email = strip_tags($email);
        $email = addslashes($email);

        // Kiểm tra tài khoản đã tồn tại chưa
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $error = "Tài khoản đã tồn tại";
        } else {
            // Thực hiện việc lưu trữ dữ liệu vào database bằng query insert
            $insertQuery = "INSERT INTO users (username, password, fullname, email) VALUES ('$username', '$password', '$fullName', '$email')";

            if (mysqli_query($conn, $insertQuery)) {
                $error = "Đăng ký thành công";
            } else {
                $error = "Có lỗi xảy ra trong quá trình đăng ký: " . mysqli_error($conn);
            }
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
  <title>Sign Up</title>
</head>
<body class="flex items-center justify-center h-full min-h-[100vh]">
  <div class="w-full max-w-[600px] border border-purple-500">
    <form method="post" class="flex flex-col gap-3 px-10 py-8 relative">

      <span class="absolute top-0 left-3 -translate-y-2/4 bg-white p-3">Form đăng ký</span>
      <div class="flex items-center gap-3">
        <label for="username" class="w-full max-w-[100px] cursor-pointer">Username:</label>
        <input type="text" id="username" name="username" class="border border-gray-300 py-1 px-2 outline-none rounded-lg w-full" required>
      </div>

      <div class="flex items-center gap-3">
        <label for="password" class="cursor-pointer w-full max-w-[100px]">Password:</label>
        <input type="password" id="password" name="password" class="border border-gray-300 py-1 px-2 outline-none rounded-lg w-full" required>
      </div>

      <div class="flex items-center gap-3">
        <label for="fullName" class="cursor-pointer w-full max-w-[100px]">Họ Tên:</label>
        <input type="text" id="fullName" name="fullName" class="border border-gray-300 py-1 px-2 outline-none rounded-lg w-full" required>
      </div>

      <div class="flex items-center gap-3">
        <label for="email" class="cursor-pointer w-full max-w-[100px]">Email:</label>
        <input type="email" id="email" name="email" class="border border-gray-300 py-1 px-2 outline-none rounded-lg w-full" required>
      </div>

      <button type="submit" name="register" class="bg-[#0096c7] hover:bg-[#90e0ef] transition-all !inline-block w-[100px] p-2 rounded-lg mx-auto">Đăng ký</button>
    </form>
    <p class="text-center font-bold text-xl text-red-700"><?php echo $error ?></p>
  </div>  
</body>
</html>
