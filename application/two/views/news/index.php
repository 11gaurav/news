<h2><?php echo $title; ?></h2>
<button id="create_news" style="text-decoration:none; color:inherit" >Create News
</button>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>


<script>
document.getElementById("create_news").addEventListener('click',function(){
  window.location.href='<?php echo base_url('news/create'); ?>'
})

</script>