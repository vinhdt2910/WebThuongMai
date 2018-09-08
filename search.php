<?php 
  if (isset($_GET['key'])) {
    $key= $_GET['key'];
}
if (isset($key)) {
    $sbook = "SELECT * FROM `book` WHERE Tensach LIKE '%".$key."%' and trangthai ='1'";
    $re2 = mysqli_query($conn, $sbook);

    $rowcount=mysqli_num_rows($re2);     
}
?>
<aside id="column_right"></aside>

<div class="top">
    <div class="left"></div>
    <div class="right"></div>
    <div class="center">
        <h1><?php if ($rowcount>0){echo 'Các sản phẩm được tìm';}else{echo 'Không có sản phẩm nào.';}  ?></h1>
    </div>
</div>
<div class="middle">
    <div class="dmsp">
        <?php
             
                    while ($r2 = mysqli_fetch_array($re2)) {
                        $today = date("Y-m-d");
                        $ck_date=date($r2['Thoigianck']);
                ?>
                    <div class="sanpham xam">
                        <div>
                            <div class="image">

                                <a title="<?php echo $r2['Tensach']; ?>" href="index.php?route=book&type=<?php echo $r2['Masach']; ?>"><img title="<?php echo $r2['Tensach']; ?>" style="width: 100%" src="image/<?php echo $r2['anh'] ?>" alt="<?php echo $r2['Tensach']; ?>" /></a>
                            </div>
                            <div class="tensp">
                                <a title="<?php echo $r2['Tensach']; ?>"
                                href="index.php?route=book&type=<?php echo $r2['Masach']; ?>"><?php echo $r2['Tensach']; ?></a>
                            </div>
                            <div class="gia">
                                <div class="giacu"><?php echo number_format($r2['Gia']); ?>đ</div>
                                <?php if(strtotime($today)<strtotime($ck_date)){
                                ?>
                                <div class="giamoi"><?php echo number_format($r2['Gia']-($r2['Gia']*$r2['Chietkhau']/100)); ?>đ</div>
                            <?php } else { ?>
                                <div class="giamoi"><?php echo number_format($r2['Gia']); ?>đ</div>
                             <?php } ?>
                            </div>
                        </div>
                        <div class="chitietvsmua">
                            <div class="chitiet"><a title="<?php echo $r2['Tensach']; ?>" href="index.php?route=book&type=<?php echo $r2['Masach']; ?>">Chi tiết</a></div>
                            <div class="mua"><a href="index.php?route=checkout&type=<?php echo $r2['Masach']; ?>" title="Mua hàng">Đặt hàng</a></div>
                        </div>
                        <?php if(strtotime($today)<strtotime($ck_date)){
                                ?>
                        <div class="labelspecial"><?php echo $r2['Chietkhau'];?>%</div>
                        <?php } else { ?>
                            <div class="labelspecial">0%</div>
                             <?php } ?>
                    </div>
                <?php
                }
                ?>

    </div>
    <!-- <div class="pagination"><div class="links"> <a href="#">|&lt;</a> <a href="#">&lt;</a>  <a href="#">1</a>  <b>2</b> </div><div class="results">Hiển thị từ trang 21 đến trang 32  trong tổng số 32 trang</div></div> -->