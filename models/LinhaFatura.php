<?php

use ActiveRecord\Model;

    class LinhaFatura extends Model
    {
        static $validates_presence_of = array(
            array('fatura_id', 'message' => 'Indique a fatura a que pertence'),
            array('produto_id', 'message' => 'Selecione um produto'),
            array('valor', 'message' => 'Indique o valor do produto'),
            array('quantidade', 'message' => 'Indique a quantidade do produto'),
            array('taxa_id', 'message' => 'Selecione uma taxa de iva')
        );

        static $validates_numericality_of = array(
            array('valor'),
            array('quantidade')
        );

        static $belongs_to = array(
            array('fatura'),
            array('produto'),
            array('taxa')
        );

        /**
         * Faz as validações necessárias relativamente aos stocks
         * e aos valores anteriores da linha de fatura
         *
         * @param int $productID O ID do produto
         * @param numeric $amount A quantidade desse produto indicada pelo utilizador
         * @return bool
         * @throws \ActiveRecord\RecordNotFound
         */
        public function atualizarStock_linhaFatura_update($productID, $amount) : bool
        {
            $this->is_valid(); // Inicializar objecto de erros.

            // Verificar se o produto foi alterado
            if($productID != $this->produto_id)
            {
                $produto_antigo = Produto::find($this->produto_id);
                $novo_produto = Produto::find($productID);

                if($novo_produto->stock >= $amount)
                {
                    // Devolver stock ao antigo produto
                    $produto_antigo->update_attribute('stock', ($produto_antigo->stock + $this->quantidade));

                    $novo_produto->update_attribute('stock', ($novo_produto->stock - $amount));
                    return true;
                }
                else
                {
                    $this->errors->add('quantidade', 'Stock insuficiente');
                    /**
                     * Definir quantidade a mostrar como o total máximo que pode ser adicionado
                     * à linha no momento do calculo. Isto incluí a totalidade do stock
                     */
                    $this->quantidade = $novo_produto->stock;
                    return false;
                }
            }
            else
            {
                // Verificar se a quantidade do produto foi alterada
                if($amount != $this->quantidade)
                {
                    $produto = Produto::find($this->produto_id);
                    if($produto->stock >= ($amount - $this->quantidade))
                    {
                        $produto->update_attribute('stock', ($produto->stock + ($this->quantidade - $amount)));
                        return true;
                    }
                    else
                    {
                        $this->errors->add('quantidade', 'Stock insuficiente');
                        /**
                         * Definir quantidade a mostrar como o total máximo que pode ser adicionado
                         * à linha no momento do calculo. Isto incluí a totalidade do stock + a quantidade
                         * que já se encontrava na linha de produto
                         */
                        $this->quantidade = ($produto->stock + $this->quantidade);
                        return false;
                    }
                }
                return true;
            }
        }
    }