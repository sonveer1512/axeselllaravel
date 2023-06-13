<div class="card">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-sm-4"> </div>
            <div class="col-sm-auto ms-auto">
                <div class="list-grid-nav gap-1">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editmodal" onclick='showadddiv("<?= $type ?>","")'><i class="ri-add-fill me-1 align-bottom"></i> Add Category</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">

        <div id="customerList">
            <div class="row g-4 mb-3">
                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end">
                        <div class="search-box ms-2">
                            <input type="text" class="form-control search" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive table-card mt-3 mb-1">
                <?php if (!empty($items)) { ?>
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light">
                            <tr>
                                <th class="sort">S. No.</th>
                                <th class="sort" data-sort="customer_name">Title</th>
                                <th class="sort" data-sort="customer_name">Offer By</th>
                                <th class="sort" data-sort="email">Offer On</th>
                                <th class="sort" data-sort="email">Percetage</th>
                                <th class="sort" data-sort="email">Left Validity</th>
                                <?php if ($this->auth->checkaccess('5', 'write_permission')) { ?>
                                    <th class="sort" data-sort="action">Action</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            <?php $i = 0;
                            foreach ($items as $value) {
                                $i++; ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td class="customer_name"> <?= isset($value['offer_name']) ? $value['offer_name'] : ''; ?> </td>
                                    <td class="email"><?= isset($value['offer_by_name']) ? $value['offer_by_name'] : ''; ?></td>
                                    <td class="email"><?= isset($value['offer_on']) ? $value['offer_on'] : ''; ?></td>
                                    <td class="email"><?= isset($value['per_dis_amt']) ? $value['per_dis_amt'] : ''; ?>%</td>
                                    <td>
                                        <?php
                                        date_default_timezone_set('Asia/Kolkata');
                                        $cur_date = strtotime(date('Y-m-d'));

                                        if ($cur_date < strtotime($value['start_date'])) {
                                            echo "Not Started Yet";
                                        } else if ($cur_date > strtotime($value['start_date']) && $cur_date <= strtotime($value['end_date'])) {
                                            $date1 = new DateTime(date('Y-m-d'));
                                            $date2 = new DateTime($value['end_date']);
                                            echo  $days  = $date2->diff($date1)->format('%a') . ' Days';
                                        } else {
                                            echo '<span class="text-danger"><i class="ri-close-circle-line fs-17 align-middle"></i>Expired</span>';
                                        }
                                        ?>
                                    </td>

                                    <?php if ($this->auth->checkaccess('5', 'write_permission')) { ?>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <button class="btn btn-sm btn-info edit-item-btn" data-bs-toggle="modal" data-bs-target="#editmodal" onclick="showadddiv('<?= $type ?>',<?= $value['id'] ?>)"><i class="ri-edit-box-line"></i></button>
                                                </div>

                                                <?php if ($value['flag'] == 1) { ?>
                                                    <button class="btn btn-sm btn-success" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup(<?= $value['id'] ?>,'offers','activate')"><i class="ri-checkbox-circle-line"></i></button>
                                                <?php } else { ?>
                                                    <button class="btn btn-sm btn-danger" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup(<?= $value['id'] ?>,'offers','deactivate')"><i class="ri-alert-line"></i></button>
                                                <?php } ?>

                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-target="#deletepopup" data-bs-toggle="modal" onclick="deletepopup(<?= $value['id'] ?>,'offers','delete')"><i class="ri-delete-bin-line"></i></button>
                                            </div>

                                        </td>
                                    <?php } ?>    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>

                <?php } else { ?>
                    <div class="noresult">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>


<script>
    function showadddiv(category, str) {
        $("#getheading").html(category);

        $.ajax({
            url: "<?= base_url('offer/addpercentdiv'); ?>",
            type: "post",
            data: {
                id: category,
                str: str
            },
            success: function(response) {
                $('#editstaffdiv').html(response);
            }
        })
    }
</script>