<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlythanhvienweb');
// Truy vấn dữ liệu thành viên
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
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
<body class="p-10 h-full min-h-[100vh]">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold uppercase">Quản lý thành viên</h1>
    <p class="my-5">Danh sách thành viên đã đăng ký</p>
    <a href='add.php' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-10'>+ Add</a>
    <table class="min-w-full bg-white">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="py-2 px-4">STT</th>
          <th class="py-2 px-4">Tên đăng nhập</th>
          <th class="py-2 px-4">Họ Tên</th>
          <th class="py-2 px-4">Địa chỉ email</th>
          <th class="py-2 px-4">Cấp độ</th>
          <th class="py-2 px-4">Hành động</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 text-center">
<?php 
if ($result->num_rows > 0) {
  // Hiển thị dữ liệu thành viên
  $capdo = "";
   while ($row = $result->fetch_assoc()) {
    $capdo = $row["capdo"] == "admin" ? "Quản trị viên" : "Thành Viên";
   echo "<tr>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["id"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["tendn"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["hoten"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["email"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $capdo . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>";
     echo "<a href='update.php?id=" . $row["id"] . "' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Edit</a>";
     echo "<a href='delete.php?id=" . $row["id"] . "' class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded'>Delete</a>";
     echo "</td>";
     echo "</tr>";
  }
}
?>
      </tbody>
    </table>
  </div>
</body>
</html>
