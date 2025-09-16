<?php // $this->Html->css('element_header') ?>
<section class="row headerContainer gx-0">
    <div class="col d-flex justify-content-between">
        <div class="position-relative">
            <?=
                $this->Html->image('topo_esq.svg', ['id' => 'imgEsq']) .
                $this->Html->image('brasãoPG.png', ['id' => 'imgLogoEsc'])
                ?>
        </div>

        <div class="logoTitulo d-none d-lg-flex align-items-center">
            <div class="position-relative">
                <?= $this->Html->image('titulo.svg') ?>
                <p>BOLSA DE ESTUDOS</p>
            </div>
        </div>

        <?= $this->Html->image('topo_dir.svg', ['id' => 'imgDir']) ?>

        <?php
        // debug($this->request->getSession()->read('Auth.id'));
        // die;
        ?>

        <div class="headerBtns">
            <?= $this->Html->link('<i class="fas fa-home text-white"></i>', ['controller' => 'Pages', 'action' => 'home'], ['escape' => false, 'class' => 'btn btn-success me-1 me-sm-2', 'title' => 'Início']) .
                (
                    ($user || $responsavel
                        ? $this->Html->link('<i class="fas fa-sign-out-alt"></i>', ['controller' => 'Users', 'action' => 'logout'], ['escape' => false, 'class' => 'btn btn-success', 'title' => 'Sair do Administrativo'])
                        : '<a href="" data-bs-toggle="modal" data-bs-target="#modalLogin" title="Acessar Administrativo" class="btn btn-success d-none d-lg-inline-block"><i class="fas fa-sign-in-alt text-white"> </i></a>')
                )
                ?>
        </div>
    </div>

</section>