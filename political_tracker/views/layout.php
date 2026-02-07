<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบติดตามสัญญาของนักการเมือง</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav style="background: #333; color: white; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center;">
        <div class="brand">
            <a href="index.php" style="color: white; text-decoration: none; font-size: 1.2em; font-weight: bold;">Politician Tracker</a>
        </div>
        <div class="menu">
            <a href="index.php" style="color: #ddd; text-decoration: none; margin-right: 15px;">หน้าหลัก</a>
            
            <?php if(isset($_SESSION['admin'])): ?>
                <span style="color: #4CAF50; font-weight: bold;">สถานะ: Admin</span> | 
                <a href="index.php?logout=1" style="color: #ff6b6b;">ออกจากระบบ</a>
            <?php else: ?>
                <a href="index.php?login=1" style="color: #ddd;">เข้าสู่ระบบเจ้าหน้าที่</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="main-content" style="padding: 20px;">
        <?php 
        if (isset($content)) {
            include $content;
        }
        ?>
    </div>

    <footer style="text-align: center; padding: 20px; color: #777; font-size: 0.9em; border-top: 1px solid #ddd; margin-top: 20px;">
        &copy; <?php echo date("Y"); ?> Political Promise 
    </footer>

</body>
</html>