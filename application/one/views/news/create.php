<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

</head>

<body>
    <div class="container form-container">
        <div class="form-card">
        <h4 style="color: red;"><?= !empty($error['error'])?$error['error']:''; ?></h4>

            <h2><?= $title; ?></h2>
            
            <?= validation_errors(); ?>
            
            <?= form_open_multipart('news/create'); ?>

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" value ="<?php echo set_value('title'); ?>" class="form-control" id="title" placeholder="Enter the news title">
            </div>

            <div class="form-group mb-3">
                <label for="text">Text</label>
                <textarea name="text" class="form-control"  id="text" rows="4" placeholder="Enter the news content"><?php echo set_value('text'); ?></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="file">File Upload</label>
                <input type="file" name="userfile" class="form-control" id="file" size="20">
            </div>

            <div class="text-center mt-2">
                <input type="submit" name="submit" class="btn btn-primary" value="Create News Item">
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</body>
