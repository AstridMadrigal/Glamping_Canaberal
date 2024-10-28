<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfiles_usuarios".
 *
 * @property int $id_perfil_usuario
 * @property int $id_usuario
 * @property int $id_perfil
 *
 * @property Perfiles $perfil
 * @property Usuario $usuario
 */
class PerfilesUsuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfiles_usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_perfil'], 'required'],
            [['id_usuario', 'id_perfil'], 'integer'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['id_usuario' => 'idUsuario']],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfiles::class, 'targetAttribute' => ['id_perfil' => 'idPerfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perfil_usuario' => 'Id Perfil Usuario',
            'id_usuario' => 'Id Usuario',
            'id_perfil' => 'Id Perfil',
        ];
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfiles::class, ['idPerfil' => 'id_perfil']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::class, ['idUsuario' => 'id_usuario']);
    }
}
