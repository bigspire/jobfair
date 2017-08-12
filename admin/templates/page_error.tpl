{* Purpose : error page.
   Created : Nikitasa
   Date : 17-11-2016 *}

	{include file='include/header.tpl'}		
	{include file='include/menu.tpl'}
	
	<div class="container-fluid" id="content">
		<div id="main">
			<div class="container-fluid">
				<div class="page-header">	
				</div>
				<div class="breadcrumbs">
					<ul>
						<li>
							
							<i class="icon-angle-right"></i>
						</li>
					</ul>
				</div>
						<div class="row-fluid  footer_div previewDiv" >
					<div class="span12">
						<div class="box box-bordered box-color">
						<form action=" " name="" id="formID" class="" method="post" accept-charset="utf-8">	
							
						<div class="dataTables_wrapper"><br>
						<h1 align="center">{$ntfd}</h1> 
						<h3 align="center">{$msg}</h3><br><br>
						<a href="jobfair.php" ><button type="button" style="margin-left:600px;" val="jobfair.php" class="jsRedirect btn regCancel">Back</button></a>
							</div>
						 </form>						
						 </div>
					</div>
				</div>
			 </div>
	    </div>			
	</div>
	{include file='include/footer.tpl'}
