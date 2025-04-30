<p title="Home page">This is home page</p>
<button type="button" onclick="window.location.href='<?php echo base_url('news'); ?>'" style="text-decoration:none; color:inherit" >Go to News Page
</button>




<script>
  document.getElementById('goToNewsBtn').addEventListener('click', function() {
    window.location.href = '<?php echo base_url('news'); ?>';
  })
</script>