<?php include_component('home','leftmenu'); ?>
<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:17:25
?>
<?php use_helper('Object') ?>

<?php echo form_tag('degree/update') ?>

<?php echo object_input_hidden_tag($degree, 'getId') ?>

<table>
<tbody>
<tr>
  <th>Name:</th>
  <td><?php echo object_input_tag($degree, 'getName', array (
  'size' => 50,
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($degree->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'degree/delete?id='.$degree->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'degree/show?id='.$degree->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'degree/list') ?>
<?php endif; ?>
</form>