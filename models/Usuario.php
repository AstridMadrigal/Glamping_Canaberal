<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idUsuario
 * @property string|null $Nombre
 * @property string|null $Apellido
 * @property string|null $Fecha de nacimiento
 * @property string|null $Email
 * @property string|null $Contraseña
 * @property string|null $Fecha de Actualización de datos
 *
 * @property PerfilesUsuarios[] $perfilesUsuarios
 * @property Reserva[] $reservas
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUsuario'], 'required'],
            [['idUsuario'], 'integer'],
            [['Fecha de Actualización de datos'], 'safe'],
            [['Nombre', 'Apellido'], 'string', 'max' => 20],
            [['Fecha de nacimiento'], 'string', 'max' => 10],
            [['Email', 'Contraseña'], 'string', 'max' => 30],
            [['idUsuario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Fecha de nacimiento' => 'Fecha De Nacimiento',
            'Email' => 'Email',
            'Contraseña' => 'Contraseña',
            'Fecha de Actualización de datos' => 'Fecha De Actualización De Datos',
        ];
    }

    /**
     * Gets query for [[PerfilesUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilesUsuarios()
    {
        return $this->hasMany(PerfilesUsuarios::class, ['id_usuario' => 'idUsuario']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::class, ['id_usuario_titular' => 'idUsuario']);
    }
}
