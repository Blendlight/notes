<?php
include("header.php");
if(isset($_GET["con"]))
{
	$contentid = $_GET["con"];
}else
{
	header("location: ./");
}
?>
<div class="container">
	<div class="col-sm-6">
		<?php
		$content_query =  "SELECT content.*, category.category_name as content_category_name
		FROM
								`content`
								JOIN category
								ON category.category_id=content.category_id
							WHERE 
								content_id = $contentid";

		$content_query = mysqli_query($conx,$content_query);

		if($content_query and mysqli_num_rows($content_query)>0)
		{
			while($row = mysqli_fetch_array($content_query, 1))
			{
				extract($row);
		?>
		<div class='content'>
			<div class="content-title">
				<h3>
					<?=$content_title?>
				</h3>
			</div>
			<div class="content-body">
				<p>
					<?=$content_body?>
				</p>
			</div>
			<div class="content-code">
				<pre><?=$content_code?></pre>
			</div>
			
		</div>
		<?php
			}
		}
		?>
	</div>

	<div class="col-sm-3">

	</div>

</div>
<?php
include("footer.php");
?>