<table class="table table-striped mt-3">
  <thead>
    <tr>
      <th scope="col" class="col-3">Nome:</th>
      <th scope="col" class="col-4">Cargo:</th>
      <th scope="col" class="col-3">Point:</th>
      <th scope="col" class="col-1"></th>
      <th scope="col" class="col-2"></th>
    </tr>
  </thead>
  <tbody>
<?php 
  if (isset($_SESSION['list'])):
    foreach ($_SESSION['list'] as $data):
?>
    <tr>
      <td><?= $data['name']; ?></td>
      <td><?= $data['cargo']; ?></td>
      <td><?= date('d/m/Y H:i:s', strtotime($data['schedules_points']));?></td>
      <td> <a href="/update?id_user=<?= $data['user_id']; ?>&id_point=<?= $data['point_id']; ?>" class="btn btn-warning btn-sm">Atualizar</a></td>
      <td> <a href="/delete?id_user=<?= $data['user_id']; ?>&id_point=<?= $data['point_id']; ?>" class="btn btn-danger btn-sm">Excluir</a> </td>
    </tr>
    
<?php 
  endforeach; 
endif; 
?>
  </tbody>
</table>