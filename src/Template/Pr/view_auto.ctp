<div class="planner-from">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-sm-12">
                <div class="part-title-planner text-uppercase text-center"><b>PR 1 Verify (auto)</b></div>
                <form action="#" class="planner-relative">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p><?= date('Y-m-d', strtotime($pr->date)) ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">SO NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text"><?= $pr->so_no ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Delivery  Date <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text"><?= date('Y-m-d', strtotime($pr->del_date)) ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Description<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text text-uppercase"><?= $pr->model .' ('.$pr->version.') '?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Customer Name<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text"><?= $pr->customer ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">PR NO <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text">PR <?= $pr->id?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Create by <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text"><?php echo $pr->created_by->name; ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Department <span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text">Procurement</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Section<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Verify By<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text"><?php if($role == 'verifier'){echo $user_pic;}else{if(isset($pr->verified_by->name)){echo $pr->verified_by->name;}} ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-6">
                                <p class="planner-year">Approve By<span class="planner-fright">:</span></p>
                            </div>
                            <div class="col-sm-5 col-xs-6">
                                <p class="normal-text"><?php if($role == 'approver-1'){echo $user_pic;}else{if(isset($pr->approved_by->name)){echo $pr->approved_by->name;}} ?></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            </form>
        </div>

        <div class="clearfix"></div>
        <!--============== Add drawing table area ===================-->
        <div class="planner-table table-responsive clearfix">
            <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Part No</th>
                        <th>Description</th>
                        <th>Supplier</th>
                        <th>Price (RM)</th>
                        <th>UOM</th>
                        <th>Category</th>
                        <th>QTY Request</th>
                        <th>Stock Available</th>
                        <th>QTY Order</th>
                        <th>Sub Total</th>
                        <th>GST%</th>
                        <th>Total</th>
                        <th>Remark</th>
                    </tr>
                    </thead>
                    <tbody class="csn-text-up">
                    <?php $count=0;foreach($pr->items as $p): $count++;?>
                    <tr>
                        <td><?= $count?></td>
                        <td><?= $p->eng->partNo ?></td>
                        <td><?= $p->eng->partName ?></td>
                        <td><?php if(isset($p->supplier_name->name)) echo $p->supplier_name->name; ?></td>
                        <td><?= $p->eng->category ?></td>
                        <td></td>
                        <td><?php if($p->order_qty !== 0 && $p->sub_total !== 0){ echo $p->sub_total/$p->order_qty; }else{ echo 0; } ?></td>
                        <td><?= $p->eng->quality ?></td>
                        <td><?= $p->stock?></td>
                        <td><?= $p->order_qty?></td>
                        <td><?= $p->sub_total?></td>
                        <td><?= $p->gst?></td>
                        <td><?= $p->total?></td>
                        <td></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="col-sm-offset-8 col-sm-4 col-xs-12">
            <form action="<?php echo $this->Url->build(['controller'=>'Pr','action'=>'edit',$pr->id])?>" method="post">
                <div class="prepareted-by-csn">
                    <input type="hidden" name="status" value="<?php if($role == "verifier"){echo "verified";}elseif($role == "approver-1"){echo "approved";}?>">
                    <input type="hidden" name="<?php if($role == "verifier"){echo "verified_by";}elseif($role == "approver-1"){echo "approved_by";}?>" value="<?= $pic ?>">
                    <?php if($role != 'requester'): ?>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Reject</button>
                        <button type="submit" class="button btn btn-info"><?php if($role == "verifier"){echo "Verify";}elseif($role == "approver-1"){echo "Approve";}?></button>
                    <?php endif;?>
                </div>
            </form>
        </div>
    </div>
</div>

<!--======
  Reject popup
  ===============================-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Please Key In Remarks Here </h4>
            </div>
            <form action="<?php echo $this->Url->build(['controller'=>'Pr','action'=>'edit',$pr->id])?>" method="post">
                <div class="modal-body">
                    <textarea name="remark" id="" class="popup-textarea" cols="20" rows="8"></textarea>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="status" value="rejected">
                    <button type="submit" class="btn btn-primary">Okay</button>
                </div>
            </form>
        </div>
    </div>
</div>