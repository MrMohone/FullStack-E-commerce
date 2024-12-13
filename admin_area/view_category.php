
<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-light">
            <th>Slno</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat = "SELECT * FROM `categories`";
        $result=mysqli_query($con, $select_cat);
        $number = 0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
        
        ?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id; ?>' class='text-light'><img src="./product_images/adminlogin.jpg" alt="" class="temp_img"></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id; ?>' type="button" class="text-light" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="./product_images/biryani1.jpg" alt="" class="temp_img"></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want delete this? </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="./index.php?view_category" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_category=<?php echo $category_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>