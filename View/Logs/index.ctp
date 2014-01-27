<h1><?php echo __('Members\'s activity log') ?></h1>

<?php echo $this->Html->link(__('Remove %s', __('Duplicates')), array('action' => 'remove_duplicates')); ?>
<?php echo $this->Html->link(__('Reset %s', __('Logs')), array('action' => 'reset')); ?>

<?php
echo $this->Form->create();
echo $this->Form->input('filter', array('label' => FALSE, 'placeholder' => __('Search logs')));
echo $this->Form->submit(__('Search'));
echo $this->Form->end();
?>

<table>
    <thead>
        <tr>
            <th colspan="4">
                <?php echo $this->Paginator->pager(); ?>
            </th>
        </tr>
        <tr>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('type'); ?></th>
            <th><?php echo $this->Paginator->sort('message'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="4">
                <?php echo $this->Paginator->pagination(array('ul' => 'pagination pagination-large')); ?>
            </td>
        </tr>
    </tfoot>

    <?php foreach ($logs as $log): ?>
        <tr>
            <td><?php echo $this->Time->niceShort($log['Log']['created']); ?></td>
            <td><?php echo $log['Log']['type']; ?></td>
            <td><?php echo String::truncate(h($log['Log']['message']), 80); ?></td>
            <td class="actions">
                <?php 
                echo $this->Html->link(__('View Details'), 
                        array('action' => 'view', $log['Log']['id'])
                );
                ?>
                <?php 
                echo $this->Form->postLink(__('Delete'), 
                        array('action' => 'delete', $log['Log']['id']), 
                        NULL,
                        __('Are you sure you want to delete log #%s?', $log['Log']['id'])
                ); 
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>