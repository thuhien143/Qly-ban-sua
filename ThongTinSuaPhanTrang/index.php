<?php
$conn = mysqli_connect('localhost', 'root', '', 'quanlybansuaweb');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

// Xác định số dòng trên một trang
$limit = 3;

// Xác định trang hiện tại từ tham số URL hoặc mặc định là trang 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Xác định vị trí bắt đầu của trang
$start = ($page - 1) * $limit;

// Truy vấn dữ liệu thành viên với giới hạn số dòng và vị trí bắt đầu
$sql = "SELECT * FROM ql_ban_sua LIMIT $start, $limit";
$result = $conn->query($sql);

// Truy vấn để lấy tổng số mẫu tin
// Đếm số bản ghi trong bảng ql_ban_sua
// đặt tên cho kết quả đếm bằng cụm từ "as total", để dễ dàng truy cập vào kết quả trong kết quả trả về
$countSql = "SELECT COUNT(id) as total FROM ql_ban_sua";
// Thực hiện lệnh truy vấn đến cơ sở dữ liệu
$countResult = $conn->query($countSql);
// Trích xuất kết quả truy vấn 
$countRow = $countResult->fetch_assoc();
// Giá trị đếm được lấy ra từ mảng $countRow và gán cho biến $count. Biến này giờ đây chứa tổng số bản ghi có trong bảng "ql_ban_sua".
$count = $countRow['total'];

// Xác định tổng số trang
$pages = ceil($count / $limit);

// Hàm tính danh sách trang
function pageList($currentPage, $totalPages) {
    $pages = "";
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            $pages .= "<button class='w-9 h-9 border bg-[#475BE8] text-white rounded-lg'>$i</button>";
        } else {
            $pages .= "<a href='index.php?page=$i'>$i</a>";
        }
    }
    return $pages;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
                $stt = 0;
                while ($row = $result->fetch_assoc()) {
                    $link = $row["gender"] == 0 ? './Male1.png' : './nu.png';
                    $rowClass = $stt % 2 == 0 ? 'even-row' : '';

                    echo "<tr class='$rowClass'>";
                    echo "<td class='border border-gray-700 py-2 px-4'>" . $row["id"] . "</td>";
                    echo "<td class='border border-gray-700 py-2 px-4'>" . $row["name"] . "</td>";
                    echo "<td class='border border-gray-700 py-2 px-4 flex justify-center'>
                            <img src='$link' class='w-10 h-10 object-cover'>
                        </td>";
                    echo "<td class='border border-gray-700 py-2 px-4'>" . $row["address"] . "</td>";
                    echo "<td class='border border-gray-700 py-2 px-4'>" . $row["phone"] . "</td>";
                    echo "</tr>";
                    $stt++;
                }
                ?>
            </tbody>
        </table>
        <div class="mt-10 flex items-center justify-center gap-2">
            <?php echo pageList($page, $pages); ?>
        </div>
    </div>
</body>
</html>

<?php
// Đóng kết nối
mysqli_close($conn);
?>
