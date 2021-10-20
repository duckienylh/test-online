<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>ket qua</title>
</head>

<body>
    <div>
        <p>Bộ NN & PTNT</p>
        <h6>TRƯỜNG ĐẠI HỌC THỦY LỢI</h6>
    </div>
    <main class="">
        <h1 class="center">DANH SÁCH TỔNG HƠP KẾT QUẢ THI CỦA THÍ SINH</h1>
        <table class="table">
            <thead>
                <tr class="table-dark">
                    <th scope="col">số thứ tự</th>
                    <th scope="col">số báo danh</th>
                    <th scope="col">mã bài thi</th>
                    <th scope="col">ngày thi</th>
                    <th scope="col">giờ nộp bài</th>
                    <th scope="col">điểm thi</th>
                    <th scope="col">tập kết quả</th>
                    <th scope="col">kí tên</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                
                $filelist = scandir('./result');

                for ($i = 3; $i < count($filelist); $i++){
                    echo'<tr>';
                    echo'<th scope="row">'.($i-2).'</th>';
                    echo'<td>'.explode('_',$filelist[$i])[3].'</td>';
                    echo'<td>'.explode('_',$filelist[$i])[2].'</td>';
                    echo'<td>'.explode('_',$filelist[$i])[4].'</td>';
                    echo'<td>'.explode('_',$filelist[$i])[5].'</td>';
                    echo'<td>'.explode('.',explode('_',$filelist[$i])[6])[0].'</td>';
                    echo'<td><a href="view.php?file='.'result/'.$filelist[$i].'">'.'result/'.$filelist[$i].'</a></td>';
                    echo'</tr>';  
                }
                ?>
                
            </tbody>
        </table>
    </main>
</body>

</html>