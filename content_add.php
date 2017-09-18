<?php
include_once("conf.php");
if(isset($_POST["submit"]))
{
	$content_title = addslashes($_POST["title"]);
	$content_body = addslashes($_POST["body"]);
	$content_code = addslashes(htmlspecialchars($_POST["code"]));
	$content_category = addslashes($_POST["category"]);

	$query = "INSERT INTO `content` SET `content_title` = '$content_title', `content_body`= '$content_body', `category_id` = '$content_category', `content_code`='$content_code'";

	$content_add = mysqli_query($conx, $query);

	if($content_add and mysqli_affected_rows($conx)>0)
	{
		$cont = mysqli_insert_id($conx);
				header("location: content.php?con=$cont");	
	}

	$content_title = ($_POST["title"]);
	$content_body = ($_POST["body"]);
	$content_code = ($_POST["code"]);
	$content_category = ($_POST["category"]);
}
?>
<?php
$title = "Add Content";
require_once("header.php");
?>
<style>
</style>
<div class="container">
	<?php 
	if(isset($_POST["submit"]))
	{
	?>
	<div class="alert alert-danger">Insertion failed <div class="close" data-dismiss='alert'>&times;</div></div>
	<?php
	}
	?>
	<div class="col-sm-8">
		<form method="post">
			<div class="form-group">
				<label for="">
					Title
				</label>
				<input type="text" name='title' class='form-control' value='<?=isset($content_title)?$content_title:'';?>' required>
			</div>
			<div class="form-group">
				<label for="">
					Body
				</label>
				<textarea name="body" id="" cols="30" rows="5" class="form-control" value='<?=isset($content_body)?$content_body:'';?>'  required></textarea>
			</div>
			<div class="form-group">
				<label for="">Code</label>
				<textarea name="code" id="" class="form-control" cols="30" rows="5" value='<?=isset($content_code)?$content_code:'';?>' required></textarea>
			</div>
			<div class='form-group'>
				<label for="">Category</label>
				<select name="category" class="form-control" required>
					<option value="">--Select Category--</option>
					<?php
					$category_query = mysqli_query($conx, "select * from category");
					if($category_query)
					{
						while($row = mysqli_fetch_array($category_query))
						{
							extract($row);
							if($category_id != $content_category)
							{
								echo "<option value='$category_id'>$category_name</option>";
							}else
							{
								echo "<option value='$category_id' selected>$category_name</option>";
							}
						}
					}
					?>
				</select>
			</div>
			<input type="submit" class="btn btn-primary" name="submit" value='Add'>
		</form>
	</div>
</div>
<?php
require_once("footer.php");
?>