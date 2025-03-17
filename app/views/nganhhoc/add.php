<?php require_once 'app/views/shares/header.php'; ?>

<h1 class="mb-4">Thêm ngành học mới</h1>

<?php if(isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<form method="post" action="index.php?controller=nganhhoc&action=add">
    <div class="mb-3">
        <label for="MaNganh" class="form-label">Mã ngành:</label>
        <input type="text" class="form-control" id="MaNganh" name="MaNganh" maxlength="4" required>
        <small class="form-text text-muted">Mã ngành phải có tối đa 4 ký tự.</small>
    </div>
    
    <div class="mb-3">
        <label for="TenNganh" class="form-label">Tên ngành:</label>
        <input type="text" class="form-control" id="TenNganh" name="TenNganh" maxlength="30" required>
        <small class="form-text text-muted">Tên ngành phải có tối đa 30 ký tự.</small>
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Thêm ngành học</button>
        <a href="index.php?controller=nganhhoc&action=list" class="btn btn-secondary">Quay lại danh sách ngành học</a>
    </div>
</form>

<?php require_once 'app/views/shares/footer.php'; ?>