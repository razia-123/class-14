<?php

include_once './backend_inc/header.php';


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <form action="./../controllers/usercontrollers/updateuser.php" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-5 text-center">
                   <div>
                   <label for="profile_input">
                   <img src="https://api.dicebear.com/7.x/initials/svg?seed=<?= $_SESSION['auth']['fname']?>" alt="" class="w-50 rounded" id="profile_picture">
                   </label>
                   <input name="avatar" type="file" id="profile_input" class="d-none">
                   </div>
            
                </div>
                <div class="col-7">

    <div class="form-group">
    <label for=""> First Name</label>
    <input name="fname" type="text" class="form-control mb-4" value="<?= $_SESSION['auth']['fname']?>">
   
    </div>

    <div class="form-group">
    <label for=""> Last Name</label>
    <input name="lname" type="text" class="form-control mb-4"  value="<?= $_SESSION['auth']['lname']?>">


    </div>
    <div class="form-group">
    <label for=""> Email</label>
    <input name="email" type="text" class="form-control mb-4"  value="<?= $_SESSION['auth']['email']?>">
 
    </div>
    <button type="submit"class="btn btn-primary">Save Changes</button>



                </div>
              </div>

              </form>
                </div>

            <!-- End of Main Content -->
            <?php
include_once './backend_inc/footer.php';
?>

<script>
  let profileSelector = document.querySelector('#profile_input');
  let profilePicture = document.querySelector('#profile_picture');
  function imageUpload(event){
    let image_url = URL.createObjectURL(event.target.files[0]);
    profilePicture.src = image_url;
  }
  profileSelector.addEventListener('change',imageUpload)

</script>