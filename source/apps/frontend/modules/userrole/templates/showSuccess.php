<?php include_component('home','leftmenu'); ?>
<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:15:43
?>
<table>
<tbody>
<tr>
<th>Id: </th>
<td><?php echo $userrole->getId() ?></td>
</tr>
<tr>
<th>User: </th>
<td><?php echo $userrole->getUserId() ?></td>
</tr>
<tr>
<th>Role: </th>
<td><?php echo $userrole->getRoleId() ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo link_to('edit', 'userrole/edit?id='.$userrole->getId()) ?>
&nbsp;<?php echo link_to('list', 'userrole/list') ?>