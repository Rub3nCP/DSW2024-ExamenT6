<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('content'); ?>

<!-- formulario -->
<form action="/companies" method="post">
  <legend>Nueva Empresa</legend>
  <label for="name">Nombre: </label>
  <input type="text" id="name" name="name" required>
  <br>
  <label for="contact_info">Correo de Contacto:</label>
  <input type="email" id="contact_info" name="contact_info" required>
  <div>
    <button class="success">Crear Empresa</button>
  </div>
</form>

  <?php if( count($companies) ): ?>
  <h2>Listado de empresas</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo de Contacto</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>    
        <td><?php echo e($company->getId()); ?></td>
        <!-- Enlace con el nombre de la empresa que lleva a la lista de productos de esa empresa -->
        <td><a href="/products/<?php echo e($company->getId()); ?>"><?php echo e($company->getName()); ?></a></td>
        <td><?php echo e($company->getContactInfo()); ?></td>
        <td>
          
          <!-- Enlace para editar la empresa -->
          <a href="/companies/<?php echo e($company->getId()); ?>/edit"><button  class="warning">Editar</button></a>
          
          <!-- Formulario para borrar la empresa -->
          <form class="frmBtn inline" action="/companies/<?php echo e($company->getId()); ?>" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="submit" value="Borrar" class="alert">
          </form>
          
          <!-- Enlace para hacer un pedido relacionado con la empresa -->
          <a href="/orders/add/<?php echo e($company->getId()); ?>"><button  class="success">Hacer pedido</button></a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>No hay compañias</h2>
  <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>