<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
<div class="container">
    <h2>อัปเดตความคืบหน้า</h2>
    <p>คำสัญญา: <?php echo $promise['details']; ?></p>
    
    <form method="post" action="">
        <label>สถานะใหม่:</label>
        <select name="status">
            <option value="ยังไม่เริ่ม" <?php if($promise['status']=='ยังไม่เริ่ม') echo 'selected';?>>ยังไม่เริ่ม</option>
            <option value="กำลังดำเนินการ" <?php if($promise['status']=='กำลังดำเนินการ') echo 'selected';?>>กำลังดำเนินการ</option>
            <option value="เงียบหาย">เงียบหาย (จะไม่สามารถอัปเดตได้อีก)</option>
        </select>
        <br><br>
        <label>รายละเอียดความคืบหน้า:</label><br>
        <textarea name="update_details" rows="4" style="width:100%" required></textarea>
        <br><br>
        <button type="submit" class="btn">บันทึกข้อมูล</button>
    </form>
</div>
</body>
</html>