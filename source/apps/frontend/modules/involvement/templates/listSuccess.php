<?php
// auto-generated by sfPropelCrud
// date: 2009/07/17 06:52:55
?>
<h1>involvement</h1>

<table>
<thead>
<tr>
  <th>Id</th>
  <th>Name</th>
</tr>
</thead>
<tbody>
<?php foreach ($involvements as $involvement): ?>
<tr>
    <td><?php echo link_to($involvement->getId(), 'involvement/show?id='.$involvement->getId()) ?></td>
      <td><?php echo $involvement->getName() ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<?php echo link_to ('create', 'involvement/create') ?>
