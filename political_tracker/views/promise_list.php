<div class="container">
    <h2>รายการคำสัญญาทั้งหมด</h2>
    
    <table>
        <tr>
            <th>วันที่ประกาศ</th>
            <th>คำสัญญา</th>
            <th>นักการเมือง</th>
            <th>สถานะ</th>
            <th>จัดการ</th>
        </tr>
        <?php foreach ($promises as $p): ?>
        <tr>
            <td><?php echo $p['announce_date']; ?></td>
            <td><?php echo $p['details']; ?></td>
            <td><a href="index.php?action=politician&id=<?php echo $p['politician_id']; ?>">
                <?php echo $p['politician_name']; ?></a>
            </td>
            <td class="status-<?php echo $p['status']; ?>">
                <?php echo $p['status']; ?>
            </td>
            <td>
                <a href="index.php?action=detail&id=<?php echo $p['id']; ?>" class="btn">ดูรายละเอียด</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>