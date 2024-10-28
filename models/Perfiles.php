<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfiles".
 *
 * @property int $idPerfil
 * @property string $nombre_perfil
 * @property int $estado
 *
 * @property PerfilesUsuarios[] $perfilesUsuarios
 */
class Perfiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfiles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_perfil', 'estado'], 'required'],
            [['nombre_perfil'], 'string'],
            [['estado'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPerfil' => 'Id Perfil',
            'nombre_perfil' => 'Nombre Perfil',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[PerfilesUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilesUsuarios()
    {
        return $this->hasMany(PerfilesUsuarios::class, ['id_perfil' => 'idPerfil']);
    }
}
