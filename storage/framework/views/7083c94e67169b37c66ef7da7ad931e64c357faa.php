<?php $__env->startSection('main_content'); ?>

<di class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Table Booking</h2>
            <ul class="nav navbar-right panel_toolbox">
                <a href="/admin/users/create"> <button class="btn btn-primary">Tambah</button></a>
            </ul>
            <div class="clearfix"></div>
        </div>
        <form action="/admin/users" method="get">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="input-group">
                    <input type="text" value="<?php echo e(request('user')); ?>" name="user" placeholder="Masukkan Email/Nama" class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                </div>
            </div>
        </form>
        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title">Email </th>
                        <th class="column-title">User Name </th>
                        <th class="column-title">Full Name</th>
                        <th class="column-title">Address</th>
                        <th class="column-title">Phone Number</th>
                        <th class="column-title">Company Name</th>
                        <th class="column-title">Created At</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd pointer">
                            <td class="col-sm-1 a-right a-right ">
                                <a href="/admin/users/<?php echo e($user->id); ?>"><?php echo e($user->email); ?></a>
                            </td>
                            <td class="col-sm-1 a-right a-right ">
                                <a href="/admin/users/<?php echo e($user->id); ?>"><?php echo e($user->username); ?></a>
                            </td>
                            <td class="col-sm-1"><?php echo e($user->profile->full_name); ?></td>
                            <td class="col-sm-1"><?php echo e($user->profile->address); ?></td>
                            <td class="col-sm-1"><?php echo e($user->profile->phone); ?></td>
                            <td class="col-sm-1"><?php echo e($user->profile->company_name ?? '-'); ?></td>
                            <td class="col-sm-1"><?php echo e($user->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php echo e($users->links()); ?>

        </div>
    </div>
</di>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/alriefqydasmito/Project/laravel/logistic/resources/views/user/list.blade.php ENDPATH**/ ?>