
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of Professors</b></h5>
        <br>
        <blockquote class="card-text">You can find here all the informations about professors in the system.
        You can also create a professor <a href="<?php echo e(url('/professorCreate/')); ?>"><b> here.</b></a>
        </blockquote>

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Professor ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Subject(s)</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $professors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($professor->id); ?></td>
                    <td><?php echo e($professor->Prof_fname); ?></td>
                    <td><?php echo e($professor->Prof_lname); ?></td>
                    <td><?php echo e($professor->Prof_mname); ?></td>
                    <td><?php echo e($professor->Subj_ID); ?></td>
                    <td>

                        <a href="<?php echo e(url('/professorEdit/'.$professor->id)); ?>" class="btn btn-sm btn-warning">Edit</a>

                    </td>


                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>






<?php /**PATH C:\xampp\htdocs\project-management\pm\trial_error1\resources\views/professorslist.blade.php ENDPATH**/ ?>