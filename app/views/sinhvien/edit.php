<?php require_once 'app/views/shares/header.php'; ?>

<h1 class="mb-4">Sửa thông tin sinh viên</h1>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?controller=sinhvien&action=edit&id=<?= $this->sinhvien->MaSV ?>" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="MaSV" class="form-label">Mã sinh viên:</label>
        <input type="text" class="form-control" id="MaSV" value="<?= htmlspecialchars($this->sinhvien->MaSV) ?>" disabled>
        <small class="form-text text-muted">Mã sinh viên không thể thay đổi.</small>
    </div>
    
    <div class="mb-3">
        <label for="HoTen" class="form-label">Họ tên:</label>
        <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?= htmlspecialchars($this->sinhvien->HoTen) ?>" maxlength="50" required>
    </div>
    
    <div class="mb-3">
        <label for="GioiTinh" class="form-label">Giới tính:</label>
        <select class="form-control" id="GioiTinh" name="GioiTinh">
            <option value="Nam" <?= $this->sinhvien->GioiTinh == 'Nam' ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= $this->sinhvien->GioiTinh == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="NgaySinh" class="form-label">Ngày sinh:</label>
        <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?= $this->sinhvien->NgaySinh ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="Hinh" class="form-label">Hình ảnh:</label>
        <input type="file" class="form-control" id="Hinh" name="Hinh">
        
        <?php if(!empty($this->sinhvien->Hinh)): ?>
        <div class="mt-2">
            <p>Hình ảnh hiện tại:</p>
            <img src="public/uploads/<?= htmlspecialchars($this->sinhvien->Hinh) ?>" alt="<?= htmlspecialchars($this->sinhvien->HoTen) ?>" class="img-thumbnail" style="max-width: 200px;">
        </div>
        <?php endif; ?>
    </div>
    
    <div class="mb-3">
        <label for="MaNganh" class="form-label">Ngành học:</label>
        <select class="form-control" id="MaNganh" name="MaNganh">
            <?php while($nganhHoc = $nganhHocs->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?= $nganhHoc['MaNganh'] ?>" <?= $this->sinhvien->MaNganh == $nganhHoc['MaNganh'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($nganhHoc['TenNganh']) ?>
                </option>
            <?php endwhile; ?>
        </select>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="index.php?controller=sinhvien&action=list" class="btn btn-secondary">Quay lại danh sách sinh viên</a>
    </div>
</form>

<?php require_once 'app/views/shares/footer.php'; ?>