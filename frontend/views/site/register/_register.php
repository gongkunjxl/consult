<?php
use yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Register';
?>
	
	<link href="swiper/page_style.css" rel="stylesheet" type="text/css"><!--页面所需样式-->
	<!-- <link href="swiper/font-awesome.css" rel="stylesheet" type="text/css"><!--字体图标--> -->
	<!-- <link href="swiper/public.css" rel="stylesheet" type="text/css"><!--默认共用样式--> -->
	<!-- <link rel="stylesheet" href="swiper/swiper.min.css"> -->
	<!-- <script src="swiper/swiper.min.js"></script> -->
	<!-- <script src="js/jquery-1.8.3.min.js" type="text/javascript"></script> -->

	<!-- <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
	<!-- <link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	 -->
	<!-- 增加注册css -->
	<!-- <link href="css/login.css" rel="stylesheet" type="text/css">	 -->



	<!--  实现数据上传到控制器  -->
	<script type="text/javascript">
		 
		/* 短信验证码获取 */
		//设置验证码获取的倒计时
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
			var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
			if(!myreg.test(username)) 
			{ 
			    alert('请输入有效的手机号码！'); 
			    return false; 
			}

			var data={
				username: username,
			};
			var re_status=100;
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

		// 获取验证码接口
		function docGetcode(obj)
		{	
			//判断手机号已经注册 
			var username = document.getElementById("docTel").value;
			var status = veryPhone(username);
			if(status == 200){
				settime(obj);
			}else{
				alert('手机号已经注册 请直接登录');
				return;
			}	
			getVercode(username);
		}


		//  上传docker信息
		function doctorReg($this)
		{

			// alert('doctorLogin');
			var user_type = 1;
			var docTel = document.getElementById("docTel").value;
			var vercode = document.getElementById("docVerycode").value;
			//验证验证码有效性
			if(checkVercode(docTel,vercode)==100){
				alert('验证码错误');
				return false;
			}

			var docPassword = document.getElementById("docPassword").value;
			var confpassword = document.getElementById("confPassword").value;
			if(docPassword.length <6  || confpassword.length <6){
				alert('密码长度至少6个字符');
				return false;
			}
			if(docPassword != confpassword){
				alert('两次输入不一样');
				return false;
			}

			var docName = document.getElementById("docName").value;
			var docWeixin = document.getElementById("docWeixin").value;
			if(docName == ""){
				alert("请填写真实姓名");
				return;
			}
			if(docWeixin == ""){
				alert("请填写微信号");
				return;
			}

			var onPrice = document.getElementById("onPrice").value;
			var offPrice = document.getElementById("offPrice").value;
			if(isNaN(onPrice) || isNaN(onPrice) )
			{
				alert('价格格式不对');
				return;
			}

			var docDesp = document.getElementById("docDesp").value;
			if(docDesp =="" || docDesp.length<20){
				alert('执业背景描述不够');
				return;
			}

			var doc_path= document.getElementById("uploadform-imagefiles-0").value;
			// alert(doc_path);
			if(doc_path == ""){
				alert('请选择上传头像');
				return false;
			}		

			var bus_path= document.getElementById("uploadform-imagefiles-1").value;
			if(bus_path == ""){
				alert('请选择上传营业执照');
				return false;
			}

			var id_path= document.getElementById("uploadform-imagefiles-3").value;
			if(id_path == ""){
				alert('请选择上传手持身份证照片');
				return false;
			}
			//下面开始ajax注册 手机号 验证码 密码
			var data={
				uTel: docTel,
				uType: user_type,
				uVerycode: vercode,
				uPassword: docPassword,
				nickname: docName,
				weixin: docWeixin,
				onPrice: onPrice,
				offPrice: offPrice,
				desp: docDesp,
			};
			$.ajax({
			    url: '<?php echo Url::to(['site/reginfo']); ?>',
			    type: 'post',
			    async: false,
			    data: data,
			    success: function (data) {

			     	// alert(data.status);
			     	//完成后进行图片上传 和在form中完成了跳转
			     	if(data.status == 200)
			     	{
			     		alert('注册成功');
						document.getElementById("target").click();
			     	}else{
			     		alert('注册失败');
			     	}
			    },
			    error: function(data) {
               	 	alert("Sorry error");
				}

			});
			
		}

	</script>

	<!-- Modal -->
		<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
		      </div>
		     
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

	</div>

        
	
