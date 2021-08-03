<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kuisoner</h1>
    </div>

    <!-- Content Row -->

    <div class="row">

        <?php
        require_once "php/koneksi.php";
        $sql = "SELECT * FROM `table_survey`";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) :
        ?>
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['judul_survey']; ?></h5>
                    <a href="?page=detail-survei&id=<?= $row['id_survey']; ?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</div>