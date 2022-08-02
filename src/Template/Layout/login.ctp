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

$cakeDescription = 'Revista Fabiana e Jussara';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="bootstrap.min.css" rel="stylesheet"> -->
    <?php echo $this->Html->css(['bootstrap.min.css', 'signin', 'base', 'style']) ?>
    <?= $this->Html->script(["jquery-3.6.0.js", "jquery-ui.js", "jquery.mask.min"]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <!-- Custom styles for this template -->
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
   <?php echo $this->Html->image("natura.svg",['class'=>'mb-4','width'=>'72', 'height'=>'57']);?>
        <h1 class="h3 mb-3 fw-normal">Faça seu pedido aqui</h1>
        <?= $this->Flash->render() ?>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>         
    </main>
</body>
</html>