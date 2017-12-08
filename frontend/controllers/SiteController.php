<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\levelSort;
use app\models\SmsDemo;
date_default_timezone_set("Asia/Shanghai");
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**p
     * @inheritdoc
     */

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return  index page
     */
    public function actionIndex()
    {
        // $session = Yii::$app->session;
        // $name_user = "18916294855";
        // $name_nick = "doc_8872";
        // $session->set('username',$name_user);
        // $session->set('nickname',$name_nick);
        // $username = $session->get('username');
        // $nickname = $session->get('nickname');
        // if(!empty($username)){
        //     $this->nickname = $nickname;
        //     $this->regLogin = "退出";
        // }else{
        //     $this->regLogin = "登录/注册";
        // }
        return $this->render('index/main');
    }

    /**
     * @return login page
     */
    public function actionLogin()
    {
        $model = new UploadForm();
        if(Yii::$app->request->isAjax)
        {
            $data = Yii::$app->request->post();
            $username= explode(":", $data['username']);
            $password= explode(":", $data['password']);
            $username = $username[0];
            $password= $password[0];
            
            //验证用户的密码
            $db = Yii::$app->db;
            $sel_sql = "SELECT * FROM con_user where username=$username";
            $getinfo =  $db->createCommand($sel_sql)->queryOne();
            $re_data=[
                'status' => '100',
            ];
            if($getinfo['password'] == $password)
            {
                $re_data['status'] = '200';
                $re_data['nickname'] = $getinfo['nickname'];
                $re_data['userId'] = $getinfo['id'];
                $re_data['user_type'] =$getinfo['user_type'];

                // session设置
                $session = Yii::$app->session;
                $session->set('username' , $username);
                $session->set('nickname',$re_data['nickname']);
                $session->set('userId',$getinfo['id']);
                // $session
            }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
         }
        return $this->render('login/main', ['model' => $model]);
    }

    /*  退出登录状态 */
    public function actionLogout()
    {
        $session = Yii::$app->session;
        $session->set('username','');
        $session->set('nickname','');
        $session->set('userId','');
        return $this->render('index/main');
    }

    /**
     * @return register page
     */
    public function actionRegister()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            // $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // 文件上传成功
                 // $this->render('index/main', ['model' => $model]);
                return $this->render('index/main');
                // return;
            }
        }
        return $this->render('register/main', ['model' => $model]);

        // return $this->render('register/main');
    }

    /*
    * uType 1表示医生 2表示普通用户
    */
    public function actionReginfo()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $uType= explode(":", $data['uType']);
            $uTel= explode(":", $data['uTel']);
            $uVerycode= explode(":", $data['uVerycode']);
            $uPassword = explode(":", $data['uPassword']);
            $uType = $uType[0];
            $uTel = $uTel[0];
            $uVerycode= $uVerycode[0];
            $uPassword = $uPassword[0];

            $re_data=[
                'status' => '100',
            ];
            //普通用户
            if($uType==2){
                $uNickname = explode(":", $data['uNickname']);
                $uNickname = $uNickname[0];

                $db = Yii::$app->db;   
                // $time = strtotime(date('Y-m-d',time()).' 00:00:00');
                $time = time();
                if(empty($uNickname)){
                     $nickname = "user_".$uVerycode;
                 }else{
                    $nickname=$uNickname;
                 }
                $insert_data = [
                    'username' => $uTel,
                    'password' => $uPassword,
                    'user_type' => $uType,
                    'nickname' => $nickname,
                    'ctime' => $time
                ];

                $rep = $db->createCommand()->insert('con_user',$insert_data)->execute();
                if($rep){
                    $re_data['status'] = '200';
                    
                    // 设置session 
                    $sel_sql = "SELECT id FROM con_user where username=$uTel";
                    $idinfo = $db->createCommand($sel_sql)->queryOne();
                     
                    $session = Yii::$app->session;
                    $session->set('username' , $uTel);
                    $session->set('nickname',$nickname);
                    $session->set('userId',$idinfo['id']);
                }
            }else{  //医生注册
                 
                $nickname= explode(":", $data['nickname']);
                $weixin= explode(":", $data['weixin']);
                $onPrice= explode(":", $data['onPrice']);
                $offPrice = explode(":", $data['offPrice']);
                $desp = explode(":", $data['desp']);
                
                $nickname = $nickname[0];
                $weixin = $weixin[0];
                $onPrice= $onPrice[0];
                $offPrice = $offPrice[0];
                $desp = $desp[0];

                //其他字段
                $score=4.5;

                $db = Yii::$app->db;   
                // $time = strtotime(date('Y-m-d',time()).' 00:00:00');
                $time = time();
                // $nickname = "user_".$uVerycode;
                $insert_data = [
                    'username' => $uTel,
                    'password' => $uPassword,
                    'user_type' => $uType,
                    'nickname' => $nickname,
                    'weixin' => $weixin,
                    'onPrice' => $onPrice,
                    'offPrice' => $offPrice,
                    'score' => $score,
                    'desp' => $desp,
                    'ctime' => $time
                ];

                $rep = $db->createCommand()->insert('con_user',$insert_data)->execute();
                if($rep){
                    $re_data['status'] = '200';
                    
                    //创建图片文件夹
                    $path = "testupload/";
                    $path=$path.$uTel;
                    mkdir($path,0777);
                    chmod($path,0777);

                    // // 设置session 
                    $sel_sql = "SELECT id FROM con_user where username=$uTel";
                    $idinfo = $db->createCommand($sel_sql)->queryOne();
                     
                    $session = Yii::$app->session;
                    $session->set('username' , $uTel);
                    $session->set('nickname',$nickname);
                    $session->set('userId',$idinfo['id']);
                 }
             }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
         }
    }
    /*
     * 忘记密码响应
    */
    public function actionForget()
    {
        $model = new UploadForm();
        if(Yii::$app->request->isAjax)
        {
            $data = Yii::$app->request->post();
            $username= explode(":", $data['username']);
            $password= explode(":", $data['password']);
            $username = $username[0];
            $password= $password[0];
            
            //验证用户的密码
            $db = Yii::$app->db;
            $sel_sql = "UPDATE con_user SET password='$password' WHERE username=$username";
            $rep =  $db->createCommand($sel_sql)->execute();
            $re_data=[
                'status' => '100',
            ];
            if($rep){
               $re_data['status'] = '200';
            }

            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
         }
        return $this->render('forget/main', ['model' => $model]);
    }



    /*
        * 手机号码注册验证 
    */
    public function actionRegphone()
    {
        if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $db = Yii::$app->db;

            $username= explode(":", $data['username']);
            $username= $username[0];
            
            $re_data=[
                'status' => '100',
            ];
            $sql = "SELECT * FROM con_user where username=$username";
            $getinfo =  $db->createCommand($sql)->queryOne();
            if(!empty($getinfo)){
                $re_data['status'] = '100';
            }else{
                $re_data['status'] = '200';
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
         }

    }
    /*
      * 获取手机的验证码
    */
    public function actionGetcode()
    {
    	if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $db = Yii::$app->db;

            $username= explode(":", $data['username']);
            $phoneNum= $username[0];
            
            $re_data=[
                'status' => '100',
            ];
            //初始化发送
            $key_id = "LTAI9M8T8TBHLxH4";
            $key_secret =  "50Gk84Q42Pr6AcBmeG7D13faZMWXuv";
            $signname = "心事网";
            $sms_tmp = "SMS_102295009";
            $demo = new SmsDemo($key_id,$key_secret);
            //验证码生成
            $authnum='';
            $ychar = "0,1,2,3,4,6,7,8,9";  
			$list = explode(",",$ychar);  
			for($i=0; $i<4; $i++)
			{  
				$randnum = mt_rand( 0,8 );							  
				$authnum .= $list[$randnum];  
			}
			//调用发送函数
			$response = $demo->sendSms(
			    $signname,   // 短信签名
			    $sms_tmp,   // 短信模板编号
			    $phoneNum,   // 短信接收者
			    Array(     // 短信模板中字段的值
			        "code"=> $authnum,
			        "product"=>"xinshiwang"
			    ),
			    "123"
			);

			//发送成功存入数据库
			if($response->Code == "OK"){
				//存入数据库
				$db = Yii::$app->db;   
                // $time = strtotime(date('Y-m-d',time()).' 00:00:00');
                $time = time();
                $insert_data = [
                    'phone' => $phoneNum,
                    'code' => $authnum,
                    'ctime' => $time
                ];

                $rep = $db->createCommand()->insert('con_code',$insert_data)->execute();
                if($rep){
                	$re_data['status'] = '200';
                }
			}
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
         }
    }

    /*
     * 实现验证码的验证
    */
    public function actionVercode()
    {
    	if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $db = Yii::$app->db;

            $phoneNum= explode(":", $data['phoneNum']);
            $verCode= explode(":", $data['verCode']);
            $phoneNum= $phoneNum[0];
            $verCode= $verCode[0];

            $re_data=[
                'status' => '100',
            ];
			//验证有效性
			$db = Yii::$app->db;   
            $sel_sql = "SELECT * FROM con_code WHERE phone='$phoneNum' AND code='$verCode' ";
            $getinfo =  $db->createCommand($sel_sql)->queryOne();
            if(!empty($getinfo)){
            	$time = $getinfo['ctime'];
               	$now=strtotime('-15 minute');
               	if($time > $now){
               		$re_data['status'] = '200';
              	}
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
        }
    }


    /*
        *对主题进行请求 弹出主题列表页面
    */
    public function actionTheme()
    {
        $tmp = Yii::$app->request->queryString;
        // $type = substr($tmp,-1);
        $hello = explode('&',$tmp);
        $page = explode("=", $hello[count($hello)-1]);
        $type = explode("=", $hello[count($hello)-2]);    
        $data = [
            'status' => 100,
        ];
        $data['page'] = $page[1];
        $data['type'] = $type[1];
        if(!empty($type))
        {
            //数据库查询
            $db = Yii::$app->db;
            $start = (intval($page[1])-1)*10;
            if($start<0){
                $start=0;
            }
            $sel_sql = "SELECT * FROM con_article where themeId=$type[1]  ORDER BY ctime desc LIMIT $start,10";
            $getinfo =  $db->createCommand($sel_sql)->queryAll();  


            //获取评论数据
            if(!empty($getinfo))
            {
                $data['status'] = 200;
                $length = count($getinfo);
                for ($i=0; $i <$length ; $i++) {             
                    $article_id = $getinfo[$i]['id'];
                    $sel_sql = "SELECT count(*) FROM con_tips where articleId=$article_id";
                    $count = Yii::$app->db->createCommand($sel_sql)->queryScalar();
                    if($count){
                        $getinfo[$i]['answer'] = $count;
                    }else{
                        $getinfo[$i]['answer'] = 0;
                    }
                    //时间 作者
                    $tm=date("Y-m-d H:i:s",$getinfo[$i]['ctime']);
                    $getinfo[$i]['time'] = $tm;
                    $getinfo[$i]['content']=str_replace("\\n","<br>",$getinfo[$i]['content']);
                    $getinfo[$i]['content']=str_replace("\n","<br>",$getinfo[$i]['content']);
                    $getinfo[$i]['content']=str_replace("\r\n","<br>",$getinfo[$i]['content']);

                    //作者
                    $user_id = $getinfo[$i]['userId'];
                    $sel_sql = "SELECT nickname FROM con_user where id=$user_id";
                    $userinfo = $db->createCommand($sel_sql)->queryOne();
                    $getinfo[$i]['author'] = $userinfo['nickname'];
                }
                $data['article'] = $getinfo;
            }
        }    
        return $this->render('theme/main',['data' => $data]);
    }


    /*
      * article 获取文章的回复列表和具体信息
    */
    public function actionDetarticle()
    {
        $tmp = Yii::$app->request->queryString;
        $hello = explode('=',$tmp); 

        $article_id = $hello[count($hello)-1]; 
        $data = [
            'status' => 100,
        ];
      
        if(!empty($article_id))
        {
            //数据库查询
            $db = Yii::$app->db;
            //step1: 文章信息
            $sel_sql = "SELECT * FROM con_article where id=$article_id";
            $artinfo = $db->createCommand($sel_sql)->queryOne();

            //获取所有的评论信息
            if(!empty($artinfo))
            {
                 //时间 作者
                $data['status'] = 200;
                $tm=date("Y-m-d H:i:s",$artinfo['ctime']);
                $artinfo['time'] = $tm;
                $artinfo['content']=str_replace("\\n","<br>",$artinfo['content']);
                $artinfo['content']=str_replace("\n","<br>",$artinfo['content']);
                $artinfo['content']=str_replace("\r\n","<br>",$artinfo['content']);
                //作者
                $user_id = $artinfo['userId'];
                $sel_sql = "SELECT nickname FROM con_user where id=$user_id";
                $userinfo = $db->createCommand($sel_sql)->queryOne();
                $artinfo['author'] = $userinfo['nickname'];

                //获取所有的评论信息
                $sel_sql = "SELECT * FROM con_tips where articleId=$article_id order by ctime desc";
                $tipinfo = Yii::$app->db->createCommand($sel_sql)->queryAll();
                $length = count($tipinfo);
                $artinfo['answer'] = $length;  //回答数量
                $data['artinfo'] = $artinfo;

                for ($i=0; $i <$length ; $i++) {             
                    //作者
                    $user_id = $tipinfo[$i]['from_id'];
                    $sel_sql = "SELECT nickname,user_type FROM con_user where id=$user_id";
                    $userinfo = $db->createCommand($sel_sql)->queryOne();
                    $tipinfo[$i]['nickname'] = $userinfo['nickname'];
                    $tipinfo[$i]['user_type'] = $userinfo['user_type'];

                    $tm=date("Y-m-d H:i:s",$tipinfo[$i]['ctime']);
                    $tipinfo[$i]['time'] = $tm;
                }
                $data['tipinfo'] = $tipinfo;
            }
        }    
        return $this->render('detarticle/main',['data' => $data]);
    }

    /*
     *
    */
    public function actionRead()
    {
        $tmp = Yii::$app->request->queryString;
        $hello = explode('=',$tmp); 

        $article_id = $hello[count($hello)-1]; 
        $data = [
            'status' => 100,
        ];
      
        if(!empty($article_id))
        {
            //数据库查询
            $db = Yii::$app->db;
            //更新所有符合条件的tips if_read
            $up_sql = "UPDATE con_tips SET if_read=1 WHERE articleId=$article_id AND if_read =0";
            $db->createCommand($up_sql)->execute();

            //step1: 文章信息
            $sel_sql = "SELECT * FROM con_article where id=$article_id";
            $artinfo = $db->createCommand($sel_sql)->queryOne();

            //获取所有的评论信息
            if(!empty($artinfo))
            {
                 //时间 作者
                $data['status'] = 200;
                $tm=date("Y-m-d H:i:s",$artinfo['ctime']);
                $artinfo['time'] = $tm;
                //作者
                $user_id = $artinfo['userId'];
                $sel_sql = "SELECT nickname FROM con_user where id=$user_id";
                $userinfo = $db->createCommand($sel_sql)->queryOne();
                $artinfo['author'] = $userinfo['nickname'];

                //获取所有的评论信息
                $sel_sql = "SELECT * FROM con_tips where articleId=$article_id";
                $tipinfo = Yii::$app->db->createCommand($sel_sql)->queryAll();
                $length = count($tipinfo);
                $artinfo['answer'] = $length;  //回答数量
                $data['artinfo'] = $artinfo;

                for ($i=0; $i <$length ; $i++) {             
                    //作者
                    $user_id = $tipinfo[$i]['from_id'];
                    $sel_sql = "SELECT nickname,user_type FROM con_user where id=$user_id";
                    $userinfo = $db->createCommand($sel_sql)->queryOne();
                    $tipinfo[$i]['nickname'] = $userinfo['nickname'];
                    $tipinfo[$i]['user_type'] = $userinfo['user_type'];

                    $tm=date("Y-m-d H:i:s",$tipinfo[$i]['ctime']);
                    $tipinfo[$i]['time'] = $tm;
                }
                $data['tipinfo'] = $tipinfo;
            }
        }    
        return $this->render('detarticle/main',['data' => $data]);
    }


    /*
     *实现文章回复评论提交
    */
    public function actionComment()
    {
        if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $db = Yii::$app->db;
            $content= explode(":", $data['content']);
            $articleId = explode(":", $data['articleId']);
            $content= $content[0];
            $articleId= $articleId[0];
            
            $session = Yii::$app->session;
            $from_id = $session->get('userId');
            $to_id = '1';
            $tm = time();
            $insert_data=[
                'from_id' => $from_id,
                'to_id' => $to_id,
                'content' => $content,
                'ctime' => $tm,
                'articleId' => $articleId,
            ];

            $re_data=[
                'status' => '100',
            ];
            $rep = $db->createCommand()->insert('con_tips',$insert_data)->execute();
            if($rep){
                $re_data['status'] = '200';
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
         }
        // return $this->render('testdb/main',$data);
    }

    /*
        * 实现问题跳转
    */
    public function actionQuestion()
    {
        return $this->render('question/main');
    }
    /*
      * 实现发布问题功能 
    */
    public function actionArticletip()
    {
        if (Yii::$app->request->isAjax) 
        {
            $data = Yii::$app->request->post();
            $db = Yii::$app->db;
            $content= explode(":", $data['content']);
            $title = explode(":", $data['title']);
            $themeId = explode(":", $data['themeId']);
            $content= $content[0];
            $title= $title[0];
            $themeId= $themeId[0];
            
            $session = Yii::$app->session;
            $userId = $session->get('userId');
            $tm = time();
            $insert_data=[
                'userId' => $userId,
                'title' => $title,
                'content' => $content,
                'ctime' => $tm,
                'themeId' => $themeId,
            ];

            $re_data=[
                'status' => '100',
            ];
            $rep = $db->createCommand()->insert('con_article',$insert_data)->execute();
            if($rep){
                $re_data['status'] = '200';
            }
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $re_data;
         }
    }
    /*
      * 跳转到专家列表页面
    */
    public function actionExpert()
    {
        //获取专家列表 实现分页功能
        $tmp = Yii::$app->request->queryString;
        $hello = explode('&',$tmp);
        $page = explode("=", $hello[count($hello)-1]);  

        $re_data=[
            'status' => '100',
        ];
        $re_data['page'] = $page[1];

        $db= Yii::$app->db;
        $start = (intval($page[1])-1)*10;
        if($start<0) $start=0;
        $sel_sql = "SELECT * FROM con_user where user_type=1 order by prt desc LIMIT $start,10 ";
        $getinfo = Yii::$app->db->createCommand($sel_sql)->queryAll();
        if(!empty($getinfo)){
            $re_data['status'] = '200';
            $re_data['getinfo'] = $getinfo;
        }
        return $this->render('expert/main',['data' => $re_data]);
    }

    /*
        *专家搜索反馈
    */
    public function actionSearchexp()
    {
        $tmp = Yii::$app->request->queryString;
        $hello = explode('&',$tmp);
        $name = explode("=", $hello[count($hello)-1]); 
        $nickname = urldecode($name[1]); //解码

        $re_data=[
            'status' => '100',
        ];
        $re_data['page'] = '1';

        $db= Yii::$app->db;
        $sel_sql = "SELECT * FROM con_user WHERE user_type=1 and nickname='$nickname' ORDER BY prt DESC LIMIT 0,10 ";
        $getinfo = Yii::$app->db->createCommand($sel_sql)->queryAll();
        if(!empty($getinfo)){
            $re_data['status'] = '200';
            $re_data['getinfo'] = $getinfo;
        }
        // $re_data['last'] = $db->createCommand($sel_sql)->getRawSql();
        // $re_data['nick'] = $nickname;
        return $this->render('expert/main',['data' => $re_data]);
    }



    /*
     * 对read进行排序
    */
    public function levelSort($a, $b) 
    {
        if($a['if_read'] == $b['if_read']) return 0;
        return ($a['if_read']>$b['if_read']) ? 1 : -1;
    }


    /*
     * 消息函数 查看用户的消息
    */
    public function actionMessage()
    {
        $session = Yii::$app->session;
        $userId = $session->get('userId');

        $data = [
            'status' => '100',
        ];
        // step1 文章
        if(!empty($userId))
        {
            $data['status'] = '200';

            //我的发帖
            $db = Yii::$app->db;
            $sel_sql = "SELECT id,title,ctime FROM con_article WHERE userId=$userId order by ctime desc";
            $getinfo = Yii::$app->db->createCommand($sel_sql)->queryAll();
            $length = count($getinfo);
                   
            for ($i=0; $i <$length ; $i++) {   
                // step2 未读评论          
                $article_id = $getinfo[$i]['id'];
                $tm=date("Y-m-d H:i:s",$getinfo[$i]['ctime']);
                $getinfo[$i]['time'] = $tm;
                $sel_sql = "SELECT id FROM con_tips where articleId=$article_id and if_read=0 order by ctime desc";
                $tipsinfo = $db->createCommand($sel_sql)->queryOne();
                if($tipsinfo){
                    $getinfo[$i]['if_read'] =0;
                }else{
                    $getinfo[$i]['if_read']=1;
                }
            }
            $data['getinfo'] = $getinfo;
            // 对if_read进行排序 保持原来的顺序创建2个空数组，第一个保存要排序的字段，第二个保存原始索引信息 
            $i = 0; 
            $a = $index = array(); 
            foreach ($data['getinfo'] as $key => $value) { 
                $a[$key] = $value   ['if_read']; 
                $index[] = $i++; 
            } 
            array_multisort($a, SORT_ASC, $index, SORT_ASC, $data['getinfo']); 
            // usort($data['getinfo'], array($this,'levelSort'));
    
            //我的回帖
            $sel_sql = "SELECT articleId FROM con_tips where from_id=$userId order by ctime desc";
            $repinfo = Yii::$app->db->createCommand($sel_sql)->queryAll();
            $length = count($repinfo);
            for($i=0; $i <$length ; $i++) {   
                //获取文章的标题等信息
                $articleId = $repinfo[$i]['articleId'];
                $sel_sql="SELECT title,ctime FROM con_article WHERE id=$articleId order by ctime desc";
                $artinfo = $db->createCommand($sel_sql)->queryOne();
                if($artinfo){
                    $tm=date("Y-m-d H:i:s",$artinfo['ctime']);
                    $repinfo[$i]['time'] = $tm;
                    $repinfo[$i]['id'] = $articleId;
                    $repinfo[$i]['title'] = $artinfo['title'];
                }
            }
            $data['repinfo'] = $repinfo;
    }
        return $this->render('message/main',['data' => $data]);
    }


    /*
        test database
    */
    public function actionTestdb()
    {
        // $db = Yii::$app->db;
        // // $userinfo =  $db->createCommand('SELECT * FROM con_user')
        // //     ->queryAll();
        // $username = "18916294857";
        // $sql = "SELECT * FROM con_user where username=$username";
        // $getinfo =  $db->createCommand($sql)->queryOne();
        // $re_data=[
        //         'testData' => 'helpdata',
        // ];
        // // $re_data['nickname']=$getinfo['nickname'];
        // // $re_data['password'] = $getinfo['password'];
        // // if($getinfo['password'] =="123")
        // //     $getinfo['status'] = '200';
        // //     $data = [
        // //             'testData' => "fuck",
        // //             're_data' => $getinfo,
        // //         ];
        // // }else{
        // if(!empty($getinfo)){
        //     $getinfo['status'] = '200';
        //     $data = [
        //             'testData' => "fuck",
        //             're_data' => $getinfo,
        //         ];
        // }
        // else{
        //     $getinfo['status'] = '100';
        //     $data = [
        //         'testData' => "fuck",
        //         're_data' => $getinfo,
        //     ];
        // }
        // }
        // $time = strtotime(date('Y-m-d',time()).' 00:00:00');
        // $insert_data = [
        //     'username' => '18916293322',
        //     'password' => '123456',
        //     'user_type' => '2',
        //     'nickname' => 'doc_3321',
        //     'ctime' => $time
        // ];

        // $db->createCommand()->insert('con_user',$insert_data)->execute();
        // $re_data=[
        //     'status' => '100',
        // ];
        // $re_data['nickname']='nickname';
        // $re_data['password'] = 'password';
        // $re_data['session'] = 'fuck';
        // $path = "testupload/";
        // $username = "18916294857";
        // $path=$path.$username;
        // mkdir($path,0777);
        // chmod($path,0777);

        // $session = Yii::$app->session;
        // $re_data['session'] = $session->get('username');

        // $data = ['testData' => 'helpdata',
        //         're_data' => $re_data,
        //     ];
        $tmp = Yii::$app->request->queryString;
        $getinfo['status'] = '200';

        $help = substr($tmp,-1);
        $getinfo['fuck'] = $help;
        $data = [
                'testData' => "fuck",
                 're_data' => $getinfo,
           ];

        //  $smsObj = new \gmars\sms\Sms(
        //     'ALIDAYU',
        //     [
        //         'appkey'=>'LTAI9M8T8TBHLxH4',
        //         'secretkey'=>'50Gk84Q42Pr6AcBmeG7D13faZMWXuv'
        //     ]
        // );
        // $flag=$smsObj->send([
        //           'mobile' => '18916294857',
        //           'signname' => '心事网',
        //           'templatecode' => 'SMS_102295009',
        //           'extend' => '123456',
        //           'data' => [
        //               'code' => '1315',
        //               'time' => '10'
        //           ],
        // ]);

        //   $smsObj = new \gmars\sms\Sms(
        //     'ALIYUN',
        //     [
        //         'appkey'=>'LTAI9M8T8TBHLxH4',
        //         'secretkey'=>'50Gk84Q42Pr6AcBmeG7D13faZMWXuv'
        //     ]
        // );
        // $flag=$smsObj->send([
        //           'mobile' => '18916294857',
        //           'signname' => '心事网',
        //           'templatecode' => 'SMS_102295009',
        //           'data' => [
        //               'code' => '1315',
        //               'product' => '100'
        //           ],
        // ]);  

        $demo = new SmsDemo(
		    "LTAI9M8T8TBHLxH4",
		    "50Gk84Q42Pr6AcBmeG7D13faZMWXuv"
		);
		$response = $demo->sendSms(
		    "心事网", // 短信签名
		    "SMS_102295009", // 短信模板编号
		    "18916294857", // 短信接收者
		    Array(  // 短信模板中字段的值
		        "code"=>"12345",
		        "product"=>"dsd"
		    ),
		    "123"
		);
		// print_r($response);
		$data['send_response'] = $response;
		$data['code'] = $response->Code;

		// echo "SmsDemo::queryDetails\n";
		// $response = $demo->queryDetails(
		//     "18916294857",  // phoneNumbers 电话号码
		//     "20170718", // sendDate 发送时间
		//     10, // pageSize 分页大小
		//     1 // currentPage 当前页码
		//     // "abcd" // bizId 短信发送流水号，选填
		// );
		// $data['rev_response'] = $response;
		// print_r($response);

        // $data['dir'] =  dirname(__DIR__) . '/api_sdk/vendor/autoload.php';

        // $data['flag'] = $flag;
        // if($flag->code == 0){
        //     $data['success'] = 'success';
        // }else{
        //     $data['success'] = 'failed';
        // }
        return $this->render('testdb/main',['data' => $data]);
    }
   


    //未完善的功能
    public function actionService()
    {
       
        return $this->render('service/main');
    }
    public function actionTelephone()
    {
       
        return $this->render('service/main');
    }
        public function actionGetexpert()
    {
       
        return $this->render('service/main');
    }
}























