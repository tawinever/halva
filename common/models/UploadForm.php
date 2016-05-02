<?php 

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;
use common\models\Image;
class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $product_id;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $isUnique = false;
            while(!$isUnique)
            {
                $random = \Yii::$app->security->generateRandomString(20);
                $isUnique = Image::find()->where(['url' => 'uploads/'.$random.'.'.$this->imageFile->extension])->exists() ? false : true ;
            }
            $this->imageFile->saveAs('uploads/' . $random . '.' . $this->imageFile->extension);
            $image = new Image;
            $image->product_id = $this->product_id;
            $image->url = 'uploads/'.$random.'.'.$this->imageFile->extension;
            $image->save();
            return true;
        } else {
            return false;
        }
    }
}