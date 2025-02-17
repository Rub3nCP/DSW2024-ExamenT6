<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('content'); ?>


<!-- Lista de pedidos -->

  <?php if( count($orders) ): ?>
  <h2>Listado de pedidos</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Fecha</th>
        <th>Empresa</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>    
        <td><?php echo e($order->getId()); ?></td>
        <td><?php echo e($order->getOrder_date()); ?></td>
        <td><?php echo e($order->getCompanyId()); ?></td>
        <!-- Enlace para ver los detalles de este pedido -->
        <td><a href="/orders/details/<?php echo e($order->getId()); ?>">Detalles</a></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>No hay compañias</h2>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>