</div>
</div>

<!-- 用户的数据上传 -->
<script type="text/javascript">
	function userGetcode(obj)
	{	
		//判断手机号已经注册
		var username = document.getElementById("userTel").value;
		var status = veryPhone(username);
		if(status == 200){
			settime(obj);
		}else{
			alert('手机号已经注册 请直接登录');
			return;
		}	
		getVercode(username);
	}

	//普通用户注册
	function userReg($this)
	{
		// alert('userReg');
		var user_type = 2;
		var userTel = document.getElementById("userTel").value;
		var vercode = document.getElementById("userVerycode").value;
		//验证验证码有效性
		if(checkVercode(userTel,vercode)==100){
			alert('验证码错误');
			return false;
		}
		//用户昵称
		var nickname =  document.getElementById("userNickname").value;

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
		
		//下面开始ajax注册 手机号 验证码 密码
		var data={
		uTel: userTel,
		uType: user_type,
		uNickname: nickname,
		uVerycode: vercode,
		uPassword: userPassword,
		};

		$.ajax({
		    url: '<?php echo Url::to(['site/reginfo']); ?>',
		    type: 'post',
		    data: data,
		    success: function (data) {
		    	// alert('success');
		     	// alert(data.status);
		     	if(data.status == 200)
			     {
			     	alert('注册成功');
					document.location = '<?php echo Url::to(['site/index']); ?>';
			     }else{
			     	alert('注册失败');
			     }
		    },
		    error: function(data) {
             alert("Sorry error");
		}

		});
	}


</script>



<!-- 预览上传的图片 -->
<script type="text/javascript">

	function headImagePreview(avalue) {
		var docObj=document.getElementById("uploadform-imagefiles-0");

		var imgObjPreview=document.getElementById("previewHead");
		if(docObj.files &&docObj.files[0])
		{
		//火狐下，直接设img属性
			imgObjPreview.style.display = 'block';
			imgObjPreview.style.width = '180px';
			imgObjPreview.style.height = '180px';
		//imgObjPreview.src = docObj.files[0].getAsDataURL();

		//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
			imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
		}
			return true;
	}
	function busImagePreview(avalue) {
		var docObj=document.getElementById("uploadform-imagefiles-1");

		var imgObjPreview=document.getElementById("previewBus");
		if(docObj.files &&docObj.files[0])
		{
		//火狐下，直接设img属性
			imgObjPreview.style.display = 'block';
			imgObjPreview.style.width = '180px';
			imgObjPreview.style.height = '180px';
		//imgObjPreview.src = docObj.files[0].getAsDataURL();

		//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
			imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
		}
			return true;
	}

	function idImagePreview(avalue) {
		var docObj=document.getElementById("uploadform-imagefiles-3");

		var imgObjPreview=document.getElementById("previewID");
		if(docObj.files &&docObj.files[0])
		{
		//火狐下，直接设img属性
			imgObjPreview.style.display = 'block';
			imgObjPreview.style.width = '180px';
			imgObjPreview.style.height = '180px';
		//imgObjPreview.src = docObj.files[0].getAsDataURL();

		//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
			imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
		}
			return true;
	}

</script>





<script> 
var mySwiper = new Swiper('.swiper-container',{
pagination: '.my-pagination-ul',
paginationClickable: true,
paginationBulletRender: function (index, className) {
switch (index) {
  case 0: name='普通用户';break;
  case 1: name='医生注册';break;
  
  default: name='';
}
      return '<li id="switch" value="'+index+'"'+' class="' + className + '">' + name + '</li>';
  }
})
</script>


<div style="margin-bottom: 100px;">	
</div>
























