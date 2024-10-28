<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idUsuario
 * @property string|null $tipo_documento
 * @property int|null $documento
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $fecha_nacimiento
 * @property int $telefono
 * @property string|null $email
 * @property string|null $contraseña
 * @property string|null $fecha_actualizacion_datos
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
            [['tipo_documento'], 'string'],
            [['documento', 'telefono'], 'integer'],
            [['fecha_nacimiento', 'fecha_actualizacion_datos'], 'safe'],
            [['telefono'], 'required'],
            [['nombre', 'apellido'], 'string', 'max' => 20],
            [['email', 'contraseña'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUsuario' => 'Id Usuario',
            'tipo_documento' => 'Tipo Documento',
            'documento' => 'Documento',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'telefono' => 'Telefono',
            'email' => 'Email',
            'contraseña' => 'Contraseña',
            'fecha_actualizacion_datos' => 'Fecha Actualizacion Datos',
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
