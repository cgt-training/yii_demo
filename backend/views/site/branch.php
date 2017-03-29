<?php 
use yii\helpers\Html;
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Users</h4>
                        <p class="category">List of All Users</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>UID</th>
                            	<th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Updated</th>
								<th>Updated</th>
                            </thead>
                            <tbody>
                              <?php foreach ($modelSearch->search([])->getModels() as $key => $value) {?>
                                    <tr>
                                        <td><?=$value->branch_id?></td>
                                        <td class="text-primary"><?=HTML::decode($value->branch_name)?></td>
                                        <td><?=HTML::decode($value->company->company_name)?></td>
                                        <td><?=HTML::decode($value->branch_address)?></td>
                                        <td><?=HTML::decode($value->branch_create_date)?></td>
                                        <td><?=HTML::decode($value->branch_status)?></td>
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
