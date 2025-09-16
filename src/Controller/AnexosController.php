<?php

namespace App\Controller;

use CakePdf\View\PdfView;
use Dompdf\Dompdf;

class AnexosController extends AppController
{
  protected array $paginate = [
    'limit' => 50,
    'order' => [
      'Anexos.id' => 'asc'
    ],
  ];

  public function initialize(): void
  {
    parent::initialize();
    //   $this->loadComponent('RequestHandler');
    $this->addViewClasses([PdfView::class]);
  }

  public function index()
  {
    // $anexos = $this->Anexos;
    $anexos = $this->paginate($this->Anexos);
    // $anexos = $this->Anexos->find()->where(['inscricao_id' => 89]);
    $this->set(compact('anexos'));
  }

  public function montarpdf($id = null)
  {
    $anexo = $this->Anexos->get($id);
    // Instanciar e usar a classe dompdf
// $dompdf = new Dompdf(['enable_remote' => true]);

// $dados = "<h1> Gerar PDF com PHP</h1>";

// // $dados .= "<img src='http://localhost/cake_nv/img/Inscricoes/4/77965b37d0e04733ae174a3361c21a0v&contadeluz.jpeg' style='width: 150px; height: 150px;'>";
// $dados .= "<img src='http://localhost/cake_nv/img/Inscricoes/'" . $anexo->inscricao_id . "/" . $anexo->cd_anexo_verificador . "&" + $anexo->nm_anexo . "style='width: 150px; height: 150px;'>";

// debug($dados);
// die;
//$this->Html->image('/img/Inscricoes/' . $anexo->inscricao_id . '/' . $anexo->cd_anexo_verificador . '&' . $anexo->nm_anexo)



// Instanciar o metodo loadHtml e enviar o conteudo do PDF
// $dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
// $dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
// $dompdf->render();

// Gerar o PDF
// $dompdf->stream();

/** Esse código acima é usando o Tutorial do Celke */



    // $orient = 'landscape';
    // // $this->viewBuilder()->enableAutoLayout(false);
    // $anexo = $this->Anexos->get($id);

    $this->viewBuilder()->setOption(
      'pdfConfig',
      [
        [
          // 'isRemoteEnabled' => true,
          // 'orientation' => $orient,
          'download' => true,
          'filename' => $anexo->nm_anexo
        ]
      ]
    );

    $this->viewBuilder()->setClassName('CakePdf.Pdf');

    $cakePdf = new \CakePdf\Pdf\CakePdf(['enable_remote' => true]);
    $cakePdf->template('montarpdf');
    $cakePdf->viewVars([
      'anexo' => $anexo,
    ]);

    $pdf = $cakePdf->write('img' . DS . 'Inscricoes' . DS . $anexo->inscricao_id . DS .
      $anexo->cd_anexo_verificador . '&' .
      $anexo->nm_anexo . '.pdf');

    $pdf = $cakePdf->output();
    $this->set('anexo', $anexo);
    $this->render();
    // // https://codethepixel.com/articles/CakePHP-4-Print-PDF-Using-CakePDF#comment-5672915300
    // $this->set('title');
    $this->set(compact('pdf'));



    /** Esse código foi feito usando intrução da Alura */
    // $obj = new Dompdf(['enable_remote' => true]);
    // $data = file_get_contents('default.php');
    // $obj->loadHTML($data);

    // $options = $obj->getOptions();
    // $options->set('isPhpEnabled', true);

    // $obj->setOptions($options);
    // $obj->setPaper('A4', 'Portrait');
    // $obj->render();
    // file_put_contents('sample1.pdf', $obj->output());
    // $obj->stream('dompdf', array('Attachment' => 0));
  }

  public function viewClasses(): array
  {
    return [PdfView::class];
    // return $this->viewClasses[] = PdfView::class;
  }
}
