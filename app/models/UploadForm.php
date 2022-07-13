<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'gif, png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(
                'uploads/images/' .
                $this->imageFile->baseName .
                rand(1000000000, 9999999999) .
                '.' .
                $this->imageFile->extension
            );
            return true;
        } else {
            return false;
        }
    }
}