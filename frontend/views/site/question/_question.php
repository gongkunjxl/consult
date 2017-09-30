<?php
use yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
$session = Yii::$app->session;
$user_name = $session->get('username');
$user_id = $session->get('userId');
$this->title = '发布话题';
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?php ActiveForm::end() ?>
<link rel="stylesheet" type="text/css" href="css/post.css">

    <div class="basic-grey">
        <h1>情感问答话题发布</h1>
        <label>
            <span>标题:</span>
            <input class="title" id="art_title" type="text" placeholder="请输入提问标题" />
        </label>

        <div style="height: 10px;width: 100%;"></div>
        <!-- 主题选择 -->
         <label>
            <span>情感主题</span>
            <select name="selection" id="art_theme">
                <option value="1" selected = "selected">情感婚姻</option>
                <option value="2">情绪压力</option>
                <option value="3">人际关系</option>
                <option value="4">家庭关系</option>
                <option value="5">孩子教育</option>
                <option value="6">职业发展</option>
                <option value="7">个人发展</option>
                <option value="8">性心理</option>
            </select>
        </label>
        <div style="height: 20px;width: 100%"></div>

        <label>
        <span>帖子内容:</span>
        <textarea id="art_content"  placeholder="提问内容(至少6个字符)"></textarea>
        </label>
       
        <div style="height: 20px;width: 100%"></div>
        <label>
        <span>&nbsp;</span>
        <input type="button" class="button" onclick="tipQuestion();" value="发布帖子" />
        </label>
    </div>
    <div style="height: 100px;width: 100%"></div>
    <!-- <div> <a href="/testadmin/advanced/frontend/web/index.php?r=site%2Ftheme&type=4"> askdjsad</a></div> -->
<script type="text/javascript">
    function tipQuestion()
    {
         <?php if(!empty($user_id)):?>
            var art_title = document.getElementById("art_title").value;
            if(art_title == "" || art_title==null){
                alert('请输入问题标题');
                return;
            }
            var art_theme = document.getElementById("art_theme").value;

            var art_content = document.getElementById("art_content").value;
            if(art_content == "" || art_content==null || art_content.length<6){
                alert('请输入发布内容 至少6个字符');
                return;
            }

            var data ={
                title: art_title,
                content: art_content,
                themeId: art_theme,
            };
            $.ajax({
                url: '<?php echo Url::to(['site/articletip']); ?>',
                type: 'post',
                data: data,
                success: function (data) {
                    //实现自动跳转
                    // alert(data.status);
                    if(data.status == 200){
                        document.location = '<?php echo Url::to(['site/index']); ?>';
                    }else{title
                        alert('发布失败');
                    }
                 
                },
                error: function(data) {
                    alert("Sorry error");
                }
            });
        <?php else:?>
            alert('请先登录');
        <?php endif;?>

        // alert(art_theme);
    }

</script>











