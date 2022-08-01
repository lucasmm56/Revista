<?= $this->Flash->render() ?>
<?= $this->Form->create($user) ?>
    <div class="form-floating">
        <?php echo $this->Form->control('name', ['label' => '','class' => 'form-control','id'=>'inputname', 'placeholder' => 'Digite seu nome']); ?> 
        <?php echo $this->Form->control('phone', ['label' => '','class' => 'form-control','id'=>'inputphone', 'placeholder' => 'Digite seu telefone']); ?>
    </div>
    <?php echo $this->Form->button(__('Entrar'),['class'=>'w-100 btn btn-lg btn-warning text-dark']);?>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
<?= $this->Form->end() ?>