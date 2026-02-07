<div class="container">
    <a href="index.php" class="btn btn-back">กลับหน้าหลัก</a>
    <h2>รายละเอียดคำสัญญา</h2>
    <p><strong>คำสัญญา:</strong> <?php echo $promise['details']; ?></p>
    <p><strong>นักการเมือง:</strong> <?php echo $promise['politician_name']; ?> (<?php echo $promise['party']; ?>)</p>
    <p><strong>สถานะปัจจุบัน:</strong> <span class="status-<?php echo $promise['status']; ?>"><?php echo $promise['status']; ?></span></p>

    <?php if(isset($_SESSION['admin']) && $promise['status'] != 'เงียบหาย'): ?>
        <a href="index.php?action=update&id=<?php echo $promise['id']; ?>" class="btn">อัปเดตความคืบหน้า</a>
    <?php endif; ?>

    <h3>ประวัติการอัปเดต</h3>
    <table>
        <tr><th>วันที่</th><th>รายละเอียด</th></tr>
        <?php foreach ($updates as $u): ?>
        <tr>
            <td><?php echo $u['update_date']; ?></td>
            <td><?php echo $u['update_details']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>