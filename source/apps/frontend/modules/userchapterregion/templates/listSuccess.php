<?php include_component('home','leftmenu'); ?>
<?php
// auto-generated by sfPropelCrud
// date: 2009/02/10 08:18:50
?>
<h1>userchapterregion</h1>

<table>
<thead>
<tr>
  <th>Id</th>
  <th>User</th>
  <th>Chapterregion</th>
  <th>Other</th>
  <th>Ucrflag</th>
</tr>
</thead>
<tbody>
<?php foreach ($userchapterregions as $userchapterregion): ?>
<tr>
    <td><?php echo link_to($userchapterregion->getId(), 'userchapterregion/show?id='.$userchapterregion->getId()) ?></td>
      <td><?php echo $userchapterregion->getUserId() ?></td>
      <td><?php echo $userchapterregion->getChapterregionId() ?></td>
      <td><?php echo $userchapterregion->getOther() ?></td>
      <td><?php echo $userchapterregion->getUcrflag() ?></td>
  </tr>
<?php endforeach; ?>
</tbody>
</table>

<?php echo link_to ('create', 'userchapterregion/create') ?>
