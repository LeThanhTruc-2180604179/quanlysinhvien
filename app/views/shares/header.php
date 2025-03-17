<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Quản lý sinh viên</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSinhVien" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-graduate"></i> Sinh viên
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownSinhVien">
                        <a class="dropdown-item" href="index.php?controller=sinhvien&action=list">Danh sách sinh viên</a>
                        <a class="dropdown-item" href="index.php?controller=sinhvien&action=add">Thêm sinh viên</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownNganhHoc" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-graduation-cap"></i> Ngành học
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownNganhHoc">
                        <a class="dropdown-item" href="index.php?controller=nganhhoc&action=list">Danh sách ngành học</a>
                        <a class="dropdown-item" href="index.php?controller=nganhhoc&action=add">Thêm ngành học</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownHocPhan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book"></i> Học phần
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownHocPhan">
                        <a class="dropdown-item" href="index.php?controller=hocphan&action=list">Danh sách học phần</a>
                        <a class="dropdown-item" href="index.php?controller=hocphan&action=add">Thêm học phần</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDangKy" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i> Đăng ký học phần
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownDangKy">
                        <a class="dropdown-item" href="index.php?controller=dangky&action=cart">Giỏ đăng ký</a>
                        <a class="dropdown-item" href="index.php?controller=dangky&action=history">Lịch sử đăng ký</a>
                    </div>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <?php if(isset($_SESSION['MaSV'])): ?>
                <li class="nav-item">
                    <span class="nav-link">
                        <i class="fas fa-user"></i> 
                        <?= htmlspecialchars($_SESSION['HoTen']) ?> 
                        (<?= htmlspecialchars($_SESSION['MaSV']) ?>)
                    </span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=dangky&action=logout">
                        <i class="fas fa-sign-out-alt"></i> Đăng xuất
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=dangky&action=login">
                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                    </a>
                </li>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=dangky&action=cart">
                        <i class="fas fa-shopping-cart"></i> 
                        <span class="badge badge-pill badge-danger">
                            <?= count($_SESSION['cart']) ?>
                        </span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">