<h1>Photos List</h1>

<table class="table-bordered">
  <thead>
    <tr class="tab-pane row-fluid">
      <th>Id</th>
      <th>Category</th>
      <th>Name</th>
      <th>Location</th>
      <th>Description</th>
      <th>Token</th>
      <th>Is public</th>
      <th>Path</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($photos as $photo): ?>
    <tr class="row">
      <td><a href="<?php echo url_for('photo/edit?id='.$photo->getId()) ?>"><?php echo $photo->getId() ?></a></td>
      <td><?php echo $photo->getCategoryId() ?></td>
      <td><?php echo $photo->getName() ?></td>
      <td><?php echo $photo->getLocation() ?></td>
      <td><?php echo $photo->getDescription() ?></td>
      <td><?php echo $photo->getToken() ?></td>
      <td><?php echo $photo->getIsPublic() ?></td>
      <td><?php echo $photo->getPath() ?></td>
      <td><?php echo $photo->getCreatedAt() ?></td>
      <td><?php echo $photo->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('photo/new') ?>">New</a>
