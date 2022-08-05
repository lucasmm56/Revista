<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Pedidos Natura</title>


    <?php echo $this->Html->css("bootstrap.min.css") ?>
    <!-- Custom styles for this template -->
    <?php echo $this->Html->css("blog.css") ?>
</head>

<body>
    <main class="container">
        <div class="p-4 p-md-1 mb-4 rounded text-bg-dark">
            <iframe class="responsive-iframe" src='<?php echo $this->Url->build('../files/natura-c07-22.pdf') ?>' class="iframe-full" style="width:100%; height:400px;"></iframe>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"style='left:15px'>
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Produtos</strong>
                        <font size='1'>Copie o conteúdo da revista e cole aqui</font>
                        <hr>
                        <?= $this->Form->create($product) ?>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                   
                                    <?php echo $this->Form->text('name', ['label' => '', 'class' => 'form-control', 'placeholder' => 'Nome do produto']); ?>
                                </div>
                                <div class="col">
                                    <?php echo $this->Form->text('product_code', ['label' => '', 'class' => 'form-control', 'placeholder' => 'Código do produto']); ?>
                                </div>
                                <div class="col">
                                    <?php echo $this->Form->text('amount', ['label' => '', 'class' => 'form-control',  'placeholder' => 'Quantidade']); ?>
                                </div>
                            </div>
                            <hr>
                            <?= $this->Form->button(__('Pedir'), ['class' => 'btn btn-primary']) ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style='left:20px'>
                    <div class="col p-2 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Carrinho</strong>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($products as $product) : ?>
                                        <td><?= $product->name ?></td>
                                        <td><?= $product->product_code ?>
                                        <td><?= $product->amount ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('Editar'), ['action' => 'add', $product->id]) ?>
                                            <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $product->id], ['confirm' => __('Tem certeza que deseja excluir o produto {0} id {1}?', $product->name, $product->id)]) ?>
                                        </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <nav aria-label="...">
                            <ul class="pagination pagination-sm">
                                <?= $this->Paginator->first('<< ' . __('primeira')) ?>
                                <?= $this->Paginator->prev('< ' . __('anterior')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('próximo') . ' >') ?>
                                <?= $this->Paginator->last(__('último') . ' >>') ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>