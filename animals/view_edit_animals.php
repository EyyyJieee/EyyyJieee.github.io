<div class="modal fade" id="edit_animals<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Creature</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="animals/edit_animals.php?id=<?php echo $row['id']; ?>" method="post">
        <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" >
              <label for="floatingInput">Name</label>
            </div>
            <!-- <div class="form-floating mb-3">
              <input type="number" class="form-control" id="type_id" name="type_id" value="<?php echo $row['type_id']; ?>">
              <label for="floatingInput">Type of Id</label>
            </div> -->
            <div class="form-floating mb-3">
              <select class="form-control" id="type_id" name="type_id">
                <option value="0" selected>Type</option>
                  <?php
                    // include_once('include/database.php');

                    // $database = new Connection();
                    // $db = $database->open();
                    $new_db = $database->open();
                    try{	
                      // $sql = 'SELECT * FROM animals ORDER BY name ASC';
                      foreach ($new_db->query('select * from type order by type_name') as $row2) {
                        echo "<option value=\"{$row2['id']}\">{$row2['type_name']}</option>";
                      }
                    }catch(PDOException $e){
                      echo "There is some problem in connection: " . $e->getMessage();
                    }
                    $database->close();

                  ?>
              </select>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="color" name="color" value="<?php echo $row['color']; ?>" >
              <label for="floatingInput">Color</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="number_of_legs" name="number_of_legs" value="<?php echo $row['number_of_legs']; ?>">
              <label for="floatingInput">Number of legs</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" id="remarks" rows="3" name="remarks"></textarea>
              <label for="remarks" class="form-label">Remarks</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="edit" class="btn btn-secondary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>