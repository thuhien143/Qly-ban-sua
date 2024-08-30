<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlybansuaweb');
// Truy vấn dữ liệu thành viên
$sql = "SELECT * FROM ql_ban_sua";
// Thực thi một truy vấn SQL đến cơ sở dữ liệu thông qua kết nối $conn
$result = $conn->query($sql);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Thông tin khách hàng</title>
  <style>
    .even-row {
      background-color: #faedcd;
    }
  </style>
</head>

<body class="flex items-center justify-center p-8 h-full max-h-[100vh]">
  <div class="container mx-auto">
    <h1 class="text-3xl font-bold uppercase text-center mb-5">Thông tin khách hàng</h1>
    <table class="min-w-full bg-white border border-gray-700">
      <thead class="text-red-600">
        <tr>
          <th class="border border-gray-700 py-2 px-4 font-semibold">Mã KH</th>
          <th class="border border-gray-700 py-2 px-4 font-semibold">Tên Khách Hàng</th>
          <th class="border border-gray-700 py-2 px-4 text-center font-semibold">Giới tính</th>
          <th class="border border-gray-700 py-2 px-4 font-semibold">Địa chỉ</th>
          <th class="border border-gray-700 py-2 px-4 font-semibold">Số điện thoại</th>
        </tr>
      </thead>
      <tbody>
<?php 
// Kiểm tra xem kết quả truy vấn có chứa ít nhất một dòng dữ liệu hay không
if ($result->num_rows > 0) {
  $stt = 0;
  // Hiển thị dữ liệu thành viên
  // lấy một dòng dữ liệu từ kết quả truy vấn và lưu trữ nó trong một mảng liên kết (associative array) được gán cho biến $row.
  // truy xuất giá trị của cột "name" bằng $row['name']
   while ($row = $result->fetch_assoc()) {
    if($stt % 2 == 0) {
   echo "<tr class='even-row'>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["id"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["name"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4 text-center'>" . $row["gender"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["address"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["phone"] . "</td>";
   echo "</tr>";
        $stt++;
    } else {
      echo "<tr>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["id"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["name"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4 text-center'>" . $row["gender"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["address"] . "</td>";
     echo "<td class='border border-gray-700 py-2 px-4'>" . $row["phone"] . "</td>";
   echo "</tr>";
        $stt++;
    }
  }
}
?>
      </tbody>
    </table>
  </div>
</body>

</html>
