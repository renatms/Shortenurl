<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Short extends Model
{
    public $longUrl;
    public $shortUrl;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['longUrl'], 'required'],
            [['longUrl'], 'url'],
            [['shortUrl'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'longUrl' => 'Длинная ссылка',
            'shortUrl' => 'Короткая ссылка',
        ];
    }

    /**
     * @param bool $longUrl
     * @return bool|string
     */
    public function send($longUrl=false)
    {
        define("AUTH_KEY", "335fa775009fe31a5142b41fc0409854d5b5b882");
        define("API_URL", "https://vk.io/api/?api=");
        if($longUrl){
            return json_decode(file_get_contents(API_URL.AUTH_KEY."&url=".$longUrl),true);
        }
        return $longUrl;
    }

}