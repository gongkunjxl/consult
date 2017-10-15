<?php
use yii\helpers\Html;
use  yii\helpers\Url;
$this->title = '专家列表页面';
$length=0;
$base = Url::to(['site/searchexp']);
$base = "'".$base."'";
?>

<!-- <?php// var_dump($data);?> -->

<link rel="stylesheet" type="text/css" href="css/expert.css">

<div class="container">
    <div style="width: 100%;height: 80px;">
        <span> 专家搜索:</span> 
        <input type="text" name="expertName" id="expertName" style="width: 200px;height: 30px;"  placeholder="请输入专家姓名">
        <button  onclick="getExpert();" style="width: 100px;background-color: #CAE1FF;border-radius: 6px;border: 1px solid #CAE1FF; font-weight: 500px; color: #FF7F24">搜 索</button>
    </div>
    <div class="expert-main" >
    <?php if($data['status']==200):?>
        <?php $length=count($data['getinfo']); if($length>0):?>
            <?php for ($i=0; $i <$length ; $i++) { ?>
                <div class="expert">
                <!--  需要去读取照片的后缀 -->
                 <?php 
                    $path = "testupload/".$data['getinfo'][$i]['username']."/";
                    $current_dir = opendir($path);    //opendir()返回一个目录句柄,失败返回false
                    while(($file = readdir($current_dir)) !== false) { ?> 
                       <?php
                            if($file == '.' || $file == '..') {
                                 continue;
                        }else{ 
                                $arraylist = explode(".",$file); //这是头像
                                if($arraylist[0]=="0000"){ 
                                    $path = $path.$file;
                                }?> 
                    <?php } ?>
                        
                  <?php  }?>
                    <img src="<?php echo $path ?>">
                    <div class="name"><?php echo $data['getinfo'][$i]['nickname']; ?> &nbsp;&nbsp;<span style="color: #888; font-size: 14px;">心理咨询师</span></div>
                    <div class="text">
                        <p><?php echo $data['getinfo'][$i]['desp']; ?></p>
                    </div>
                    <div class="score">
                        <span>评分:&nbsp;&nbsp;<?php echo $data['getinfo'][$i]['score']; ?>分&nbsp;&nbsp;</span>
                    </div>
                    <input class="btn" type="button" onClick="consultToggle()" name="" value="立即预约">
                    <div class="price">
                         <span>&nbsp;&nbsp;线上预约价格:&nbsp;&nbsp;<?php echo $data['getinfo'][$i]['onPrice']; ?>/小时</span>
                    </div>
                    <div class="price">
                         <span>&nbsp;&nbsp;线下预约价格:&nbsp;&nbsp;<?php echo $data['getinfo'][$i]['offPrice']; ?>/小时</span>
                    </div>
                </div>
        <?php }else:?>
            <p style="font-size: 30px; text-align: center;color: red">没有更多专家了！</p>
        <?php endif;?>
    <?php else: ?>
        <p style="font-size: 30px; text-align: center;color: red">没有找到该专家！</p>
    <?php endif; ?>

            <div style="margin-top: 20px;">
                <div style="float: left;  width: 80%;">
                    <?php if(intval($data['page'])>1):?>
                     
                    <div style="width: 120px; text-align: center; border-radius: 5px; padding-top: 5px; font-weight: 500;font-size: 16px; float:left;margin-left: 20%;height: 40px;background-color: #F0F8FF;">
                        <a href="<?php $page=$data['page']-1; echo Url::to(['site/expert','page' => $page]); ?>"> 上一页</a>
                    </div>
                <?php endif;?>
                <?php if($length==10):?>
                    <div style="width: 120px; text-align: center; border-radius: 5px; padding-top: 5px; font-weight: 500;font-size: 16px; float:left; margin-left: 120px;height: 40px;background-color: #F0F8FF;">
                         <a href="<?php $page=$data['page']+1; echo Url::to(['site/expert','page' => $page]); ?>"> 下一页</a>
                    </div>

                <?php endif;?>
                 
                </div>
               
            </div>

      </div>
<!-- 

        <div class="expert" style="margin-left: 0;">
            <img src="images/experts/1.jpg">
            <div class="name">朱晓燕 &nbsp;&nbsp;<span style="color: #888; font-size: 14px;">心理咨询师</span></div>
            <div class="text">
                <p>华中师范大学心理学院教育心理学硕士；国家二级心理咨询师。曾在金色摇篮潜能教育集团负责教师培训，担任金色摇篮东区国际园的园长。现任摇篮思慧特幼儿园园长。</p>
            </div>
            <div class="score">
                <span>评分:&nbsp;&nbsp;4.5分&nbsp;&nbsp;</span>
                <span>&nbsp;&nbsp;预约价格:&nbsp;&nbsp;100元/小时</span>
            </div>
          
            <input class="btn" type="button" name="" value="立即预约">
            
        </div> -->
    </div>
    
</div>
<!-- 弹出的二维码客服 -->
<div class="content">
    <div class="hide_box"></div>
        <div class="shang_box">
            <a class="shang_close" href="javascript:void(0)" onClick="consultToggle()" title="关闭"><img src="images/close.jpg" alt="取消" /></a>
            <div class="shang_tit">
                <p>客服微信号:197238405</p>
            </div>
            <div class="shang_payimg" style="padding: 0;">
                <img src="images/kefu.png" alt="扫码支持" title="扫一扫" />
            </div>
                <div class="pay_explain">扫码关注 预约咨询</div>
        </div>
    </div>
</div>
 <script type="text/javascript">
    function consultToggle(){
        $(".hide_box").fadeToggle();
        $(".shang_box").fadeToggle();
    }

    // 获取专家
    function getExpert()
    {
        var name= document.getElementById("expertName").value;
        if(name == "" || name == null){
            alert('请输入专家姓名');
            return;
        }
        var base_path = <?php echo $base; ?>;
        base_path = base_path+"&expert="+name;
        document.location = base_path;       
         // alert(base_path);
    }

</script>
<!-- <div style="width: 100%;height: 200px;"></div> -->




















