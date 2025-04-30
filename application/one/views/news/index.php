
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <!-- Include Bootstrap CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom Inline CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        .main {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        button {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #218838;
        }

        .news-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .news-item h3 {
            color: red;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color:grey;
        }
    </style>

</head>
<body>

    <h2><?php echo $title; ?></h2>
    <div class="button-container" style="display: flex; justify-content: center; margin-bottom: 20px;">
    <button id="create_news" style="background-color: #28a745; border: none; color: white; padding: 10px 20px; font-size: 16px; cursor: pointer; border-radius: 5px;">
        Create News
    </button>
</div>


    <?php foreach ($news as $news_item): ?>

        <div class="news-item">
            <h3><?=$news_item['title']; ?></h3>
            <div class="main">
                <?=$news_item['text']; ?>
            </div>
            <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>
        </div>

    <?php endforeach; ?>

    <script>
        document.getElementById('create_news').addEventListener('click',function(){
            window.location.href='<?php echo base_url('news/create'); ?>'
        })
    </script>

</body>

