<?php require_once 'app/views/shares/header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    .student-table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
    }
    .student-table th, .student-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .student-table th {
        background-color: #f2f2f2;
    }
    .student-table img {
        width: 100px;
        height: auto;
    }
    .actions a {
        margin-right: 10px;
        text-decoration: none;
        color: #007BFF;
    }
    .actions a:hover {
        text-decoration: underline;
    }
    .add-student {
        display: block;
        margin: 10px 0;
        text-align: center;
    }
    .messages {
        text-align: center;
        color: green;
        margin: 10px 0;
    }
    .error {
        color: red;
    }
</style>

<h1>Danh sách sinh viên</h1>

<div class="add-student">
    <a href="index.php?controller=sinhvien&action=add">Thêm sinh viên mới</a>
    <a href="index.php?controller=nganhhoc&action=list">Quản lý ngành học</a>
</div>

<?php if(isset($_SESSION['success'])): ?>
    <div class="messages"><?= $_SESSION['success']; ?></div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="messages error"><?= $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if($stmt->rowCount() > 0): ?>
    <table class="student-table">
        <thead>
            <tr>
                <th>MaSV</th>
                <th>Họ Tên</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Hình</th>
                <th>Ngành</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['MaSV']) ?></td>
                    <td><?= htmlspecialchars($row['HoTen']) ?></td>
                    <td><?= htmlspecialchars($row['GioiTinh']) ?></td>
                    <td><?= date('d/m/Y', strtotime($row['NgaySinh'])) ?></td>
                    <td>
                        <?php if(!empty($row['Hinh'])): ?>
                            <img src="public/uploads/<?= htmlspecialchars($row['Hinh']) ?>" alt="<?= htmlspecialchars($row['HoTen']) ?>">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($row['TenNganh']) ?></td>
                    <td class="actions">
                        <a href="index.php?controller=sinhvien&action=show&id=<?= $row['MaSV'] ?>">Chi tiết</a>
                        <a href="index.php?controller=sinhvien&action=edit&id=<?= $row['MaSV'] ?>">Sửa</a>
                        <a href="index.php?controller=sinhvien&action=delete&id=<?= $row['MaSV'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?')">Xóa</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="text-align: center;">Không có sinh viên nào.</p>
<?php endif; ?>

<?php require_once 'app/views/shares/footer.php'; ?>