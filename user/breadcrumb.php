<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <?php
        switch (basename($_SERVER["PHP_SELF"])) {
            case 'index.php':
                echo '<li class="breadcrumb-item active">Home</li>';
                break;
            case 'materi.php':
                echo '<li class="breadcrumb-item"><a href="index.php">Home</a></li>';
                echo '<li class="breadcrumb-item active">Materi</li>';
                break;
            case 'konten_materi.php':
                echo '<li class="breadcrumb-item"><a href="index.php">Home</a></li>';
                echo '<li class="breadcrumb-item active">Konten Materi</li>';
                break;
            default:
                echo '<li class="breadcrumb-item active"><a href="index.php">Home</a></li>';
                break;
        }
        ?>
    </ol>
</nav>