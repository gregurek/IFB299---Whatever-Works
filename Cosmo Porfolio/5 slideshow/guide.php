/// This is the code that creates the HTML page and has the jquery for the slideshow.///
<?php
	include '../includes/header.php';
?>
			<h1>How to use</h1>

<center>
<br /><br />
<div id="container">
	<ul>
      	<li><img src="../images/pic1.png" width="700" height="500" /></li>
        <li><img src="../images/pic2.png" width="700" height="500" /></li>
        <li><img src="../images/pic3.png" width="700" height="500" /></li>
		<li><img src="../images/pic4.png" width="700" height="500" /></li>
		<li><img src="../images/pic5.png" width="700" height="500" /></li>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span>
</div>
</center>

<script src="../images/jquery-1.11.3.min.js"></script>

<script>
$(window).load(function(){
		var pages = $('#container li'), current=0;
		var currentPage,nextPage;
		$('#container .button').click(function(){
			currentPage= pages.eq(current);
			if($(this).hasClass('prevButton'))
			{
				if (current <= 0)
					current=pages.length-1;
				else
					current=current-1;
			}
			else
			{
				if (current >= pages.length-1)
					current=0;
				else
					current=current+1;
			}
			nextPage = pages.eq(current);	
			currentPage.hide();	
			nextPage.show();		
		});
});
</script>

<?php
	include '../includes/footer.php';
?>