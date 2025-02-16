<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('content'); ?>


<!-- formulario -->

<form action="/products" method="post">
  <legend>Nuevo Producto</legend>
  <label for="name">Nombre: </label>
  <input type="text" id="name" name="name" required>
  <br>
  <label for="product_description">Descripción:</label>
  <input type="text" id="product_description" name="product_description" required>

  <label for="product_price">Precio:</label>
  <input type="number" step="0.01" id="product_price" name="product_price" required>
  
  <label for="product_price">Compañia:</label>

  <select name="company_selected" id="company_selected" required>
    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($company->getId()); ?>"><?php echo e($company->getName()); ?></option>  

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </select>
  <div>
    <button class="success">Crear Producto</button>
  </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>