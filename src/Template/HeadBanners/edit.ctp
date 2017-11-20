<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $headBanner->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $headBanner->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Head Banners'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="headBanners form large-9 medium-8 columns content">
    <?= $this->Form->create($headBanner) ?>
    <fieldset>
        <legend><?= __('Edit Head Banner') ?></legend>
        <?php
            echo $this->Form->control('title_st');
            echo $this->Form->control('title_nd');
            echo $this->Form->control('start_special_date', ['empty' => true]);
            echo $this->Form->control('end__special_date', ['empty' => true]);
            echo $this->Form->control('image_list_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
