<?php	
	if(isset($_GET["update"]))
	{
		$id=ClearData($_GET["update"],"i");
		if($id>0)
		{
			$SQL_update_feature_stories = "SELECT * FROM feature_stories WHERE id=$id";
			$result_update = mysql_query($SQL_update_feature_stories)or die(mysql_error());
			$data_update = mysql_fetch_assoc($result_update);
			printf('
			<div class="Blue_form">
				<form class="form-horizontal form_size" role="form" method="post" name="stories">
					<div class="row">
						<div class="col-xs-11 col-sm-11 col-md-11 margin_textarea">
							<div class="form-group">
								<div class="form-group">
									<label class="control-label" for="inputSuccess">Текст статьи</label>
									<textarea type="text" class="form-control border_grin " rows="4" name="body">%s</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 col-sm-2 col-md-2 col-md-offset-10">
							<div class="form-group">
								<button type="submit" class="btn btn-success ">Сохранить</button>
							</div>
						</div>
					</div>
					<input type="text" class="display_none" name="up" value="%s" ></input>
					<input type="text" class="display_none" name="form" value="3" ></input>
				</form>
			</div>
			',$data_update["body"],$data_update["id"]);
		}
	} else {
 ?>
			<div class="Blue_form">
				<form class="form-horizontal form_size" role="form" method="post" name="stories">
					<div class="row">
						<div class="col-xs-5 col-sm-5 col-md-5">
							<div class="form-group">
								<label class="control-label" for="inputSuccess">Тема</label>
								<input type="text" class="form-control border_grin" name="title" ></input>
							</div>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5">
							<div class="form-group ">
								<label class="control-label" for="inputSuccess">Автор</label>
								<input type="text" class="form-control border_grin" name="author" ></input>
							</div>
						</div>
						<div class="col-xs-2 col-sm-2 col-md-2">
							<div class="form-group ">
								<button type="submit" class="btn btn-success margin_sabmit">Создать</button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-11 col-sm-11 col-md-11 margin_textarea">
							<div class="form-group">
								<div class="form-group">
									<label class="control-label" for="inputSuccess">Текст</label>
									<textarea type="text" class="form-control border_grin " rows="4" name="body"></textarea>
								</div>
							</div>
						</div>
					</div>
					<input type="text" class="display_none" name="form" value="1" ></input>
				</form>
			</div>
<?php }?>