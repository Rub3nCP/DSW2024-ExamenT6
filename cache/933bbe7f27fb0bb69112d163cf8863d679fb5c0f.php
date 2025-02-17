<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('content'); ?>


<!-- listado de productos -->
  <h1>Detalle de pedido</h1>
  <div class="box">
    <p>Id de pedido: <?php echo e($orderInfo->getId()); ?></p>
    <p>Fecha: <?php echo e($orderInfo->getOrder_date()); ?></p>
    <p>Empresa: <?php echo e($orderInfo->getCompanyId()); ?></p>

  </div>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Pedido</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Subtotal</th>

      </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $ordersDetailInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detailedOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>    
        <td><?php echo e($detailedOrder->getId()); ?></td>
        <td><?php echo e($detailedOrder->getOrderId()); ?></td>
        <td><?php echo e($detailedOrder->getProductName()); ?></td>
        <td><?php echo e($detailedOrder->getPrice() . '€'); ?></td>
        <td><?php echo e($detailedOrder->getQuantity()); ?></td>
        <td><?php echo e($detailedOrder->getSub() . '€'); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <tfoot>
        <tr>
          <td colspan="5">Total</td>
          <td><?php echo e($total . '€'); ?></td>
        </tr>
      </tfoot>
    </tbody>
  </table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>