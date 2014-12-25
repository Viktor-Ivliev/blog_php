<?php	
	 
	define("DB_HOST","localhost");
	define("DB_LOGIN","root");
	define("DB_PASSWORD","karl13");
	define("DB_NAME","blog_content");
 
	$connect = mysql_connect(DB_HOST,DB_LOGIN,DB_PASSWORD) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	
	/*mysql_query ("set character_set_client='cp1251'");  
	mysql_query ("set character_set_results='cp1251'");  
	mysql_query ("set collation_connection='cp1251_general_ci'");*/
	

	function ClearData($data, $type="s"){
		switch($type)
		{
			case "s": 
					$data = trim(strip_tags($data)); break;
			case "i": 
					$data = abs((int)$data); break;
		}
		return $data;
		// break;
	 }
	
	
	if($_POST['form']==1)
	{
		if(!empty($_POST['title']) and !empty($_POST['body']))
		{
			$title_stories = ClearData($_POST['title']);
			$body_stories = ClearData($_POST['body']);
			$author_stories = ClearData($_POST['author']);
			$stories_sql = "INSERT INTO feature_stories(title, body, author)
										VALUES('$title_stories','$body_stories','$author_stories')";
			mysql_query($stories_sql)or die(mysql_error());
			header("Location: blog.php");
			exit;
		}
	}
	
	if($_POST['form']==2)
	{
		if(!empty($_POST['author_comment']) and !empty($_POST['body_comment']))
		{
			$comment_author = ClearData($_POST['author_comment']);
			$comment_body = ClearData($_POST['body_comment']);
			$comment_id_stories = $_POST['stories_comment'];
			$comment_sql = "INSERT INTO comment(id_stories, author, body)
										VALUES('$comment_id_stories','$comment_author','$comment_body')";
			mysql_query($comment_sql)or die(mysql_error());
			header("Location: blog.php");
			exit;
		}
	}
	if($_POST['form']==3)
	{
		if(!empty($_POST['body']))
		{
			$body_stories = ClearData($_POST['body']);
			$id=ClearData($_POST["up"],"i");
			$stories_sql_update = "UPDATE feature_stories SET body = '$body_stories' WHERE id = $id";
			mysql_query($stories_sql_update);
			
			header("Location: blog.php");
			exit;
		}
	}
	
	
	if(isset($_GET["del"]))
	{
		$id=ClearData($_GET["del"],"i");
		
		if($id>0)
		{
			$SQL_delet_feature_stories = "DELETE FROM feature_stories WHERE id=$id";
			mysql_query($SQL_delet_feature_stories)or die(mysql_error());
			$SQL_delet_comment = "DELETE FROM comment WHERE id_stories=$id";
			mysql_query($SQL_delet_comment)or die(mysql_error());
		}
		header("Location: blog.php");
		exit;
		
	}
	
?>