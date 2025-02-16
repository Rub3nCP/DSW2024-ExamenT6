<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('content'); ?>


<!-- listado de productos -->

  <div class="box">
    <h3><?php echo e($productInfo->getId()); ?> - <?php echo e($productInfo->getName()); ?></h3>
    <?php echo e($productInfo->getDescription()); ?>

    <h4><?php echo e($productInfo->getPrice()); ?></h4>
    <h4>Empresa:<?php echo e($productInfo->getCompanyId()); ?></h4>

  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>