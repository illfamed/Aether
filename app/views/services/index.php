<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-12">
            <h1>Services</h1>
        </div>
    </div>
    <div class="row">
    <?php foreach($data['services'] as $service) : ?>
            <div class="col-md-4">
                <div class="card card-body mb-3">
                    <h4 class="card-title"><?php echo $service->title; ?></h4>
                        <hr>
                    <p class="card-text"><?php echo $service->body; ?></p>
                    <a href="<?php echo URLROOT; ?>/services/show/<?php echo $service->servicesId; ?>" class="btn gbutton">More</a>
                </div>
            </div>
    <?php endforeach; ?>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>