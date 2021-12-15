
<div class="modal fade" id="add_animals" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Creature</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="animals/add_animals.php" method="post">
        <div class="modal-body">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
              <label for="floatingInput">Name</label>
            </div>
            <!-- <div class="form-floating mb-3">
              <input type="number" class="form-control" id="type_id" name="type_id" placeholder="Type Id">
              <label for="type_id">Type</label>
            </div> -->
            <div class="form-floating mb-3">
              <select class="form-control" id="type_id" name="type_id">
                <option value="0" selected>Type</option>
                  <?php
                    include_once('include/database.php');

                    $database = new Connection();
                    $db = $database->open();
                    try{	
                      // $sql = 'SELECT * FROM animals ORDER BY name ASC';
                      foreach ($db->query('select * from type order by type_name') as $row) {
                        echo "<option value=\"{$row['id']}\">{$row['type_name']}</option>";
                      }
                    }catch(PDOException $e){
                      echo "There is some problem in connection: " . $e->getMessage();
                    }
                    $database->close();

                  ?>
              </select>
          </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="color" name="color" placeholder="Color">
              <label for="floatingInput">Color</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="number_of_legs" name="number_of_legs" placeholder="Number of legs">
              <label for="floatingInput">Number of legs</label>
            </div>
            <div class="form-floating mb-3">
              <textarea class="form-control" id="remarks" rows="3" name="remarks"></textarea>
              <label for="remarks" class="form-label">Remarks</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="add" class="btn btn-secondary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>