<?php

use Dompdf\Dompdf;

class FaturaController extends BaseAuthController{

    public function index()
    {
        $this->filterByRole(['funcionario', 'administrador']);
        $faturas = Fatura::all();
        $this->RenderView('fatura', 'index', ['faturas' => $faturas]);
    }

    public function show($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);
        try
        {
            $fatura = Fatura::find($id);
            $empresa = Empresa::find(1);

            $this->RenderView('fatura', 'show', ['fatura' => $fatura, 'empresa' => $empresa]);
        }
        catch (Exception $_)
        {
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }
    
    public function create()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        $cliente = isset($_GET['idCliente'])? User::find_by_id_and_role($_GET['idCliente'], 'cliente') : new User();
        $this->RenderView('fatura', 'create', ['cliente' => $cliente]); //mostrar a vista create
    }

    public function store()
    {
        $this->filterByRole(['funcionario', 'administrador']);

        if(!isset($_POST['idCliente']))
            $this->RedirectToRoute('fatura', 'create');

        $funcionario = User::find_by_email($_SESSION['email']);

        $fatura = new Fatura(array(
            'estado_id' => 1,
            'cliente_id' => $_POST['idCliente'],
            'funcionario_id' => $funcionario->id
        ));

        try
        {
            if($fatura->is_valid()){
                $fatura->save();
                $this->RedirectToRoute('fatura', 'show', ['id' => $fatura->id]); //redirecionar para o index
            }
            else
            {
                $cliente = isset($_GET['idCliente'])? User::find_by_id_and_role($_GET['idCliente'], 'cliente') : new User();

                $this->RenderView('fatura', 'create', ['cliente' => $cliente, 'fatura' => $fatura]); //mostrar vista create passando o modelo como parâmetro
            }
        }
        catch (Exception $_ex)
        {
            $this->RedirectToRoute('fatura', 'create');
        }
    }

    // Update funciona como "Finalizar"
    public function update($id){
        $this->filterByRole(['funcionario', 'administrador']);

        try{
            $fatura = Fatura::find($id);

            $this_funcionario = User::find_by_email($_SESSION['email']);

            $fatura->update_attributes(array(
                'estado_id' => 2,
                'funcionario_id' => $this_funcionario->id // Atribui o ID do funcionário que finaliza a fatura
            ));
            $fatura->save();

            $emailSystem = new EmailSystem();
            $empresa = Empresa::find(1);

            $body = "Olá <b>" . $fatura->cliente->username . "</b>,<br>";
            $body .= "Obrigado pela tua compra em " . $empresa->designacaosocial . "!<br>";
            $body .= "Podes consultar mais dados da tua compa na area de cliente, iniciando sessão com o teu e-mail e palavra-passe.<br><br>";
            $body .= "Cumprimentos,<br><b>" . $empresa->designacaosocial . "</b>";

            if($emailSystem->sendEmail($fatura->cliente->email, $fatura->cliente->username, "Confirmação de compra em " . $empresa->designacaosocial, $body))
            {
                $this->RedirectToRoute('fatura', 'index');
            }
            else
            {
                $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
            }
        }catch (Exception $_ex){
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }

    // O Delete funciona como Anular
    public function delete($id)
    {
        $this->filterByRole(['funcionario', 'administrador']);

        try{
            $fatura = Fatura::find($id);

            $fatura->update_attributes(array(
                'estado_id' => 3
            ));

            foreach ($fatura->linhafatura as $linhafatura){
                $produto = Produto::find($linhafatura->produto->id);
                $produto->update_attributes(array(
                    'stock' => $produto->stock + $linhafatura->quantidade
                ));
                
                if($produto->is_valid()) {
                    $produto->save();
                    $fatura->save();
                }
            }
            $this->RedirectToRoute('fatura', 'index');
        }catch (Exception $_ex){
            $this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }
    }

    // Download fatura como pdf
    public function pdf($id){

        $this->filterByRole(['funcionario', 'administrador']);

        try
        {
            $fatura = Fatura::find($id);
            $empresa = Empresa::find(1);
            $dompdf = new Dompdf();
            // TODO Try to correct access external css
            $dompdf->setBasePath("./public/dist/css");
            //Load heather
            $html = '<!DOCTYPE html>
            <html lang="pt">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link type="text/css" rel="stylesheet" media="dompdf" href="./public/dist/css/pdf.css">
            </head>';
            //Load body html
            $html .=
            '<body>
            <style>'. file_get_contents('./public/dist/css/faturamais_custom.css').'</style>
            <style>
            '. file_get_contents('./public/dist/css/pdf.css') .'
            </style>
            <div>
                <!-- Content Header (Page header) -->
                <div >
                    <div >
                        <div >
                            <div >
                                <h1 >Fatura Nº' . $fatura->id .'</h1>
                                ';
            if ($fatura->estado->id == 1)
                $html .= '<span ><b>'.$fatura->estado->estado.'</b></span>';
            else if($fatura->estado->id == 2)
                $html .= '<span ><b>'.$fatura->estado->estado.'</b></span>';
            else if($fatura->estado->id == 3)
                $html .= '<span ><b>'.$fatura->estado->estado.'</b></span>';
            //Load Empresa e Cliente data
            $html .= '
                                <p>Data: '.$fatura->data->format('d-m-Y').'</p>
                                </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            <!-- /.content-header -->
            <div>
                <div>
                    <div class="info-fatura">
                         <table>
                            <tr>
                                <td class="info-fatura">
                                    '. $empresa->designacaosocial .'<br>
                                    '. $empresa->morada .'<br>
                                    '. $empresa->codigopostal .', '. $empresa->localidade .'<br>
                                    NIF: '. $empresa->nif .'<br>
                                    Telefone: '. $empresa->telefone .'<br>
                                    Email: '. $empresa->email.'
                                </td>
                                <td class="info-fatura">
                                    <b>Cliente:</b> <br>
                                    '. $fatura->cliente->username .' <br>
                                    '. $fatura->cliente->morada .' <br>
                                    '. $fatura->cliente->codigopostal .', '. $fatura->cliente->localidade .' <br>
                                    Nif: '. $fatura->cliente->nif .'
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <div>            
                            <table class="linha-fatura">
                                <thead>
                                    <tr>
                                        <th class="fit_column">Referência</th>
                                        <th>Produto</th>
                                        <th class="fit_column">Qtd</th>
                                        <th class="fit_column">Preço un.</th>
                                        <th class="fit_column">Taxa</th>
                                        <th class="fit_column">Total Sem IVA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ';
            //Load fatura data
            foreach ($fatura->linhafatura as $linhafatura)
            {
                $html .= '
                <tr>
                    <td>'. $linhafatura->produto->id.'</td>
                    <td>'. $linhafatura->produto->descricao.'</td>
                    <td>'. $linhafatura->quantidade .'</td>
                    <td>'. $linhafatura->valor .'€</td>
                    <td>'. $linhafatura->taxa->valor .'%</td>
                    <td>'. $linhafatura->valor * $linhafatura->quantidade.' €</td>
                </tr>
                ';
            }
            //Load valores da fatura
            $html .= '
            <tr style="text-align: right">
                <td colspan="4">&nbsp;</td>
                <td>Total Líquido</td>
                <td>'. round($fatura->getSubtotal(),2) .'€</td>
            </tr>
            '. $fatura->taxBox() .'
            <tr style="text-align: right">
                <td colspan="4">&nbsp;</td>
                <td>Total Bruto</td>
                <td>'. round($fatura->getTotal(),2) .'€</td>
            </tr>
            ';
            $html .= '</tbody></table></div></div><p>Fatura processada por '. $fatura->funcionario->username .'</p></div></div></div></body>';
            //
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4');
            $dompdf->render();
            //Auto download
            //$dompdf->stream();
            //Mostra uma página com a estrutura do PDF
            $dompdf->stream("fatura_" . $fatura->id . ".pdf", array("Attachment" => false));
            //$this->RenderView('fatura', 'show', ['fatura' => $fatura, 'empresa' => $empresa]);
        }
        catch (Exception $_)
        {
            //$this->RedirectToRoute('error', 'index', ['callbackRoute' => 'fatura/index']);
        }

    }
}