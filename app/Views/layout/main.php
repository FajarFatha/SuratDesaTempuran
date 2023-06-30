<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/img/ngawi.svg">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <!-- <script src="/public/js/script.js"></script> -->
</head>

<body>
    <div class="main">
        <?= $this->include('layout/navbar'); ?>
        <?= $this->renderSection('konten'); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        function previewImg() {
            const sampul = document.querySelector('#sampul');
            const imgPreview = document.querySelector('.img-preview');

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);
            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }

    </script>

</body>

</html>