<?php
use yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Login';
?>

	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
	<!-- <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script> 	 -->
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
	<?php ActiveForm::end() ?>
<div class="container">
    <div class="col-md-12" style="margin-top: 60px;">
			<h3 class="margin-bottom-15" style="text-align: center; " >心理咨询登陆</h3>
			<div class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" id="username" placeholder="Telephone">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" id="password" placeholder="Password">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
	             	<div class="checkbox control-wrapper">
	                	<label>
	                  		<input type="checkbox"> 记住我
                		</label>
	              	</div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="button" value="登陆" style="width: 20%;" class="btn btn-info" onclick="userLogin();">
		          		<a href="#" class="text-right pull-right">忘记密码?</a>
		          	</div>
		          </div>
		        </div>
		        <hr>
		         <div class="text-center">
		      	<a href="<?php echo Url::to(['site/register']); ?>" class="templatemo-create-new">创建新账号 <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		      </div>
		  </div>
</div>

	<!-- <a href="<?php //echo Url::to(['site/testdb']); ?>" style="width: 20%;" class="btn btn-info" "> 登陆</a> -->

<script type="text/javascript">
	function userLogin()
	{
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
		if(!myreg.test(username)) 
		{ 
		    alert('请输入有效的手机号码！'); 
		    return false; 
		}

		if(password==""){
			alert("请输入密码");
			return;
		}
		// alert(username); 
		// 进行验证
		var data ={
			username: username,
			password: password,
		};
		$.ajax({
		    url: '<?php echo Url::to(['site/login']); ?>',
		    type: 'post',
		    data: data,
		    success: function (data) {
		     	//实现自动跳转
		     	if(data.status == 200){
		     		if(data.user_type == 2){
		     		 	document.location = '<?php echo Url::to(['site/message']); ?>';
		     		}else{
		     			document.location = '<?php echo Url::to(['site/index']); ?>';
		     		}
		     		
		     	}else{
		     		alert('用户名或密码不正确');
		     	}
		     
		    },
		    error: function(data) {
              	alert("Sorry error");
			}
		});
			
	}

</script>



<div style="margin-bottom: 200px;">	
</div>










