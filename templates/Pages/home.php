<?php

use Dompdf\Css\Style;
?>


<div class="row px-0 m-0 bg-azulM"
  style="
    margin-bottom: 10px;
    padding-bottom: 10px;
    padding-top: 10px;
    justify-content: center;
    ">
  <div class="col-md-4 col-xl-2 d-none d-lg-block d-flex justify-content-center position-relative align-items-end text-center">
    <div class="bg-verdeM mt-2 pt-3 pb-4 px-2 rounded w-75">
      <div class="bg-verdeE mt-1 rounded mx-2 text-center"><i class="far fa-file-alt py-3 text-white" style="font-size: 250%;"></i></div>
      <p class="mt-1" style="color: white;">EDITAL DE ABERTURA</p>
    </div>
  </div>

  <div class="col-md-4 col-xl-2 d-none d-lg-block d-flex justify-content-center position-relative align-items-end text-center">
    <div class="bg-verdeM mt-2 pt-3 pb-4 px-2 rounded w-75">
      <div class="bg-verdeE mt-1 rounded mx-2 text-center"><i class="far fa-file-alt py-3 text-white" style="font-size: 250%;"></i></div>
      <p class="mt-1" style="color: white;">RECURSO</p>
    </div>
  </div>

  <div class="col-md-4 col-xl-2 d-none d-lg-block d-flex justify-content-center position-relative align-items-end text-center">
    <div class="bg-verdeM mt-2 pt-3 pb-4 px-2 rounded w-75">
      <div class="bg-verdeE mt-1 rounded mx-2 text-center"><i class="far fa-file-alt py-3 text-white" style="font-size: 250%;"></i></div>
      <p class="mt-1" style="color: white;">EDITAL DE CLASSIFICAÇÃO</p>
    </div>
  </div>


  <!-- Em Mobile -->
  <div class="col-sm-12 d-sm-block d-md-none d-flex justify-content-center position-relative align-items-end text-center">
    <div class="bg-verdeM mt-2 mx-1 pt-3 pb-4 px-2 rounded w-25">
      <div class="bg-verdeE mt-1 rounded text-center"><i class="far fa-file-alt py-3 text-white" style="font-size: 250%;"></i></div>
      <span class="mt-1" style="color: white;font-size: .6rem !important;">EDITAL DE ABERTURA</span>
    </div>
    <div class="bg-verdeM mt-2 mx-1 pt-3 pb-4 px-2 rounded w-25">
      <div class="bg-verdeE mt-1 rounded text-center"><i class="far fa-file-alt py-3 text-white" style="font-size: 250%;"></i></div>
      <span class="mt-1" style="color: white; font-size: .6rem !important;">RECURSO</span>
    </div>
    <div class="bg-verdeM mt-2 mx-1 pt-3 pb-4 PX-2 rounded w-25">
      <div class="bg-verdeE mt-1 rounded text-center mx-3"><i class="far fa-file-alt py-3 text-white" style="font-size: 250%;"></i></div>
      <span class="mt-1 p-auto" style="color: white; font-size: .6rem !important;">EDITAL DE CLASSIFICAÇÃO</span>
    </div>
  </div>
</div>
<div class="hr_home mt-4"></div>
<div class="col-12 bannerprincipal">
  <h1 class="text-center mt-0"> BOLSA DE ESTUDOS</h1>
