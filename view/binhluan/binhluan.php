<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
    $idpro=$_REQUEST['idpro'];
    $dsbl=loadall_binhluan($idpro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
      
  .binhluan table {
  width: 90%;
  margin-left: 5%;
}
.binhluan table td:nth-child(1) {
  width: 50%;
}
.binhluan table td:nth-child(2) {
  width: 20%;
}
.binhluan table td:nth-child(3) {
  width: 30%;
}

    </style>
</head>
<body>
    



<div class="row mb">
    <div class="boxtitle">Bình luận</div>
    <div class="boxcontent2 binhluan">
       <table>
            <?php
       
                  foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<tr></tr><td>'.$noidung.'</td>';
                    echo '<td>'.$iduser.'</td>';
                    echo '<td>'.$ngaybinhluan.'</td></tr>';

                  }
                ?>
            
            </table>
    </div>
    <div class="boxfooter binhluanform">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="idpro" value="<?=$idpro?>">
            <input type="text" name="noidung" />
            <input style="border: none; border-radius: 5px; background-color: yellow;" type="submit" name="guibinhluan" value="Gửi bình luận">
        </form>
    </div>
    <?php
    if (isset($_POST['guibinhluan'])&&($_POST['guibinhluan'])) {
        $noidung=$_POST['noidung'];
        $idpro=$_POST['idpro'];
        $iduser=$_SESSION['user']['id'];
        $ngaybinhluan=date('h:i:sa d/m/y');
        insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan);
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
        
    ?>
</div>
</body>
</html>