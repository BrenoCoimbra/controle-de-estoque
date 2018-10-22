<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedor".
 *
 * @property int $id
 * @property string $nome
 * @property string $telefone
 * @property string $endereco
 * @property string $cnpj
 *
 * @property Produto[] $produtos
 */
class Fornecedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fornecedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'telefone', 'cnpj', 'endereco'], 'required'],
            [['nome', 'endereco', 'cnpj'], 'string', 'max' => 255],
            [['telefone'], 'string', 'max' => 12],
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
            'telefone' => 'Telefone',
            'endereco' => 'Endereço',
            'cnpj' => 'CNPJ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), ['fornecedor_id' => 'id']);
    }
}