</div>
<div class="hr_home"></div>
<div class="container">
  <?php if (isset($impressao) && isset($expirado) && $expirado !== 'prazoentrega') { ?>

    <div class="my-4 d-flex justify-content-around">
      <?= $this->Html->link('<i class="fa fa-book"></i> ' . ' Impressão de Documentos - Bolsa Parcial', ['controller' => 'Responsavels', 'action' => 'add', 'impressao'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>
      <?= $this->Html->link('<i class="fas fa-swimmer"></i>' . ' Impressão de Documentos - Bolsa Atleta', ['controller' => 'Responsavels', 'action' => 'add', 'impressao'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>
    </div>

  <?php } else { ?>
    <div class="my-4 d-flex justify-content-around">
      <!-- <?php // $this->Html->link('<i class="fa fa-book"></i> ' . ((isset($expirado) && $expirado == 'prazoentrega') ? ' Correção de Documentos - Bolsa Parcial ' : ' Inscreva-se na Bolsa Parcial'), ['controller' => 'Responsavels', 'action' => 'add', 'parcial'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?> -->

      <?php $this->Html->link('<i class="fa fa-book"></i> ' . ((isset($expirado) && $expirado == 'expirado') ? ' Correção de Documentos - Bolsa Parcial ' : ' Inscreva-se na Bolsa Parcial'), ['controller' => 'Responsavels', 'action' => 'add', 'parcial'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>

      <?php if (isset($expirado) && $expirado == 'expirado') { ?>

        <?= $this->Html->link('<i class="fa fa-book"></i> ' . ((isset($expirado) && $expirado == 'expirado') ? ' Fora do Prazo - Bolsa Parcial ' : ($evento->tp_eventos_id == 3 ? ' Recurso - Bolsa Parcial' : ($evento->tp_eventos_id == 1 ? ' Inscreva-se na Bolsa Parcial' : ''))), ['controller' => 'Pages', 'action' => 'home'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>
        <?= $this->Html->link('<i class="fas fa-swimmer"></i> ' . ((isset($expirado) && $expirado == 'expirado') ? ' Fora do Prazo - Bolsa Atleta ' : ($evento->remanescente == null ? ' Recurso - Bolsa Atleta' : ($evento->tp_eventos_id == 1 ? ' Inscreva-se na Bolsa Atleta' : ''))), ['controller' => 'Pages', 'action' => 'home'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>

      <?php } else { ?>

        <?= $this->Html->link('<i class="fa fa-book"></i> ' . ((isset($expirado) && $expirado == 'prazoentrega') ? ' Correção de Documentos - Bolsa Parcial ' : ($evento->tp_eventos_id == 3 ? ' Recurso - Bolsa Parcial' : ($evento->tp_eventos_id == 1 ? ' Inscreva-se na Bolsa Parcial' : ''))), ['controller' => 'Responsavels', 'action' => 'add', 'parcial'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>
        
        <?php $this->Html->link('<i class="fas fa-swimmer"></i> ' . ((isset($expirado) && $expirado == 'prazoentrega') ? ' Correção de Documentos - Bolsa Atleta ' : ($evento->remanescente == null ? ' Recurso - Bolsa Atleta' : ($evento->tp_eventos_id == 1 ? ' Inscreva-se na Bolsa Atleta' : ''))), ['controller' => 'Responsavels', 'action' => 'add', 'atleta'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>

      <?php } ?>


      <?= $this->Html->link('<i class="fas fa-swimmer"></i>' . ((isset($expirado) && $expirado == 'prazoentrega') ? ' Correção de Documentos - Bolsa Atleta ' : ' Inscreva-se na Bolsa Atleta'), ['controller' => 'Responsavels', 'action' => 'add', 'atleta'], ['class' => 'btn btn-dark px-4', 'escape' => false]) ?>


    </div>

  <?php } ?>
  <div class="accordion my-3" id="sobre">
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed col_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          <h5 class="mb-0">SOBRE</h5>
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#sobre">
        <div class="accordion-body">
          <p class="p-2">Por meio de parcerias com unidades da rede particular de ensino, as Secretarias de Educação e de Esportes e Lazer disponibilizam bolsas de estudos parcial e integral.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion my-3" id="beneficio">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed col_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <h5 class="mb-0">O BENEFICIO</h5>
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#beneficio">
        <div class="accordion-body">
          <p class="p-2">A bolsa parcial é destinada aos estudantes de Educação Infantil, Fundamental e Médio residentes nesta municipalidade, correspondendo a 50% da anuidade escolar, referente ao horário pedagógico.</p>
          <p class="p-2">A bolsa de estudos integral/Atleta é destinada aos estudantes do Ensino Fundamental e Médio que representam esportivamente o Município por meio de seleções coordenadas pela Secretaria de Esporte e Lazer, correspondendo a integralidade da mensalidade. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion my-3" id="incricao">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed col_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h5 class="mb-0">COMO REALIZAR A INSCRIÇÃO?</h5>
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#incricao">
        <div class="accordion-body">
          <p class="p-2">Deve-se acessar o sistema e realizar o cadastro do responsável e do candidato no período destinado para as inscrições. </p>
          <p class="p-2">A inscrição somente será concluída com a inserção (upload) de TODOS os documentos no sistema, conforme solicitado em Edital. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion my-3" id="documentos">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed col_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          <h5 class="mb-0">DOCUMENTOS NECESSÁRIOS</h5>
        </button>
      </h2>
      <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#documentos">
        <div class="accordion-body">
          <p class="p-2">Destaco que é imprescindível a leitura do Edital.</p>
          <p class="p-2"> A relação de documentos necessários para pleitear a bolsa está disposta no item 5, para candidatos a bolsa parcial, e no item 6, para bolsa atleta. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion my-3" id="codigo">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed col_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          <h5 class="mb-0">NÃO RECEBI O CÓDIGO PARA HABILITAR MINHA CONTA</h5>
        </button>
      </h2>
      <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#codigo">
        <div class="accordion-body">
          <p class="p-2">O código de acesso é enviado para o e-mail informado no cadastro do responsável. </p>
          <p class="p-2">É possível solicitar o reenvio do código por meio do WhatsApp do setor (13) 3496-1457. Para tanto, é necessário informar: nome completo do responsável cadastrado, CPF e data de nascimento. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion my-3" id="resultado">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed col_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          <h5 class="mb-0">RESULTADOS</h5>
        </button>
      </h2>
      <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#resultado">
        <div class="accordion-body">
          <p class="p-2">É possível acompanhar todas as publicações no site cidadaopg.sp.gov.br.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="accordion my-3" id="duvida">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed col_color" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
          <h5 class="mb-0">AINDA TEM DÚVIDA?</h5>
        </button>
      </h2>
      <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#duvida">
        <div class="accordion-body">
          <p class="p-2">Caso as dúvidas persistam, entre em contato conosco:</p>
          <p class="p-2">Telefone: (13) 3496-1457 (TEL/WhatsApp) – Atendimento das 8h às 17h</p>
          <p class="p-2">E-mail: seduc.legislacao3@praiagrande.sp.gov.br</p>
          <p class="p-2"><strong>Para dúvidas em relação ao bolsa atleta: </strong>Telefone: 3496-5609 </p>
        </div>
      </div>
    </div>
  </div>



</div>