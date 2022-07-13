<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\imagine\Image;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @var string
     */
    public $imageName;

    /**
     * @var string
     */
    public $imagePath = 'uploads/images/';



    public function rules()
    {
        return [
            [['imageFile'],
                'file',
                'skipOnEmpty' => false,
                'extensions' => 'gif, png, jpg'
            ],
        ];
    }


    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageName = $this->generateName();

            $this->imageFile->saveAs($this->imagePath . $this->imageName);
            $this->changeImageSize( $this->imagePath . $this->imageName, 1000, 1000);

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function generateName(): string
    {
        return
            date("Y-m-d", time()) .
            '_' .
            $this->imageFile->baseName .
            '_' .
            rand(1000000000, 9999999999) .
            '.' .
            $this->imageFile->extension
        ;
    }


    /**
     * @param string $path
     * @param int $width
     * @param int $height
     * @return void
     */
    public function changeImageSize(string $path, int $width, int $height): void
    {
        Image::crop(
            Yii::getAlias($path),
            $width,
            $height
        )->save(Yii::getAlias($path), ['quality' => 80]);
    }
}