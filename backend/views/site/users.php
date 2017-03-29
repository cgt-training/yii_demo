<?php use yii\helpers\Html;?>

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
                            	<th>Created</th>
								<th>Updated</th>
                            </thead>
                            <tbody>
                                <?php foreach ($model->find()->all() as $key => $value) { ?>
                                    <tr>
                                        <td><?=$value->id?></td>
                                        <td class="text-primary"><?=HTML::decode($value->username)?></td>
                                        <td><?=HTML::decode($value->email)?></td>
                                        <td><?=HTML::decode($value->status)?></td>
                                        <td><?=date("h:i A d-m-Y",$value->created_at);?></td>
                                        <td><?=date("h:i A d-m-Y",$value->updated_at);?></td>
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
