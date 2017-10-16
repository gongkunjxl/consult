<?php
use yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Register';
?>	
	<link href="swiper/page_style.css" rel="stylesheet" type="text/css"><!--页面所需样式 -->
	<link href="swiper/font-awesome.css" rel="stylesheet" type="text/css"><!--字体图标 -->
	<link rel="stylesheet" href="swiper/swiper.min.css">
	<!-- <script src="swiper/swiper.min.js" type="text/javascript"></script> -->

	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
	<!-- 增加注册css -->
	<link href="css/login.css" rel="stylesheet" type="text/css">	

<div class="swiper-container swiper-width" >
<!-- 	<div class="my-pagination">
		<ul class="my-pagination-ul">
			<li> 用户注册</li>
		</ul>
	</div> -->
	<div style="height: 40px; width: 100%; background-color: #fff; ">
		<button class="swiper-btn" id="userButton" onclick="swipUser()">普通用户</button>
		<button class="swiper-btn" id="docButton" style="color: black" onclick="swipDoctor()"> 医生注册</button>
	</div>
		<div class="swiper-line" id="userLine" ></div>
		<div class="swiper-line" id="docLine" style="background: #fff" ></div>

	<div class="swiper-wrapper" >
		<!-- 普通用户的注册 -->
			<!-- <p> help</p> -->
	    	<div class="swiper-slide" id="userSwip" style="height: 500px;"  >
	        	<div class="user_zc_body">   
	        	 	<h3 class="margin-bottom-15" style="text-align: center; margin-top: 30px;">用户注册</h3>
					<div class="col-md-12" >			
						<div class="form-horizontal templatemo-create-account templatemo-container">
							<div class="form-inner">

								<div class="form-group">
						          <div class="col-md-12" style="text-align: center;">		          	
						            <label class="label-style label-size"> 手机号</label>
						            <input type="text" class="form-control text-width" id="userTel" placeholder="请输入手机号">
						          </div>             
						        </div>

						        <div class="form-group">
						          <div class="col-md-12" style="text-align: center;">		          	
						             <label class="label-style label-size"> 验证码</label>
						             <input type="text" class="form-control text-code" id="userVerycode" placeholder="请输入验证码"> 
						          	 <input type="button" class="label-code" style="border:0"  value="获取验证码" id="btn" onclick="userGetcode(this)">
						          </div>              
						        </div>

						         <div class="form-group">
						          <div class="col-md-12" style="text-align: center;">		          	
						             <label class="label-style label-size "> 昵称:</label>
						            <input type="text"  class="form-control text-width" id="userNickname" placeholder="请输入昵称">     
						          </div>              
						        </div>

						        <div class="form-group">
						          <div class="col-md-12">		          	
						              <label class="label-style label-size"> 密码</label>
						              <input type="password" class="form-control text-width" id="userPassword" placeholder="请输入密码">	 
						          </div>           
						        </div>

						        <div class="form-group">
						          <div class="col-md-12">		          	
						              <label class="label-style label-size"> 确认密码</label>
						              <input type="password" class="form-control text-width" id="uconfPassword" placeholder="再次输入密码">
						          </div>           
						        </div>

							</div>	
							  	<div class="user_zc_btn"><p class="p_btn"><button  class="reg-button" style="margin-left: 30%; border:0" onclick="userReg();" >立即注册</button></p></div>
							   <div style="height: 100px;"></div>		    	
					    </div>		      
					</div>
		        </div>
			</div>
	<!-- 医生注册 -->

		<div class="swiper-slide" id="docSwip" style="display: none;">
			<div class="user_zc_body">
				 <h3 class="margin-bottom-15" style="text-align: center; margin-top: 30px;">医生注册</h3>
				<div class="col-md-12">			
					<div class="form-horizontal templatemo-create-account templatemo-container" >
						<div class="form-inner">
							<div class="form-group">
					          <div class="col-md-12" style="text-align: center;">
					            <label class="label-style label-size"> 手机号</label>
					            <input type="text" class="form-control text-width" id="docTel" onchange="regPhone();" placeholder="请输入手机号">  
					          </div>             
					        </div>

					        <div class="form-group">
					          <div class="col-md-12" style="text-align: center;">		          	
					             <label class="label-style label-size"> 验证码</label>
					            <input type="text" class="form-control text-code" id="docVerycode" placeholder="请输入验证码">			            <input type="button" class="label-code" style="border:0" value="获取验证码" id="btn" onclick="docGetcode(this)">
					          </div>              
					        </div>	

					        <div class="form-group">
					          <div class="col-md-12">		          	
					              <label class="label-style label-size"> 密码</label>
					              <input type="password" class="form-control text-width" id="docPassword" placeholder="请输入密码">       
					          </div>           
					        </div>

					        <div class="form-group">
					          <div class="col-md-12">		          	
					              <label class="label-style label-size"> 确认密码</label>
					              <input type="password" class="form-control text-width" id="confPassword" placeholder="再次输入密码">	   
					          </div>           
					        </div>

					         <div class="form-group">
					          <div class="col-md-12">		          	
					              <label class="label-style label-size"> 姓名</label>
					              <input  class="form-control text-width" id="docName" placeholder="请输入真实姓名(必填)">	
					          </div>           
					        </div>

					        <div class="form-group">
					          <div class="col-md-12">		          	
					              <label class="label-style label-size"> 微信号</label>
					              <input class="form-control text-width" id="docWeixin" placeholder="请输入微信号(必填)">	 
					          </div>           
					        </div>

					        <div class="form-group">
					          <div class="col-md-12">		          	
					              <label class="label-style label-size">电话/视频咨询价格</label>
					              <input class="form-control text-width" id="onPrice" placeholder="电话/视频咨询价格">	
					              <label style="margin-top: 5px; width: 40px; font-size:12px;font-weight: 500;color: red" >&nbsp;&nbsp;/小时</label>
					          </div>           
					        </div>

					        <div class="form-group">
					          <div class="col-md-12">		          	
					              <label class="label-style label-size"> 面对面咨询价格</label>
					              <input type="text" class="form-control text-width" id="offPrice" placeholder="面对面咨询价格">	
					              <label style="margin-top: 5px; width: 40px; font-size:12px;font-weight: 500;color: red">&nbsp;&nbsp;/小时</label>
					          </div>           
					        </div>

					        <!-- 职业背景描述 -->
					         <div class="form-group">         	
					          <div class="col-md-12">		          	
					              <label class="label-style label-size" style="width: 200px; text-align: left;" > 职业背景描述（将对外显示）</label>
					              <textarea style="width: 100%;float: left; height: 160px;" class="form-control" id="docDesp" placeholder="职业背景描述(至少20个字)"></textarea>           		           
					          </div>           
					        </div>
					       

					        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

					        	<!-- pic 1 -->
							     <div class="form-group field-uploadform-imagefiles-0">
								     <label class="control-label" style="margin-left: 20%; margin-top: 30px; font-size: 16px;" for="uploadform-imagefiles-0">上传头像照片</label>
								     <input type="hidden"  value="" name="UploadForm[imageFiles][0]">
								     <input id="uploadform-imagefiles-0"  style="margin-left: 20% !important; " type="file" name="UploadForm[imageFiles][0]" onchange="javascript:headImagePreview();">
								     <div class="help-block"></div>
							    </div>
							    <img id="previewHead" width="180" height="180" style="display: block; width: 200px; background-color: #69c; height: 200px; margin-left: 20%;">
							    <div style="height: 30px; width: 100%"></div>
							    
							    <!-- pic-2 -->
							    <div class="form-group field-uploadform-imagefiles-1">
								     <label class="control-label"  style="margin-left: 20%; font-size: 16px;" for="uploadform-imagefiles-1">请上传医生执业证书照片</label>
								     <input type="hidden" value="" name="UploadForm[imageFiles][1]">
								     <input id="uploadform-imagefiles-1" style="margin-left: 20% !important;" type="file" name="UploadForm[imageFiles][1]" onchange="javascript:busImagePreview();">
								     <div class="help-block"></div>
							    </div>
							     <img id="previewBus" width="180" height="180" style="display: block;  background-color: #69c;  width: 200px; height: 200px; margin-left: 20%;">

							     <!-- pic 3 -->
							      <div style="height: 30px; width: 100%"></div>
							      <div class="form-group field-uploadform-imagefiles-3">
								     <label class="control-label"  style="margin-left: 20%; font-size: 16px;" for="uploadform-imagefiles-3">请上传身份证照片</label>
								     <input type="hidden" value="" name="UploadForm[imageFiles][3]">
								     <input id="uploadform-imagefiles-3" style="margin-left: 20% !important;" type="file" name="UploadForm[imageFiles][3]" onchange="javascript:idImagePreview();">
								     <div class="help-block"></div>
							    </div>
							     <img id="previewID" width="180" height="180" style="display: block;  background-color: #69c;  width: 200px; height: 200px; margin-left: 20%;">

							    <button style="display: none;" id="target">Submit</button>
							    <!-- <button id="target">Submit</button> -->
							    <!-- <div style="height: 100px;width: 100%;"></div> -->
							<?php ActiveForm::end() ?>	 

						</div>	
							<div style="height: 30px; width: 100%;"></div>
							<div class="user_zc_btn"><p class="p_btn"><button  class="reg-button" style="margin-left: 25%;border:0" onclick="doctorReg();" >立即注册</button></p></div>
							<div style="height: 100px;"></div>	   
				    </div>	      
				</div>  
			</div>
		</div>
	</div>
