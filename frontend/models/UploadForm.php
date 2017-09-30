<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    // public $imageFile;
    public $imageFiles;

    public function rules()
    {
        //  return [
        //     [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        // ];
         return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false,  'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {

        if ($this->validate()) {
            // $this->imageFile->saveAs('testupload/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $session = Yii::$app->session;
            $uname = $session->get('username');
            $path="testupload/".$uname."/";
            $i=1;
            foreach ($this->imageFiles as $file) {
                if($i==1){
                    $tmp="0000";

                    $file->saveAs($path . $tmp . '.' . $file->extension);
                }else{
                    $file->saveAs($path . $file->baseName . '.' . $file->extension);
                }
                $i = $i+1;
            }
            return true;
        } else {
            return false;
        }
    }
}
?>





