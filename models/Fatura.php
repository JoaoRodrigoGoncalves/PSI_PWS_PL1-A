<?php
use ActiveRecord\Model;

    class Fatura extends Model
    {
        static $validates_presence_of = array(
            array('estado_id', 'message' => 'Indique o estado da fatura'),
            array('cliente_id', 'message' => 'Selecione o um cliente para a fatura'),
            array('funcionario_id', 'message' => 'Selecione um funcionario para a fatura')
        );

        static $belongs_to = array(
            array('estado'),
            array('cliente', 'class_name' => 'User', 'foreign_key' => 'cliente_id'),
            array('funcionario', 'class_name' => 'User', 'foreign_key' => 'funcionario_id')
        );

        static $has_many = array(
            array('linhafatura')
        );

        /**
         * Calcula o subtotal de uma fatura sem IVA
         */
        public function getSubtotal()
        {
            $subtotal = 0;
            if(count($this->linhafatura) > 0){
                foreach ($this->linhafatura as $linhafatura)
                {
                    $subtotal += ($linhafatura->valor * $linhafatura->quantidade);
                }
            }
            return $subtotal;
        }

        /**
         * Calcula e desenha a tabela de aplicação das diferentes taxas de IVA
         */
        public function taxBox($colspan)
        {
            $return_string = "";

            $valores_taxas = array();

            if(count($this->linhafatura) > 0)
            {

                foreach ($this->linhafatura as $linhafatura)
                {
                    if(!isset($valores_taxas[$linhafatura->taxa->valor]))
                    {
                        $valores_taxas[$linhafatura->taxa->valor] = ($linhafatura->valor * $linhafatura->quantidade);
                    }
                    else
                    {
                        $valores_taxas[$linhafatura->taxa->valor] += ($linhafatura->valor * $linhafatura->quantidade);
                    }
                }

                krsort($valores_taxas, SORT_NUMERIC); // Ordenar as taxas por ordem decrescente antes de desenhar

                foreach ($valores_taxas as $taxa => $valor)
                {
                    $return_string .= '<tr>' . ($colspan > 0 ? '<td colspan="'.$colspan.'"></td>' : '')  . '<td>' . $taxa . '%</td><td>'. $valor .' €</td><td>' . round($valor * ($taxa/100), 2) . '€</td></tr>';
                }
            }

            return $return_string;
        }

        /**
         * Calcula o total com IVA de toda a fatura
         */
        public function getTotal()
        {
            $total = 0;

            if(count($this->linhafatura) > 0)
            {
                foreach ($this->linhafatura as $linhafatura)
                {
                    $total_linha = $linhafatura->valor * $linhafatura->quantidade;

                    if($linhafatura->taxa->valor == 0)
                    {
                        $total += $total_linha;
                    }
                    else
                    {
                        $total += $total_linha + ($total_linha * ($linhafatura->taxa->valor/100));
                    }
                }
            }
            return $total;
        }
    }