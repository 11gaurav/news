<h2>News saved!<h2>


<button type="button" id="success">Go to home</button>


<script>
  document.getElementById('success').addEventListener('click', function() {
    window.location.href = '<?php echo base_url('news'); ?>';
  })
</script>