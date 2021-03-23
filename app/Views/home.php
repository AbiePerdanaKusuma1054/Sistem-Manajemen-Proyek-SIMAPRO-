<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="status">
        <div class="back-text">
            <p class="text">Project Status</p>
        </div>
    </div>
    <div class="backg">
        <a href="#" class="card waiting">
            <div class="overlay"></div>
            <div class="circle">
                <p class="quantity"><?= $waiting ?></p>
            </div>
            <p>Waiting</p>
        </a>
        <a href="#" class="card on-progress">
            <div class="overlay"></div>
            <div class="circle">
                <p class="quantity"><?= $on_progress ?></p>
            </div>
            <p>On Progress</p>
        </a>

        <a href="#" class="card hold">
            <div class="overlay"></div>
            <div class="circle">
                <p class="quantity"><?= $hold ?></p>
            </div>
            <p>Hold</p>
        </a>

        <a href="#" class="card finish">
            <div class="overlay"></div>
            <div class="circle">
                <p class="quantity"><?= $finish ?></p>
            </div>
            <p>Finished</p>
        </a>

        <a href="#" class="card cancel">
            <div class="overlay"></div>
            <div class="circle">
                <p class="quantity"><?= $cancelled ?></p>
            </div>
            <p>Cancelled</p>
        </a>
    </div>
</div>
</div>
<script>
    //When logged in:

    <?php if (session()->getFlashdata('message')) { ?>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 2000,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Signed in'
        })
    <?php } ?>
</script>
<?= $this->endSection(); ?>