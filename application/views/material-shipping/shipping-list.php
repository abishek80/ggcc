<section class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex flex-wrap gap-2 gap-md-3 mb-3">
            <a href="<?php echo base_url(); ?>stock/material-shipping-list" class="<?php echo ($activeLink == '') ? 'bg-primary text-white' : 'bg-white text-primary'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-primary border border-3 border-end-0 border-start-0 border-top-0">All</a>
            <a href="<?php echo base_url(); ?>stock/material-shipping-list/notreceived" class="<?php echo ($activeLink == 'notreceived') ? 'bg-danger text-white' : 'bg-white text-danger'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-danger border border-3 border-end-0 border-start-0 border-top-0">Not Received</a>
            <a href="<?php echo base_url(); ?>stock/material-shipping-list/received" class="<?php echo ($activeLink == 'received') ? 'bg-success text-white' : 'bg-white text-success'; ?> px-4 py-2 px-md-5 shadow shadow-sm fw-bold lh-1 rounded-2 border-success border border-3 border-end-0 border-start-0 border-top-0">Received</a>
        </div>
        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center border-bottom mb-3 pb-3 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-black">Material Shipping List</h4>
                <a href="<?php echo base_url(); ?>stock/material-shipping-add" class="btn btn-primary px-4 py-2 rounded text-white">Add Material Shipping</a>
            </div>
            <div class="table-responsive">
                <table class="zero_config table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="w-min-40">S. No</th>
                            <th>Shipping Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Material Name <br> Shipping Type</th>
                            <th>Sender Name <br> Number</th>
                            <th>Received Name <br> Number</th>
                            <th>Status <br> Received Date</th>
                            <th class="w-min-50">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            foreach ($materialShippingList as $row) { 
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->shipping_dateFormat; ?></td>
                            <td><?php echo $row->from_location; ?></td>
                            <td><?php echo $row->to_location; ?></td>
                            <td>
                                <p class="mb-1"><?php echo $row->material_name; ?></p>
                                <p class="mb-0"><?php echo $row->shipping_type; ?></p>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->sender_name; ?></p>
                                <a href="tel:<?php echo $row->sender_number; ?>" class="a-hover"><?php echo $row->sender_number; ?></a>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->receiver_name; ?></p>
                                <a href="tel:<?php echo $row->receiver_number; ?>" class="a-hover"><?php echo $row->receiver_number; ?></a>
                            </td>
                            <td>
                                <p class="mb-1"><?php echo $row->status == 'received' ? '<span class="text-success">Received</span>' : '<span class="text-danger">Not Received</span>'; ?></p>
                                <p class="mb-0"><?php echo $row->received_dateFormat; ?></p>
                            </td>
                            <td class="px-2">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="javascript:void(0);" class="box-hover getMaterialShippingId" data-shippingid="<?php echo $row->id; ?>" data-bs-toggle="modal" data-bs-target="#view_modal" data-toggle="tooltip" data-placement="top" title="View"> <i class="bx bx-show-alt"></i> </a>
                                    <a href="<?php echo base_url() . 'stock/material-shipping-edit/' . $row->id; ?>" class="box-hover" data-toggle="tooltip" data-placement="top" title="Edit"> <i class="bx bx-edit-alt"></i> </a>
                                    <a href="javascript:void(0);" data-rowid="<?php echo $row->id; ?>" data-tablename="material_shipping" data-link="<?php echo base_url(); ?>stock/material-shipping-list/notreceived" class="box-hover trashItem" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="bx bx-trash"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="view_modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-3 border-bottom pb-3">
                    <div class="float-end">
                        <a href="javascript:void(0);" class="w-px-30 h-px-30 bg-label-dark rounded-circle d-flex align-items-center justify-content-center" data-bs-dismiss="modal">
                            <i class="bx bx-x text-black"></i>
                        </a>
                    </div>
                    <div id="headingTitle"></div>
                </div>
                <div class="row g-3">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Shipping Date</label>
                        <div id="shippingDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">From Location</label>
                        <div id="fromLocation" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">To Location</label>
                        <div id="toLocation" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Material Name</label>
                        <div id="materialName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 shippingType d-none">
                        <label class="w-100 fw-bold text-black mb-1">Shipping Type</label>
                        <div id="shippingType" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 status d-none">
                        <label class="w-100 fw-bold text-black mb-1">Status</label>
                        <div id="status" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 senderName d-none">
                        <label class="w-100 fw-bold text-black mb-1">Sender Name</label>
                        <div id="senderName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 senderNumber d-none">
                        <label class="w-100 fw-bold text-black mb-1">Sender Number</label>
                        <div id="senderNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 receiverName d-none">
                        <label class="w-100 fw-bold text-black mb-1">Receiver Name</label>
                        <div id="receiverName" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 receiverNumber d-none">
                        <label class="w-100 fw-bold text-black mb-1">Receiver Number</label>
                        <div id="receiverNumber" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 receivedDate d-none">
                        <label class="w-100 fw-bold text-black mb-1">Received Date</label>
                        <div id="receivedDate" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 lrCopy d-none">
                        <label class="w-100 fw-bold text-black mb-1">LR Copy</label>
                        <div id="lrCopy" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 billCopy d-none">
                        <label class="w-100 fw-bold text-black mb-1">Bill Copy</label>
                        <div id="billCopy" class="text-capitalize text-black"></div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <label class="w-100 fw-bold text-black mb-1">Created By <span class="mx-2">/</span> Created At</label>
                        <div class="d-flex gap-2">
                        <div id="createdBy" class="text-capitalize text-black"></div>
                        /
                        <div id="createdAt" class="text-capitalize text-black"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="materialShippingReceived"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".getMaterialShippingId", function(e){
        var shippingId = $(this).data("shippingid");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRFToken": csrftoken
            },
            url: '<?php echo base_url(); ?>stock/getMaterialShippingDetail',
            dataType: "json",
            data: {shippingId},
            success: function (data) {
                $('#headingTitle').html('<h5 class="mb-0 text-black text-center lh-base fw-bold text-capitalize">' + data.shippingDate + ' / ' + data.materialName + ' - Shipping Details</h5>');
                $('#shippingDate').html(data.shippingDate);
                $('#fromLocation').html(data.fromLocation);
                $('#toLocation').html(data.toLocation);
                $('#materialName').html(data.materialName);
                $('#status').html(data.status);
                
                if (data.senderName) {
                    $('#senderName').html(data.senderName);
                    $('.senderName').removeClass('d-none');
                } else {
                    $('.senderName').addClass('d-none');
                }
                if (data.senderNumber) {
                    $('#senderNumber').html('<a href="tel:' + data.senderNumber + '" target="_blank" class="a-hover">'+ data.senderNumber +'</a>');
                    $('.senderNumber').removeClass('d-none');
                } else {
                    $('.senderNumber').addClass('d-none');
                }
                if (data.receiverName) {
                    $('#receiverName').html(data.receiverName);
                    $('.receiverName').removeClass('d-none');
                } else {
                    $('.receiverName').addClass('d-none');
                }
                if (data.receiverNumber) {
                    $('#receiverNumber').html('<a href="tel:' + data.receiverNumber + '" target="_blank" class="a-hover">'+ data.receiverNumber +'</a>');
                    $('.receiverNumber').removeClass('d-none');
                } else {
                    $('.receiverNumber').addClass('d-none');
                }
                if (data.billCopy) {
                    $('#billCopy').html('<a href="' + '<?php echo base_url(); ?>' + data.billCopy + '" target="_blank" class="doc-hover">View Bill Copy</a>');
                    $('.billCopy').removeClass('d-none');
                } else {
                    $('.billCopy').addClass('d-none');
                }
                if (data.paymentType) {
                    $('#paymentType').html(data.paymentType);
                    $('.paymentType').removeClass('d-none');
                } else {
                    $('.paymentType').addClass('d-none');
                }
                if (data.shippingType) {
                    $('#shippingType').html(data.shippingType);
                    $('.shippingType').removeClass('d-none');
                } else {
                    $('.shippingType').addClass('d-none');
                }
                if (data.lrCopy) {
                    $('#lrCopy').html('<a href="' + '<?php echo base_url(); ?>' + data.lrCopy + '" target="_blank" class="doc-hover">View LR Copy</a>');
                    $('.lrCopy').removeClass('d-none');
                } else {
                    $('.lrCopy').addClass('d-none');
                }
                if (data.receivedDate) {
                    $('#receivedDate').html(data.receivedDate);
                    $('.receivedDate').removeClass('d-none');
                } else {
                    $('.receivedDate').addClass('d-none');
                }
                $('#createdBy').html(data.createdBy);
                $('#createdAt').html(data.createdAt);
                if (data.status == 'notreceived') {
                    $('#materialShippingReceived').html(`
                        <div class="d-flex gap-3 justify-content-between h-100 align-items-center border-top pt-3 mt-1">
                            <input id="received_date" name="received_date" type="date" placeholder="YYYY - MM - DD" class="form-control date-picker w-min-300">
                            <div class="d-flex gap-3 justify-content-between h-100 align-items-center">
                                <a href="<?php echo base_url(); ?>stock/material-shipping-list/notreceived" class="btn btn-danger px-4 py-2 rounded border-0 fw-bold text-white">Cancel</a>
                                <button type="submit" data-shippingid="` + data.shippingId + `" class="btn btn-success px-4 py-2 rounded border-0 fw-bold text-white materialShipping">Material Received</button>
                            </div>
                        </div>
                    `);
                    $('#materialShippingReceived').removeClass('d-none');
                } else {
                    $('#materialShippingReceived').addClass('d-none');
                }
            }
        });
        e.preventDefault();
        return false;
    });

    $(document).on('click', '.materialShipping', function(e) {
        if($('#received_date').val() == '') {
            alert('Select Received Date');
        } else {
            var shippingId = $(this).data("shippingid");
            var receivedDate = $('#received_date').val();
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRFToken": csrftoken
                },
                url: '<?php echo base_url(); ?>stock/materialReceivedFormSave',
                dataType: "json",
                data: {
                    shippingId,
                    receivedDate
                },
                beforeSend: function () {
                    $(".loader").show();
                },
                success: function(data) {
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        'newestOnTop': false,
                        'progressBar': false,
                        'positionClass': 'toast-top-right',
                        'preventDuplicates': false,
                        'showDuration': '1000',
                        'hideDuration': '1000',
                        'timeOut': '5000',
                        'extendedTimeOut': '1000',
                        'showEasing': 'swing',
                        'hideEasing': 'linear',
                        'showMethod': 'fadeIn',
                        'hideMethod': 'fadeOut',
                    }
                    $(".loader").hide();
                    if (data['isError']) {
                        toastr.error(data['message']);
                    } else {
                        oneClickSubmitBtn();
                        toastr.success(data['message']);
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url(); ?>stock/material-shipping-list/received";
                        }, 1500);
                    }
                }
            });
        }
    });
</script>