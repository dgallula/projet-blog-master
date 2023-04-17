<form action="" method="POST">
    <?= $form->input('name', 'Titre'); ?>
    <?= $form->input('slug', 'URL'); ?>
    <button class="btn btn-primary">
        <?php if ($item->getID() !== null) : ?>
            Modifier
        <?php else: ?>
            Créer
        <?php endif ?>
    </button>
</form>