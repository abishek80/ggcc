<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card p-4 mt-1">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 text-center">
                    <h6 class="mb-3 text-capitalize">Name</h6>
                    <h5 class="mb-0 text-capitalize"><?php echo $username; ?></h5>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <h6 class="mb-3 text-capitalize">Login Code</h6>
                    <h5 class="mb-0 text-capitalize"><?php echo $loginCode; ?></h5>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <h6 class="mb-3 text-capitalize">Mobile Number</h6>
                    <h5 class="mb-0 text-capitalize"><?php echo $mobile; ?></h5>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <h6 class="mb-3 text-capitalize">Permission</h6>
                    <div>
                        <?php 
                            $permissionsArray = json_decode($permissions, true); // Convert JSON string to PHP array
                            if (is_array($permissionsArray)) {
                                foreach ($permissionsArray as $permission) {
                                    // Replace underscores with spaces and capitalize words
                                    echo '<h5 class="mb-2 text-capitalize">'
                                        . ucfirst(str_replace('_', ' ', $permission))
                                        . '</h5>';
                                }
                            } else {
                                echo '<h5 class="mb-0">No permissions available.</h5>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>