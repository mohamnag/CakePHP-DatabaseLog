<h1><?php echo __('Members\'s activity log') ?></h1>

<?php echo $this->Form->postLink(__('Delete', __('Log')), array('action' => 'delete', $log['Log']['id']), array(), __('Are you sure you want to delete this log?')); ?>
<?php echo $this->Html->link(__('Back to list'), array('action' => 'index')); ?>

<dl>
    <dt><?php echo __('type'); ?></dt>
    <dd>
        <?php echo $log['Log']['type']; ?>
    </dd>
    <dt><?php echo __('Message'); ?></dt>
    <dd>
        <?php echo nl2br(h($log['Log']['message'])); ?>
    </dd>
    <dt><?php echo __('Uri'); ?></dt>
    <dd>
        <?php echo h($log['Log']['uri']); ?>
    </dd>
    <dt><?php echo __('Referrer'); ?></dt>
    <dd>
        <?php echo h($log['Log']['refer']); ?>
    </dd>
    <dt><?php echo __('Hostname'); ?></dt>
    <dd>
        <?php echo h($log['Log']['hostname']); ?>
    </dd>
    <dt><?php echo __('IP'); ?></dt>
    <dd>
        <?php echo $log['Log']['ip']; ?>
    </dd>
    <dt><?php echo __('Created'); ?></dt>
    <dd>
        <?php echo $log['Log']['created']; ?>
    </dd>
</dl>
