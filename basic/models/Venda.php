<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venda".
 *
 * @property int $id
 * @property string $data_venda
 * @property string $valor_final
 * @property int $cliente_id
 * @property int $produto_id
 * @property int $qtnd_vendida
 *
 * @property Cliente $cliente
 * @property Produto $produto
 */
class Venda extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venda';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_venda', 'valor_final', 'cliente_id', 'produto_id', 'qtnd_vendida'], 'required'],
            [['data_venda'], 'safe'],
            [['valor_final'], 'number'],
            [['cliente_id', 'produto_id'], 'integer'],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['produto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_venda' => 'Data Venda',
            'valor_final' => 'Valor Final',
            'cliente_id' => 'Cliente ID',
            'produto_id' => 'Produto ID',
            'qtnd_vendida' => 'Unidades vendidas'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id' => 'cliente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'produto_id']);
    }
}
