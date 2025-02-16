<?php $__env->startSection('title', 'Realizar Pedido'); ?>

<?php $__env->startSection('content'); ?>

<?php if(count($products)): ?>
<h2>Pedido para la empresa</h2>
<form action="/orders/save" method="post">
  <input type="hidden" name="company_id" value="<?php echo e($companyId); ?>">
  <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
          </tr>
      </thead>
      <tbody>
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>    
                  <td><?php echo e($product->getId()); ?></td>
                  <td><a href="/products/details/<?php echo e($product->getId()); ?>"><?php echo e($product->getName()); ?></a></td>
                  <td><?php echo e($product->getPrice() . '€'); ?></td>
                  <td>
                      <input type="number" name="products[<?php echo e($product->getId()); ?>]" step="1" placeholder="0">
                  </td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
  </table>
  <input type="submit" class="success" value="Hacer pedido">
  <input type="reset" class="success">
</form>


<?php else: ?>
<h2>No hay productos para esta empresa</h2>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>