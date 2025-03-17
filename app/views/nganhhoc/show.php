<?php require_once 'app/views/shares/header.php'; ?>

<h1 class="mb-4">Ngành: <?= htmlspecialchars($this->nganhhoc->TenNganh) ?></h1>

<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Chi tiết ngành học</h5>
        <p class="card-text"><strong>Mã ngành:</strong> <?= htmlspecialchars($this->nganhhoc->MaNganh) ?></p>
        <p class="card-text"><strong>Tên ngành:</strong> <?= htmlspecialchars($this->nganhhoc->TenNganh) ?></p>
        
        <div class="mt-3">
            <a href="index.php?controller=nganhhoc&action=edit&id=<?= $this->nganhhoc->MaNganh ?>" class="btn btn-warning">Sửa</a>
            <a href="index.php?controller=nganhhoc&action=list" class="btn btn-secondary">Quay lại danh sách</a>
        </div>
    </div>
</div>

<?php if($sinhviens && $sinhviens->rowCount() > 0): ?>
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Sinh viên thuộc ngành này</h5>
    </div>
    <div class="card-body">
        <div class="list-group">
            <?php while($sinhvien = $sinhviens->fetch(PDO::FETCH_ASSOC)): ?>
                <a href="index.php?controller=sinhvien&action=show&id=<?= $sinhvien['MaSV'] ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?= htmlspecialchars($sinhvien['HoTen']) ?></h5>
                        <small>MSSV: <?= htmlspecialchars($sinhvien['MaSV']) ?></small>
                    </div>
                    <p class="mb-1">Giới tính: <?= htmlspecialchars($sinhvien['GioiTinh']) ?> | Ngày sinh: <?= date('d/m/Y', strtotime($sinhvien['NgaySinh'])) ?></p>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php else: ?>
<div class="alert alert-info">Không có sinh viên nào trong ngành học này.</div>
<?php endif; ?>

<?php require_once 'app/views/shares/footer.php'; ?>