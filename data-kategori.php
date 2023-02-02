<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoPanduColomadu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
  
    <header>
      <div class="container">
        <h1><a href="dashboard.php">TokoPandu</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
      </div>
    </header>

    <div class="section">
        <div class="container">
          <h3>Data Kategori</h3>
          <div class="box">
            <a href="tambah-kategori.php" class="btn-create">Tambah Data</a>
            <table border="1" cellspacing="0" class="table">
                <thead>
                    <tr>
                        <th width=45px>No</th>
                        <th>Kategori</th>
                        <th width=150px>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        if(mysqli_num_rows($kategori) > 0){
                        while($row = mysqli_fetch_array($kategori)){
                    
                    ?>
                    <tr>
                        <td><?php echo $no++  ?></td>
                        <td><?php echo $row['category_name'] ?></td>
                        <td>
                        <a class="btn-edit" href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a class="btn-delete" href="proses-hapus.php?idk=<?php echo $row['category_id']?>" onclick="return confirm ('Yakin Ingin Hapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php }}else{ ?>
                        <tr>
                          <td colspan="3">Tidak Ada Data</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
          </div>
        </div>
    </div>
    <footer>
      <div class="container">
        <small>Copyright &copy; 2022 - TokoPanduColomadu</small>
      </div>
    </footer>

</body>
</html>