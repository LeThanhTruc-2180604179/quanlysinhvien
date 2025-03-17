<?php require_once 'app/views/shares/header.php'; ?>

<h1 class="mb-4"><?= htmlspecialchars($this->sinhvien->HoTen) ?></h1>

<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <?php if(!empty($this->sinhvien->Hinh)): ?>
            <div class="col-md-4 mb-3">
                <img src="public/uploads/<?= htmlspecialchars($this->sinhvien->Hinh) ?>" alt="<?= htmlspecialchars($this->sinhvien->HoTen) ?>" class="img-fluid">
            </div>
            <div class="col-md-8">
            <?php else: ?>
            <div class="col-md-12">
            <?php endif; ?>
                <h5 class="card-title">Thông tin sinh viên</h5>
                <p class="card-text"><strong>Mã sinh viên:</strong> <?= htmlspecialchars($this->sinhvien->MaSV) ?></p>
                <p class="card-text"><strong>Họ tên:</strong> <?= htmlspecialchars($this->sinhvien->HoTen) ?></p>
                <p class="card-text"><strong>Giới tính:</strong> <?= htmlspecialchars($this->sinhvien->GioiTinh) ?></p>
                <p class="card-text"><strong>Ngày sinh:</strong> <?= date('d/m/Y', strtotime($this->sinhvien->NgaySinh)) ?></p>
                <p class="card-text"><strong>Ngành học:</strong> <?= htmlspecialchars($this->sinhvien->TenNganh) ?> (<?= htmlspecialchars($this->sinhvien->MaNganh) ?>)</p>
                
                <div class="mt-3">
                    <a href="index.php?controller=sinhvien&action=edit&id=<?= $this->sinhvien->MaSV ?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?controller=sinhvien&action=list" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($dangKys) && $dangKys->rowCount() > 0): ?>
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">Các học phần đã đăng ký</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Mã học phần</th>
                        <th>Tên học phần</th>
                        <th>Số tín chỉ</th>
                        <th>Ngày đăng ký</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($dangKy = $dangKys->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($dangKy['MaHP']) ?></td>
                        <td><?= htmlspecialchars($dangKy['TenHP']) ?></td>
                        <td><?= (int)$dangKy['SoTinChi'] ?></td>
                        <td><?= date('d/m/Y', strtotime($dangKy['NgayDK'])) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php else: ?>
<div class="alert alert-info">CHƯA CÓ HỌC PHẦN.</div>
<?php endif; ?>

<?php require_once 'app/views/shares/footer.php'; ?>