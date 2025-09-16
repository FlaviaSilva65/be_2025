<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bolsas de Estudos</title>
    <?= $this->Html->meta('favicon.png', '/favicon.png', ['type' => 'icon']) ?>

    <?php // $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'page_home', 'bootstrap.min']) 
    ?>
    <?= $this->Html->css(['all.min.css', 'bootstrap.min', 'page_home', 'header', 'footer', 'bootstrap-icons', 'sidebars', 'style', 'print']) ?>

    <?=
    $this->Html->script([
        'jquery.min',
        'bootstrap.bundle.min',
        'jsapi',
        'jquery.maskedinput',
        'jquery.mask',
        'busca_cep',
        'script',
        'sidebars',

    ])
    ?>
    <?php // $this->Html->script(['jquery.min','jsapi', 'bootstrap.min', 'sidebars', 'jquery.mask','jquery.maskedinput', 'script']); 
    ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>

    <div class="container-fluid m-0 p-0 gx-0">
        <?=
        $this->Element('header') .
            $this->Element('modal_login') .
            $this->Flash->render() ?>

        <div class="row gx-0">
            <?php if ($user) { ?>
                <div class="col-2 p-0" style="min-height: 43.5em;">
                    <?= $this->element('menu') ?>
                </div>
                <div class="col-10 p-0">
                    <?= $this->fetch('content') ?>
                </div>
            <?php } else { ?>

                <div class="w-100 gx-0">
                    <?= $this->fetch('content') ?>
                </div>
            <?php } ?>
        </div>

    </div>
    <?= $this->Element('footer') ?>
</body>

</html>