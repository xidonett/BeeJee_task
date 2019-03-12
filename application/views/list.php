  <?php require_once '../BeeJee/application/includes/db.php'; ?>
  <tbody>

    <?php

    $db = R::findAll('tasks');

      $count = 3;

      $tasks_amount = count($db);

      $p = isset($_GET["p"]) ? (int) $_GET["p"] : 0;

      for($i = $p*$count; $i < ($p+1)*$count; $i++){

        if(isset($db[$i])){

          if (!empty($_SESSION['whoami'])) {
            echo '
            <tr>
            <td>'.$db[$i]->name.'</td>
            <td>'.$db[$i]->email.'</td>
            <td>'.$db[$i]->task.'</td>
            <td><button class="btn btn-warning"
            data-toggle="modal" data-target="#edit-modal" name="taskEdit[\'button\'] value="'.$i.'">Редактировать</button></td>
            <td>'.$db[$i]->completed.'</td>
            </tr>';

          }else{

                  echo '
                  <tr>
                  <td>'.$db[$i]->name.'</td>
                  <td>'.$db[$i]->email.'</td>
                  <td>'.$db[$i]->task.'</td>
                  <td><button class="btn btn-warning" disabled title="Вы не можете редактировать эту задачу!">Редактировать</button></td>
                  <td>'.$db[$i]->completed.'</td>
                  </tr>';
          }
      }
    }

    $len = floor($tasks_amount / $count);
    ?>
  </tbody>
</table>
</div>

<br />
<div class="row justify-content-center">
<ul class="pagination">
<?php for($i = 0; $i <= $len; $i++){ ?>
<li class="page-item"><a class="page-link" href="?p=<?php echo $i + 1 ?>"><?php echo $i + 1 ?></a></li>
<?php } ?>
</ul>
</div>
