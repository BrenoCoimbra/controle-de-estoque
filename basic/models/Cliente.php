<?php

namespace app\models;

use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nome
 * @property string $email
 * @property string $telefone
 * @property string $cpf
 * @property string $endereco
 * @property string $sexo
 *
 * @property Venda[] $vendas
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'telefone', 'cpf', 'endereco', 'sexo'], 'required'],
            [['nome', 'email', 'endereco', 'sexo'], 'string', 'max' => 255],
            [[ 'cpf'], 'string', 'max' => 15],
            [['email'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'telefone' => 'Telefone',
            'cpf' => 'CPF',
            'endereco' => 'Endereço',
            'sexo' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['cliente_id' => 'id']);
    }
}
