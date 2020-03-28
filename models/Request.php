<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property int $id_category
 * @property int $id_user
 * @property string|null $name
 * @property string|null $description
 * @property string|null $photo_to
 * @property int|null $status
 * @property string $datetime
 * @property string|null $description_denied
 * @property string|null $photo_after
 *
 * @property Category $category
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description_denied'], 'required', 'on' => 'cancel'],

            [['id_category', 'name', 'description'], 'required'],
            [['id_category', 'id_user', 'status'], 'integer'],
            [['id_user'], 'default', 'value' => Yii::$app->user->identity->getId()],
            [['description', 'description_denied'], 'string'],
            [['datetime'], 'safe'],
            [['name', 'photo_to', 'photo_after'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false,
                'extensions' => ['png', 'jpg', 'jpeg', 'bmp'], 'maxSize' => 10 * 1024 * 1024],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['cancel'] = ['description_denied', 'status'];
        $scenarios['success'] = ['imageFile', 'status'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание',
            'photo_to' => 'Фото до',
            'status' => 'Статус',
            'datetime' => 'Дата подачи',
            'description_denied' => 'Причина отказа',
            'photo_after' => 'Фото после',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'id_category']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function upload()
    {
        if ($this->validate()) {
            $file_name = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($file_name);
            $this->photo_to = '/' . $file_name;
            return true;
        } else {
            return false;
        }
    }

    public function cancel()
    {
        $this->status = 2;

        if ($this->save()) {
            return true;
        }
        return false;

    }

    public function success()
    {
        $this->status = 1;

        if ($this->validate()) {
            $file_name = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($file_name);
            $this->photo_after = '/' . $file_name;
            if ($this->save(false)) {
                return true;
            }
        }
        return false;
    }
}
