<?php use yii\helpers\Html;?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Companies</h4>
                        <p class="category">List of All Companies</p>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <th>UID</th>
                            	<th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                            	<th>DO Creation</th>
								<th>DO Registration</th>
                            </thead>
                            <tbody>
                            <?php foreach ($model->find()->all() as $key => $value) { ?>
                                    <tr>
                                        <td><?=$value->company_id?></td>
                                        <td class="text-primary"><?=HTML::decode($value->company_name)?></td>
                                        <td><?=HTML::decode($value->company_email)?></td>
                                        <td><?=HTML::decode($value->company_status)?></td>
                                        <td><?=HTML::decode($value->company_create_date)?></td>
                                        <td><?=HTML::decode($value->registration_date)?></td>
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
