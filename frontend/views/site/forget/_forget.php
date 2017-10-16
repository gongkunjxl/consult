<?php
use yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = '重置密码页面';
?>

	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
	<link href="css/login.css" rel="stylesheet" type="text/css">	
	<!-- <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script> 	 -->
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
	<?php ActiveForm::end() ?>
<div class="container">
    <div class="col-md-12" style="margin-top: 60px;">
			<h3 class="margin-bottom-15" style="text-align: center; " >重置密码页面</h3>
			<div class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" id="username" placeholder="手机号">
		            </div>		            	            
		          </div>              
		        </div>
		        <!-- 验证码 -->
		        <div class="form-group">
		       		 <div class="col-md-12">
		       		 	 <div class="control-wrapper">
				            <input type="text" class="form-control text-code"  style="width: 130px;" id="userVerycode" placeholder="请输入验证码"> 
				            <!-- <span class="label-code"> 获取验证码</span>        		            		             -->
				          	 <input type="button" class="label-code" value="获取验证码" style="border-radius: 3px; border: 0; text-align: center;padding:0;"  id="btn" onclick="userGetcode(this)">
				          </div>   
				     </div>     
		        </div>

		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" id="userPassword" placeholder="新密码(至少6个字符)">
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" id="uconfPassword" placeholder="确认密码(至少6个字符)">
		            </div>
		          </div>
		        </div>
		        
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="button" value="重置密码" style="width: 100px;" class="btn btn-info" onclick="userLogin();">
		          		
		          	</div>
		          </div>
		        </div>
		      </div>
		  </div>
</div>

	<!-- <a href="<?php// echo Url::to(['site/message']); ?>" style="width: 20%;" class="btn btn-info" "> 登陆</a> -->

<script type="text/javascript">

		var countdown=60; 
		function settime(obj) { 
			if (countdown == 0) { 
		        obj.removeAttribute("disabled");    
		        obj.value="获取验证码"; 
		        countdown = 60; 
		        return;
		    } else { 
		        obj.setAttribute("disabled", true); 
		        obj.value="重新发送(" + countdown + ")"; 
		        countdown--; 
		    } 
			setTimeout(function() { 
			    settime(obj) }
			    ,1000) 
		}

		//对手机号进行验证 status: 200代表手机号未注册  100已经注册
		function veryPhone(username)
		{
			var re_status = 300;
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
			if(!myreg.test(username)) 
			{ 
			    alert('请输入有效的手机号码！'); 
			    return $re_status; 
			}

			var data={
				username: username,
			};
			re_status=100;
			$.ajax({
			    url: '<?php echo Url::to(['site/regphone']); ?>',
			    type: 'post',
			    async: false,
			    data: data,
			    success: function (data) {
			     	// alert(data.status);
			     	re_status = data.status;
			    },
			    error: function(data) {
               	 	alert("Sorry error");
				}

			});
			return re_status;
		}

		//获取手机验证码 100是获取成功 200是获取失败
		function getVercode(username)
		{
			var data={
				username: username,
			};
			var re_status=100;
			$.ajax({
			    url: '<?php echo Url::to(['site/getcode']); ?>',
			    type: 'post',
			    async: false,
			    data: data,
			    success: function (data) {
			     	alert('验证码发送成功');
			     	re_status = data.status;
			    },
			    error: function(data) {
               	 	alert("Sorry error");
				}

			});
			return re_status;

		}
		//验证码的有效性 五分钟内有效
		function checkVercode(phoneNum,verCode)
		{
			var data={
				phoneNum: phoneNum,
				verCode: verCode
			};
			var re_status=100;
			$.ajax({
			    url: '<?php echo Url::to(['site/vercode']); ?>',
			    type: 'post',
			    async: false,
			    data: data,
			    success: function (data) {
			     	// alert(data.status);
			     	re_status = data.status;
			    },
			    error: function(data) {
               	 	alert("Sorry error");
				}

			});
			return re_status;
		}	

		function userGetcode(obj)
		{	
			//判断手机号已经注册 
			var username = document.getElementById("username").value;
			var status = veryPhone(username);
			if(status ==300){
				return false;
			}
			if(status == 100){
				settime(obj);
			}else{
				alert('该手机号未注册');
				return;
			}	
			getVercode(username);
		}


	function userLogin()
	{
		var username = document.getElementById("username").value;
		var vercode = document.getElementById("userVerycode").value;
		//验证验证码有效性
		if(checkVercode(username,vercode)==100){
			alert('验证码错误');
			return false;
		}
		var userPassword = document.getElementById("userPassword").value;
		var uconfpassword = document.getElementById("uconfPassword").value;
		if(userPassword.length <6  || uconfpassword.length <6){
			alert('密码长度至少6个字符');
			return false;
		}
		if(userPassword != uconfpassword){
			alert('两次输入不一样');
			return false;
		}
		
		var data ={
			username: username,
			password: userPassword,
		};
		// alert('come helpers');
		$.ajax({
		    url: '<?php echo Url::to(['site/forget']); ?>',
		    type: 'post',
		    data: data,
		    success: function (data) {
		     	//实现自动跳转
		     	if(data.status == 200){
		     		alert('修改密码成功');
		     		document.location = '<?php echo Url::to(['site/login']); ?>';
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










