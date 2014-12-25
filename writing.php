<?php
					$result_feature_stories = mysql_query("SELECT * FROM feature_stories ORDER bY id DESC")or die(mysql_error());
					//$Data_feature_stories = mysql_fetch_array($result_feature_stories,MYSQL_ASSOC);
					
					$Data_feature_stories = mysql_fetch_assoc($result_feature_stories);
					
					do{
					 
						printf(
'<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a class="accordion-toggle bold_hover" data-toggle="collapse" data-parent="#accordion" href="#collapse%s">
				<Span class="tema">%s</span> <span class="author">%s</span>
			</a>
		</h4>
	</div>
	<div id="collapse%s" class="panel-collapse collapse ">
		<div class="panel-body">
			
				%s
			
			<div class="pull-right add_margin_top_buttom ">
					<div class="form-group inline">
						<a class="btn btn-success min_siz"><span class="glyphicon glyphicon-chevron-down"></span></a>
					</div>
					<div class="form-group inline">
						<a class="btn btn-success min_siz" href="blog.php?update=%s"><span class="glyphicon glyphicon-pencil"></span></a>
					</div>
					<div class="form-group inline">
						<a  class="btn btn-success min_siz" href="blog.php?del=%s"><span class="glyphicon glyphicon-trash" ></span></a>
					</div>
			</div>
			<hr>
			 
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 notice">
					Что вы думаете об этой статье? 
				</div>
				<div class="comment_form_begraund col-xs-9 col-sm-9 col-md-9 ">
				
					<form class="form-horizontal form_size" role="form" method="post" name="comment%s" >

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 ">
								
									<div class="form-group">
										<label class="control-label" for="inputSuccess">Комментарий</label>
										<textarea type="text" class="form-control border_grin " rows="2" name="body_comment"></textarea>
									</div>
								
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-10 col-sm-10 col-md-10">
								<div class="form-group ">
									<label class="control-label" for="inputSuccess">Автор</label>
									<input type="text" class="form-control border_grin" name="author_comment"></input>
								</div>
							</div>
							<input type="text" class="display_none" name="stories_comment" value="%s" ></input>
							<input type="text" class="display_none" name="form" value="2" ></input>
							<div class="col-xs-2 col-sm-2 col-md-2">
								<div class="form-group ">
									<button type="submit" class="btn btn-success margin_sabmit">Отправить</button>
								</div>
							</div>
						</div>
						
					</form>
				</div>
			</div>
			<hr>
			 ',$Data_feature_stories["id"],$Data_feature_stories["title"],$Data_feature_stories["author"],$Data_feature_stories["id"], nl2br($Data_feature_stories["body"]), $Data_feature_stories["id"], $Data_feature_stories["id"],$Data_feature_stories["id"],$Data_feature_stories["id"]);



			$result_comment = mysql_query("SELECT * FROM comment")or die(mysql_error());
			$Data_comment = mysql_fetch_assoc($result_comment);
									
			do{
				if($Data_feature_stories["id"] == $Data_comment["id_stories"])
				{
					printf('<div class="panel panel-primary">
				<div class="panel-heading author-begraund"><span class="author-comment">%s</SPAN></div>
					<div class="panel-body">
						%s
					</div>
				</div>',$Data_comment["author"], nl2br($Data_comment["body"]));
				}
			}
			while($Data_comment = mysql_fetch_assoc($result_comment));
										
			printf('
			</div>
		</div>
	</div>'); 
		
		}
		while($Data_feature_stories = mysql_fetch_assoc($result_feature_stories));		
	?>