<?php
$file = $_GET['file'];
// echo $file;

$content = file($file);
// foreach($content as $line){
//     echo $line.'<br>';
// }
$fp = fopen($file, "r"); //mở file ở chế độ đọc
$contents = fread($fp, filesize($file));

// demo
// echo $content[1] . '<br>';
//lay ten
$getname = explode(":", $content[1]);
$name = explode(",", $getname[1]);

//lay diem
$getmark = explode(":", $content[4]);
// $mark = explode(" /", $getmark[1]);

// cắt chuỗi khi có 2 lần enter liên tục trả về list
$list = explode("\n\n", $contents); 

// cắt lấy từng dòng của list ở vị trí 1 
$items = explode("\n", $list[1]); 
// echo '<pre>'.$list[1].'</pre><br>';

// lấy đán án người dùng chọn
$response = explode(":", $items[3]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div>
        <p>Bộ NN & PTNT</p>
        <h6>TRƯỜNG ĐẠI HỌC THỦY LỢI</h6>
    </div>
    <main>

        <h3 class="text-center">KẾT QUẢ BÀI THI ỨNG DỤNG CÔNG NGHỆ THÔNG TIN</h3>
        <div class="d-flex">
            <P class="pe-5">Số báo danh: <?php echo explode('_', $file)[3] ?></P>
            <P class="pe-5">Họ và tên: <?php echo $name[1] . $name[0] ?></P>
            <P class="pe-5">Điểm thi: <?php echo $getmark[1] ?></P>
        </div>
        <P class="pe-5">Mã tập tin làm bài: <?php echo $file ?></P>
        <div class="d-flex">
            <P class="pe-5">Ngày thi: <?php echo  explode('_', $file)[4] ?></P>
            <P class="">Giờ nộp bài: <?php echo  explode('_', $file)[5] ?></P>

        </div>

        <div class="card-group col-10 me-auto ms-auto mb-3">
            <div class="card me-2 border-dark border-start">

                <div class="card-body">
                    <h5 class="card-title text-center pb-5">Thí sinh</h5>

                </div>
            </div>
            <div class="card me-2 border-dark border-start">

                <div class="card-body">
                    <h5 class="card-title text-center pb-5">Giám thị 1</h5>

                </div>
            </div>
            <div class="card me-2 border-dark border-start">

                <div class="card-body">
                    <h5 class="card-title text-center pb-5">Giám thị 2</h5>

                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th class="col text-center">STT</th>
                    <th class="col-6 text-center">Nội dung câu hỏi</th>
                    <th class="col text-center">điểm đạt</th>
                    <th class="col-6 text-center">đáp án đã chọn</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $list = explode("\n\n", $contents);
                for ($i = 1; $i < count($list) - 1; $i++) {
                    $items = explode("\n", $list[$i]); 

                    $mark = explode(":", $items[1]); 

                    $response = explode(":", $items[3]); 

                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>$items[0]</td>";
                    echo "<td>$mark[1]</td>";
                    echo "<td>$response[1]</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>