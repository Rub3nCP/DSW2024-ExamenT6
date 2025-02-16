<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('content'); ?>


<!-- listado de productos -->

  <?php if( count($products) ): ?>
  <h2>Listado de productos</h2>
  <table>
    <!-- cabecera -->
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <!-- cuerpo -->
    <tbody>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>    
        <td><?php echo e($product->getId()); ?></td>
        <td><a href="/products/details/<?php echo e($product->getId()); ?>"><?php echo e($product->getName()); ?></a></td>
        <td><?php echo e($product->getPrice() . '€'); ?></td>
    <td></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>No hay compañias</h2>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>