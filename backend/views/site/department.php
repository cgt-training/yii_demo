<?php 
use yii\helpers\Html;
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><?=$this->title?></h4>
                        <p class="category">List of All <?=$this->title?></p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>DeptID</th>
                                <th>Name</th>
                                <th>Comapny</th>
                                <th>Branch</th>
                                <th>Status</th>
                                <th>Created</th>
                            </thead>
                            <tbody>
                              <?php foreach ($model->search([])->getModels() as $key => $value) {?>
                                    <tr>
                                        <td><?=$value->dept_id?></td>
                                        <td class="text-primary"><?=HTML::decode($value->dept_name)?></td>
                                        <td><?=HTML::decode($value->company->company_name)?></td>
                                        <td><?=HTML::decode($value->branch->branch_name)?></td>
                                        <td><?=HTML::decode($value->dept_status)?></td>
                                        <td><?=HTML::decode($value->dept_create_date)?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>