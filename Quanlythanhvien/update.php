<?php
$error = "";
$conn = mysqli_connect('localhost', 'root', '', 'quanlythanhvienweb');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form cập nhật thành viên
    $id = $_POST["id"];
    $hoTen = $_POST["hoten"];
    $email = $_POST["email"];
    $capDo = $_POST["capdo"];

    // Thực thi truy vấn UPDATE
    $sql = "UPDATE users SET hoten='$hoTen', email='$email', capdo='$capDo' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        // Chuyển hướng trang sau khi cập nhật thành công
        header("Location: index.php");
        exit;
    } else {
        $error = "Lỗi khi cập nhật thành viên: " . mysqli_error($conn);
    }
} else {
    // Lấy thông tin thành viên từ parameter trên URL
    $id = $_GET["id"];

    // Truy vấn dữ liệu thành viên theo id
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Hiển thị form sửa thành viên với thông tin hiện tại
        $row = mysqli_fetch_assoc($result);
        $hoTen = $row["hoten"];
        $email = $row["email"];
        $capDo = $row["capdo"];
    } else {
        $error =  "Không tìm thấy thành viên.";
        exit;
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
    <h2 class="text-2xl font-bold mb-6">Cập nhật thành viên</h2>
    <form method="post">
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="ho-ten">Họ tên:</label>
        <input class="border border-gray-300 rounded-md px-3 py-2 w-full" type="text" id="hoten" name="hoten" value="<?php echo $hoTen; ?>">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="email">Địa chỉ email:</label>
        <input class="border border-gray-300 rounded-md px-3 py-2 w-full" type="email" id="email" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2" for="cap-do">Cấp độ:</label>
        <select class="border border-gray-300 rounded-md px-3 py-2 w-full" id="capdo" name="capdo">
          <option value="admin" <?php if ($capDo == "admin") echo "selected"; ?>>Quản trị viên</option>
          <option value="members" <?php if ($capDo == "member") echo "selected"; ?>>Thành Viên</option>
        </select>
      </div>
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lưu thông tin</button>
    </form>
    <?php echo $error; ?>
  </div>
</div>
</body>
</html>
