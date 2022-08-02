<?= $this->Flash->render() ?>
<?= $this->Form->create($user) ?>
    <div class="form-floating">
        <?php echo $this->Form->control('name', ['label' => false,'class' => 'form-control', 'placeholder' => 'Digite seu nome/apelido']); ?> 
        <?php echo $this->Form->control('phone', ['label' => false,'class' => 'form-control phone', 'placeholder' => 'Digite um telefone para contato']); ?>
    </div>
    <?php echo $this->Form->button(__('Entrar'),['class'=>'w-100 btn btn-lg btn-warning text-dark']);?>
    <small>Guarde seus dados para acessos futuros.</small> 
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
<?= $this->Form->end() ?>
<?php echo $this->Html->script('datepicker'); ?>