</div>

<!--  用户和医生显示的切换 -->
<script type="text/javascript">
	function swipUser()
	{
		//设置样式显示隐藏
		var userBtn = document.getElementById("userButton");
		var docBtn = document.getElementById("docButton");
		var userLine = document.getElementById("userLine");
		var docLine = document.getElementById("docLine");
		userBtn.style.color="#21a4f4";
		docBtn.style.color="#000";
		userLine.style.background="#21a4f4";
		docLine.style.background="#fff";
		//设置显示
		var userSwip = document.getElementById("userSwip");
		var docSwip = document.getElementById("docSwip");
		userSwip.style.height="500px";
		userSwip.style.display="";
		docSwip.style.display="none";
		// $('#userSwip').show();
		// $('#docSwip').hide();

	}
	function swipDoctor()
	{
		var userBtn = document.getElementById("userButton");
		var docBtn = document.getElementById("docButton");
		var userLine = document.getElementById("userLine");
		var docLine = document.getElementById("docLine");
		userBtn.style.color="#000";
		docBtn.style.color="#21a4f4";
		userLine.style.background="#fff";
		docLine.style.background="#21a4f4";
	
		//设置显示
		var userSwip = document.getElementById("userSwip");
		var docSwip = document.getElementById("docSwip");
		userSwip.style.display="none";
		docSwip.style.display="";
		// userSwip.style.height="500px";
		// $('#userSwip').hide();
		// $('#docSwip').show();
		// docSwip.show();
	}

</script>


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


	// var mySwiper = new Swiper('.swiper-container',{
	// pagination: '.my-pagination-ul',
	// paginationClickable: true,
	// paginationBulletRender: function (index, className) {
	// 	// alert("help");
	// switch (index) {
	//   case 0: name='普通用户';break;
	//   case 1: name='医生注册';break;
	  
	//   default: name='';
	// }
	//       return '<li id="switch" value="'+index+'"'+' class="' + className + '">' + name + '</li>';
	//   }
	// })
</script>


<div style="margin-bottom: 100px;">	</div>
























