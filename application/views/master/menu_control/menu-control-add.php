<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="menuControlForm" method="post" class="card px-3 pb-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pt-3 pb-3 sticky-head flex-wrap gap-3">
                <div class="d-flex gap-2 align-items-center">
                    <a href="<?php echo base_url(); ?>master/menu_control" class="fw-bold text-black"><i class="bx bx-chevron-left fs-2 fw-bold text-black"></i></a>
                    <h4 class="fw-bold mb-0 text-black"><?php echo $formTitle; ?></h4>
                </div>
                <div class="d-flex gap-3 justify-content-end">
                    <a href="<?php echo base_url(); ?>master/menu_control" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                    <button type="submit" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white">Save</button>
                </div>
            </div>
            <input name="menu_id" id="menu_id" type="hidden" value="<?php echo $menuId; ?>">
            <div class="row g-3">
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Menu Name <span class="text-danger">*</span></label>
                    <input name="menu_name" id="menu_name" type="text" class="form-control" placeholder="Enter Menu Name" value="<?php echo htmlspecialchars($menuName); ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Menu Key <span class="text-danger">*</span></label>
                    <input name="menu_key" id="menu_key" type="text" class="form-control" placeholder="Enter Menu Key (e.g. dashboard)" value="<?php echo htmlspecialchars($menuKey); ?>" <?php echo ($menuId > 0) ? 'readonly' : ''; ?>>
                    <?php if ($menuId > 0) { ?>
                        <small class="text-muted">Menu Key cannot be modified once created.</small>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Parent Menu Group</label>
                    <select name="parent_key" id="parent_key" class="form-select">
                        <option value="">None (Top Level Menu / Header)</option>
                        <?php foreach ($parentMenus as $parent) { ?>
                            <option value="<?php echo $parent->menu_key; ?>" <?php echo ($parent->menu_key == $parentKey) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($parent->menu_name); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Display Order</label>
                    <input name="display_order" id="display_order" type="number" class="form-control" placeholder="Enter Display Order" value="<?php echo $displayOrder; ?>">
                </div>
                <div class="col-lg-4 col-md-6">
                    <label class="w-100 fw-bold text-black mb-2 fs-14px">Default Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="enabled" <?php if($status == 'enabled') { echo 'selected'; } ?>>Enabled</option>
                        <option value="disabled" <?php if($status == 'disabled') { echo 'selected'; } ?>>Disabled</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    $("#menuControlForm").validate({
        rules: {
            menu_name: {
                required: true
            },
            menu_key: {
                required: true
            }
        },
        messages: {
            menu_name: {
                required: "Please Enter Menu Name"
            },
            menu_key: {
                required: "Please Enter Menu Key"
            }
        },
        submitHandler: function (form) {
            var data = new FormData($('#menuControlForm').get(0));
            $.ajax({
                url: '<?php echo base_url(); ?>master/menuControlFormSave',
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                method: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function (data) {
                    $(".loader").hide();
                    toastr.options = {
                        'closeButton': true,
                        'progressBar': true,
                        'positionClass': 'toast-top-right',
                        'timeOut': '5000'
                    };
                    if (data['isError']) {
                        toastr.error(data['message']);
                    }
                    else {
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>master/menu_control";
                        }, 1500);
                    }
                }
            });
            return false;
        }
    });
</script>
