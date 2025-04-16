<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kalkulator Sederhana | UKK 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <style type="text/css">
    .btn {
      width: 100%;
    }
    .logo {
      display: block;
      margin: 0 auto;
      width: 150px; /* You can adjust the width as per your logo's size */
      height: auto;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <!-- Logo Section -->
    <div class="text-center mb-4">
    <img src="logo.jpg" alt="Logo Kalkulator" class="logo">
    </div>

    <h2 class="text-center">Kalkulator</h2>
    <div class="row justify-content-center">
      <div class="col-md-4">
        <form method="POST" class="p-2 border rounded bg-light">
          <label class="form-label">Angka Pertama</label>
          <input type="text" name="angka1" class="form-control" autocomplete="off" min="0" autofocus required 
                 oninput="this.value = this.value.replace(/[^0-9,\.]/g, '')" 
                 value ="<?php echo isset($_POST['hasil']) ? $_POST['hasil'] : ''?>">
          <label class="form-label">Angka Kedua</label>
          <input type="text" name="angka2" class="form-control" required oninput="this.value = this.value.replace(/[^0-9,\.]/g, '')">
          <div class="d-flex justify-content-center gap-2 mt-2">
            <button type="submit" class="btn btn-primary" name="operator" value="+" title="Tambah"><i class="fas fa-plus"></i></button>
            <button type="submit" class="btn btn-secondary" name="operator" value="-" title="Kurang"><i class="fas fa-minus"></i></button>
            <button type="submit" class="btn btn-success" name="operator" value="*" title="Kali"><i class="fas fa-times"></i></button>
            <button type="submit" class="btn btn-info" name="operator" value="/" title="Bagi"><i class="fas fa-divide"></i></button>
          </div>
          <div class="d-flex justify-content-center gap-2 mt-2">
            <button type="reset" name="reset" class="btn btn-warning" value="reset" title="Clear Entry">CE</button>
          </div>
        </form>

        <div class="p-2 border rounded bg-light mt-2">
          <h4 class="text-center">
            <?php
              if (isset($_POST['operator'])) {
                // Replace commas with periods for calculations
                $angka1 = str_replace([','], ['.'], $_POST['angka1']);
                $angka2 = str_replace([','], ['.'], $_POST['angka2']);
                $operator = $_POST['operator'];
                
                if (!is_numeric($angka1) || !is_numeric($angka2)) {
                  echo "<script>alert('Input harus berupa angka')</script>";
                } elseif ($operator == '/' && $angka2 == 0) {
                  echo "<script>alert('Tidak dapat membagi dengan Nol')</script>";
                } else {
                  switch ($operator) {
                    case '+':
                      $hasil = $angka1 + $angka2;
                      break;
                    case '-':
                      $hasil = $angka1 - $angka2;
                      break;
                    case '*':
                      $hasil = $angka1 * $angka2;
                      break;
                    case '/':
                      $hasil = $angka1 / $angka2;
                      break;
                    default:
                      echo "Operator tidak valid";
                      break;
                  }
                  // Format the result with comma as decimal separator
                  echo (fmod($hasil, 1) == 0) ? number_format($hasil, 0, ',', '.') : number_format($hasil, 5, ',', '.');
                }   
              } else {
                echo "Hasil : ";
              }
            ?>
          </h4>

          <div class="row mt-3">
            <div class="col-6">
              <?php if (isset($hasil) && $hasil !== null) : ?>
                <form method="POST">
                  <input type="hidden" name="hasil" value="<?php echo $hasil ?>">
                  <button type="submit" class="btn btn-primary" title="Memory Entry">ME</button>
                </form>
              <?php endif; ?>
            </div>
            <div class="col-6">
              <?php if (isset($hasil) && $hasil !== null) : ?>
                <form method="POST">
                  <button type="submit" name="resethasil" class="btn btn-danger" title="Memory Clear">MC</button>
                </form>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <p class="text-center">&copy; UKK RPL 2025 | Febrika Putri Diana | XII PPLG</p>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
