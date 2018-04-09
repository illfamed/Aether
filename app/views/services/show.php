<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<a href="<?php echo URLROOT; ?>/services" class="btn btn-light"><i class="fa fa-arrow-left"></i> Back</a>
<br>
<h1><?php echo $data['service']->title; ?></h1>
<hr>
<p><?php echo $data['service']->body; ?></p>
<?php if(isAdmin()) : ?>
    <hr>
    <a href="<?php echo URLROOT; ?>/services/edit/<?php echo $data['service']->id; ?>" class="btn btn-dark">Edit</a>

    <form class="pull-right" action="<?php echo URLROOT; ?>/services/delete/<?php echo $data['service']->id; ?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>