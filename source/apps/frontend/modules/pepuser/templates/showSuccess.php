<?php include_component('home','leftmenu'); ?>
<?php
// auto-generated by sfPropelCrud
// date: 2009/03/16 06:16:17
?>
<table>
<tbody>
<tr>
<th>Id: </th>
<td><?php echo $pepuser->getId() ?></td>
</tr>
<tr>
<th>User: </th>
<td><?php echo $pepuser->getUserId() ?></td>
</tr>
<tr>
<th>Peppage: </th>
<td><?php echo $pepuser->getPeppageId() ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo link_to('edit', 'pepuser/edit?id='.$pepuser->getId()) ?>
&nbsp;<?php echo link_to('list', 'pepuser/list') ?>