<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $tipo
 * @property string $foto
 * @property int $quantidade
 * @property date $data_chegada
 * @property datetime $updated_at
 * @property float $valor_un
 * @property float $valor_tot
 * @property int $fornecedor_id
 *
 * @property Fornecedor $fornecedor
 * @property Venda[] $vendas
 */
class Produto extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'quantidade', 'data_chegada', 'valor_un', 'fornecedor_id'], 'required'],
            [['quantidade', 'fornecedor_id'], 'integer'],
            [['data_chegada', 'updated_at'], 'safe'],
            [['valor_un', 'valor_tot'], 'number'],
            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['tipo'], 'string', 'max' => 255],
            [['fornecedor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fornecedor::className(), 'targetAttribute' => ['fornecedor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
            'quantidade' => 'Quantidade',
            'data_chegada' => 'Data de chegada',
            'valor_un' => 'Valor unitário',
            'fornecedor_id' => 'Fornecedor',
            'updated_at' => 'Ultima modificação',
            'foto' => 'Imagem do produto',
            'imageFile' => 'Imagem do produto'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::className(), ['id' => 'fornecedor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVendas()
    {
        return $this->hasMany(Venda::className(), ['produto_id' => 'id']);
    }

    public function upload()
    {
        if ($this->validate())
        {
            $this->imageFile->saveAs('uploads/produtos/'. $this->imageFile->baseName . '.' .$this->imageFile->extension);
            return true;
        }else{
            return false;
        }
    }

}
