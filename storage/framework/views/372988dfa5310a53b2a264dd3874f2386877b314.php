
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><b>List of subjects</b></h5><br>
        <blockquote class="card-text">You can find here all the informations about subjects in the system.
        You can also create a subject <a href="<?php echo e(url('/subjectCreate/')); ?>"><b> here.</b></a></blockquote>

        <table class="table table-responsive">
            <thead class="thead-light">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Day</th>
                <th scope="col">Time</th>
                <th scope="col">Description</th>
                <th scope="col">Units</th>
                <th scope="col">Room</th>
                <th scope="col">Yr & Sec</th>
                <th scope="col">Professor ID</th>
                <th scope="col">Action</th>
                
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($subject->Subj_title); ?></td>
                    <td><?php echo e($subject->Subj_day); ?></td>
                    <td><?php echo e($subject->Subj_time); ?></td>
                    <td><?php echo e($subject->Subj_desc); ?></td>
                    <td><?php echo e($subject->Subj_units); ?></td>
                    <td><?php echo e($subject->Subj_room); ?></td>
                    <td><?php echo e($subject->Subj_yr_sec); ?></td>
                    <td><?php echo e($subject->Prof_ID); ?></td>
                    <td>

                        <a href="<?php echo e(url('/subjectEdit/'.$subject->id)); ?>" class="btn btn-sm btn-warning">Edit</a>

                    </td>


                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>






<?php /**PATH C:\xampp\htdocs\pm\trial_error1\resources\views/subjectslist.blade.php ENDPATH**/ ?>