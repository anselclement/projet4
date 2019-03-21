<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?= $title ?></title>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea',
                           entity_encoding : 'raw',
                           plugins: 'wordcount',
                           forced_root_block : false,
                           force_p_newlines : false });</script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body class="has-navbar-fixed-top">

    <?php include('header.php'); ?>

    <section id="content">
        <?= $content ?>
    </section>
    

<script src="../public/js/responsive.js"></script>
</body>

</html>