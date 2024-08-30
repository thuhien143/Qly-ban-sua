<?php
$conn = mysqli_connect('localhost', 'root', '', 'thongtinhangsuaweb');
// Truy vấn dữ liệu thành viên
$sql = "SELECT * FROM ql_bansua";
// Thực thi một truy vấn SQL đến cơ sở dữ liệu thông qua kết nối $conn
// $result = mysqli_query($conn, $sql); // C1
$result = $conn->query($sql); // C2
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
  <title>Thông tin hãng sữa</title>
</head>
<body class="p-10 h-full min-h-[100vh]">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold uppercase text-center mb-5">Thông tin hãng sữa</h1>
    <table class="min-w-full bg-white">
      <thead class="bg-gray-800 text-white">
        <tr>
          <th class="py-2 px-4 border-b-2 border-gray-300">Mã HS</th>
          <th class="py-2 px-4 border-b-2 border-gray-300">Tên hãng sữa</th>
          <th class="py-2 px-4 border-b-2 border-gray-300">Địa chỉ</th>
          <th class="py-2 px-4 border-b-2 border-gray-300">Điện thoại</th>
          <th class="py-2 px-4 border-b-2 border-gray-300">Email</th>
        </tr>
      </thead>
      <tbody class="text-gray-700 text-center">
<?php 
// Kiểm tra xem kết quả truy vấn có chứa ít nhất một dòng dữ liệu hay không
if ($result->num_rows > 0) {
  // Hiển thị dữ liệu thành viên
  // lấy một dòng dữ liệu từ kết quả truy vấn và lưu trữ nó trong một mảng liên kết (associative array) được gán cho biến $row.
  // truy xuất giá trị của cột "name" bằng $row['name']
   while ($row = $result->fetch_assoc()) {
   echo "<tr>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["mahang"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["tenhang"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["diachi"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["dienthoai"] . "</td>";
     echo "<td class='py-2 px-4 border border-gray-300'>" . $row["email"] . "</td>";
   echo "</tr>";
  }
}
?>
      </tbody>
    </table>
  </div>
</body>
</html>
