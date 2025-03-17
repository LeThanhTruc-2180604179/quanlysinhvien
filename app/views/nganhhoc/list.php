<?php require_once 'app/views/shares/header.php'; ?>

<h1 class="mb-4">Danh sách ngành học</h1>

<div class="mb-3">
    <a href="index.php?controller=nganhhoc&action=add" class="btn btn-success">Thêm ngành học mới</a>
    <a href="index.php?controller=sinhvien&action=list" class="btn btn-info">Quản lý sinh viên</a>
</div>

<?php if(isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; ?>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<?php if($stmt->rowCount() > 0): ?>
    <div class="list-group">
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="list-group-item">
                <div class="d-flex w-100 justify-content-between mb-2">
                    <h5 class="mb-1 text-primary"><?= htmlspecialchars($row['TenNganh']) ?></h5>
                    <span class="badge bg-info">Mã ngành: <?= htmlspecialchars($row['MaNganh']) ?></span>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-2">
                    <a href="index.php?controller=nganhhoc&action=show&id=<?= $row['MaNganh'] ?>" class="btn btn-info btn-sm me-2">Xem</a>
                    <a href="index.php?controller=nganhhoc&action=edit&id=<?= $row['MaNganh'] ?>" class="btn btn-warning btn-sm me-2">Sửa</a>
                    <a href="index.php?controller=nganhhoc&action=delete&id=<?= $row['MaNganh'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa ngành học này?')">Xóa</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php else: ?>
    <div class="alert alert-info">Không có ngành học nào.</div>
<?php endif; ?>

<?php require_once 'app/views/shares/footer.php'; ?>