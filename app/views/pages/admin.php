<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('post_message'); ?>
    <div class="row mb-3">
        <div class="col-md-6">
        <h2>Admin Panel</h2>
        </div>
        <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/services/add" class="btn gbutton pull-right">
                <i class="fa fa-plus-square"></i> Add Services
            </a>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>