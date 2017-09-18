<?php
include("header.php");
if(isset($_GET["cat"]))
{
	$cat = $_GET["cat"];
}
?>
<style>
	a.selected
	{
		font-weight: bolder;
		text-decoration:underline;
		text-decoration-style: double;
	}
</style>
<div class="container">
	<div class="col-sm-3">
		<h3>Categories</h3>
		<ul>
			<li>
			
				<a href="index.php" class="<?= isset($cat)!=true?'selected':'';?>">
				All (<?=get_num_rows("content", "1=1");?>)
				</a>
			</li>
			<?php
			$cat_query = mysqli_query($conx, "SELECT * FROM category");
			if($cat_query && mysqli_num_rows($cat_query)>0)
			{
				while($row = mysqli_fetch_array($cat_query, 1))
				{
					extract($row);
					
					$content_count =  get_num_rows("content", "category_id=$category_id");
					
					echo "<li>";
					if(isset($cat) and $category_id == $cat)
					{
						echo "<a href='index.php?cat=$category_id' class='selected'>$category_name ($content_count)</a>";
						$cat_name = $category_name;
					}else
					{
						echo "<a href='index.php?cat=$category_id'>$category_name($content_count)</a>";
					}
					
					echo "</li>";
				}
			}
			?>
		</ul>
	</div>

	<div class="col-sm-6">
		<?php

		if(isset($cat_name))
		{
			echo "<h3>$cat_name</h3>";
		}

		$content_where = " content.category_id = category.category_id ";

		if(isset($cat))
		{
			$content_where .= " && category.category_id=$cat";
		}

		$content_query = mysqli_query($conx, "SELECT content.*, category.category_name as content_category_name FROM content,  category WHERE  $content_where ORDER BY `content`.`content_date` DESC");

		if($content_query and mysqli_num_rows($content_query)>0)
		{
			while($row = mysqli_fetch_array($content_query, 1))
			{
				extract($row);
				$href = "content.php?con=$content_id";
		?>
		<div class='home-content'>
			<div class="content-title">
				<h3>
					<a href="<?=$href;?>"><?=$content_title?></a>
				</h3>
			</div>
			<div class="content-body">
				<?= substr($content_body, 0, 200);?>
				<br>
				<a href="<?=$href;?>">Read more..</a>
			</div>
			<div class='read-more'>

			</div>
		</div>
		<?php
			}
		}else
		{
			echo "<p>No content in this category</p>";
		}
		?>
	</div>

	<div class="col-sm-3">

	</div>

</div>
<?php
include("footer.php");
?>