<?php
use yii\helpers\Html;
use  yii\helpers\Url;
use yii\widgets\ActiveForm;
$session = Yii::$app->session;
$user_name = $session->get('username');
$user_id =   $session->get('userId');
// $this->title = 'article list';
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<?php ActiveForm::end() ?>

<link href="css/comment.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<div class="questions show questions_show chrome modern mac webkit desktop ask_detail_seo experts_seo">
    <div id="content_wrapper">
            <div class="container">
                <div class="col_main">
                   
                    <!-- 文章信息 -->
                   <div class="box article">
                      <article>
                           <div class="content">
                               <h1><b style="font-size: 18px;"><?php echo $data['artinfo']['title'];?></b></h1>
                               <div class="info">
                                   <div class="tags">
                                   </div>
                                   <font class="fs-16"><?php echo $data['artinfo']['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;</font>
                                   <time class="ask_right" style="font-size: 14px;"><?php echo $data['artinfo']['time'];?></time>
                               </div>
                               <?php echo $data['artinfo']['content']; ?>
                               
                               <!--  <pre style="white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word;"><?php// echo $data['artinfo']['content']; ?></pre> -->
                                <!-- <p style="font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php //echo $data['artinfo']['content'];?></p> -->
                             <!--   <p>
                                 我跟老公现在算是在备孕期间，孕前检查结果我很正常，他的结果不太好，精子质量不好，我就让他吃点对精子好一点的，牛奶 坚果什么的。让他少抽点烟，少喝点酒。因为老家有事需要我回去一趟，然后我就回去了，走的时候我想他应该会自觉的，也就随便交代了一下，办完事我就回来了。我是晚上12点的火车票，早上7点半可以到，我5点钟因为火车上很吵睡不着，我就给他发微信，没回我，我想他肯定在睡觉，结果我下火车快到家了，他还是没有回我微信，我想 今天他休息肯定还在睡觉，然后我到家了一看他居然没在家，然后我就给他打电话，问他人去哪了，他说他在吃早餐，等下要去公司开会，我说你没看到我给你发微信吗，也不回下，然后他就撒谎说 昨天晚上打游戏的太晚了，我立马把游戏打开看，从我回老家后他本来就没有玩那个游戏因为没有对战记录，下午他回来，我发现他嘴里有酒味，我就说你昨天晚上是去喝酒了吧，后来他才承认说他趁我不在，就去喝酒了，我说你不知道我几点到吗，也不发微信关心下我，我发了你还不回，以为你在睡觉呢，结果回来你出门了……我心好累 明明宝宝是两个人的事，为什么就我一个在做准备，每天牛奶给他冲好，要看着他不能抽烟，他跟同事吃饭，我要交代不要喝酒，结果我才走了两天，他就迫不及待的去喝酒了，哎
                               </p> -->
                           </div>
                           <div class="info">
                              <!--  <time class="ask_right">&nbsp;&nbsp;被浏览32次</time> -->
                               <a class="askReplyPc">回复</a>
                           </div>
                      </article>
                   </div>

                   <div class="title_lines">
                       <div class="title answer-count">
                           <font><?php echo $data['artinfo']['answer'];?></font>个回答
                       </div>
                   </div>

                   <!--commments-->
                   <div class="box comments" style="font-size: 16px;">
                    <?php if($data['artinfo']['answer']>0):?>
                        <?php for ($i=0; $i<$data['artinfo']['answer']; $i++) { ?>
                            <div class="comment answer_list_item">
                                <img src="images/header.jpg">
                                <div class="text first-lever">
                                  <strong class="name" style="color: #0093E7"><?php echo $data['tipinfo'][$i]['nickname'];?></strong>
                                  <span>
                                      <?php if($data['tipinfo'][$i]['user_type']==1){echo "心理咨询师";}else{echo "普通游客";} ?>
                                  </span>
                                  <time><?php echo $data['tipinfo'][$i]['time'];?></time>
                                  <p class="content"><?php echo $data['tipinfo'][$i]['content'];?></p>
                                  <div class="info">
                                      <div class="feedback_aciton"></div>
                                  </div>
                               </div>
                            </div>   
                    <?php }else:?>

                    <?php endif;?> 

<!-- 
                      <div class="comment answer_list_item">
                          <img src="images/header.jpg">
                          <div class="text first-lever">
                              <strong class="name" style="color: #0093E7">牛志超</strong>
                              <span>心理咨询师</span>
                              <time>今天 23:26</time>
                              <p class="content">已经收到的伤害是无法忘记的，需要做的是从受到的伤害中寻找经验，避免下次在收到同样的伤害</p>
                              <div class="info">
                                  <div class="feedback_aciton"></div>
                              </div>
                          </div>
                      </div>

                     <div class="comment answer_list_item">
                        <a href="http://www.yidianling.com/experts/4784"><img src="./怎么能忘记一个男人呢？婚姻-壹点灵心理咨询_files/zqz4fe20tqr73rdt.jpg!s120x120"></a>                                  
                        <div class="text first-lever">
                          <strong class="name"><a href="http://www.yidianling.com/experts/4784">杜智盈</a></strong>
                          <span>心理咨询师</span>
                          <time>今天 23:27 </time>
                          <p class="content"> 你的中文很棒。你觉得自己离不开他是因为什么呢？习惯性暴力真的是很难纠正，你老公需要治疗</p>
                          <div class="info">
                              <div class="feedback_aciton">
                              </div>    
                          </div>
                        </div>
                    </div>

                </div> -->
                <div class="title fs-12 clear">我的回答</div>
                  <textarea rows="7" required=""  id="comment" placeholder="请输入你的回答(最少6个字)" class="my-content"></textarea>
                    <style type="text/css">
                       .disabled-button {
                           background: #ddd;
                       }
                       .disabled-button:hover {
                           background: #ddd;
                           cursor: default;
                       }
                   </style>
                   <button id="my-commit" class="tmp_button" onclick="tipSubmit();">提交</button>
            </div>
    </div>
</div>
    <script type="text/javascript">
        //回复跳转
        $('.askReplyPc').click(function (e) {
            e.preventDefault();
            var $dis = $('.my-content').offset().top;
            $('html,body').animate({scrollTop: $dis - 150}, 600, function () {
                $('.my-content').focus();
            })
        });

        //回答的内容提交
        function tipSubmit()
        {
            var comment = document.getElementById("comment").value;
            if(comment.length<6){
                alert('至少6个字符');
                return;
            }
            <?php if(!empty($user_id)):?>

                var content = comment;
                var articleId = <?php echo $data['artinfo']['id'];?>;
                var data ={
                    content: content,
                    articleId: articleId,
                };
                $.ajax({
                    url: '<?php echo Url::to(['site/comment']); ?>',
                    type: 'post',
                    data: data,
                    success: function (data) {
                      document.location = '<?php Url::to(['site/detarticle','article_id'=>$data['artinfo']['id'] ]); ?>';
                    },
                    error: function(data) {
                        alert("Sorry error");
                    }
                });
            <?php else:?>
                alert('请先登录')
                return;
                // document.location = '<?php// echo Url::to(['site/login']); ?>';
            <?php endif;?>
    }

    </script>

















