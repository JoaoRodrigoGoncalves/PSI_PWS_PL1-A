<?php

class DashboardController extends BaseAuthController
{
    public function index()
    {
        $this->loginFilter();
        $auth = new Auth();
        if($auth->getRole() == 'cliente')
        {
            $this->RenderView('dashboard', 'index_Cliente');
        }
        else
        {
            date_default_timezone_set('Europe/Lisbon');
            $faturas = Fatura::all(array('conditions' => array('data >= ?', date("Y-m-d 00:00:00", strtotime("-5 days")))));

            $data = array();

            for ($i = 4; $i >= 0; $i--)
            {
                //Gerar os indexes para cada dia. Fazemos de 4 para 0 de forma a incluir o dia atual
                $data[date("d-m", strtotime("-" . $i . " days"))] = 0;
            }

            foreach ($faturas as $fatura)
            {
                $date = date("d-m", strtotime($fatura->data));
                $data[$date]++;
            }
            $this->RenderView('dashboard', 'index_Funcionario', ['dados' => $data]);
        }
    }
}