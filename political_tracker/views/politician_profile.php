<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <a href="index.php" class="btn btn-back">กลับหน้าหลัก</a>
    <h2>ข้อมูลนักการเมือง</h2>
    <p><strong>ชื่อ:</strong> <?php echo $politician['name']; ?></p>
    <p><strong>พรรค:</strong> <?php echo $politician['party']; ?></p>

    <h3>คำสัญญาของนักการเมืองท่านนี้</h3>
    <table>
        <tr><th>วันที่</th><th>คำสัญญา</th><th>สถานะ</th></tr>
        <?php foreach ($promises as $p): ?>
        <tr>
            <td><?php echo $p['announce_date']; ?></td>
            <td><?php echo $p['details']; ?></td>
            <td class="status-<?php echo $p['status']; ?>"><?php echo $p['status']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>