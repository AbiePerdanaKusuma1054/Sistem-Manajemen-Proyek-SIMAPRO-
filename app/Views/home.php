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
    <div class="status">
        <div class="back-text">
            <p class="text">Payment Status</p>
        </div>
    </div>
    <div class="backg">
        <a href="#" class="card cards notyet">
            <div class="overlay overlays"></div>
            <div class="circle">
                <p class="quantity">7</p>
            </div>
            <p>Not Yet</p>
        </a>
        <a href="#" class="card cards pending">
            <div class="overlay overlays"></div>
            <div class="circle">
                <p class="quantity">10</p>
            </div>
            <p>Pending</p>
        </a>

        <a href="#" class="card cards complete">
            <div class="overlay overlays"></div>
            <div class="circle">
                <p class="quantity">76</p>
            </div>
            <p>Complete</p>
        </a>
    </div>
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>
<script>
    //When logged in:

    // const Toast = Swal.mixin({
    //     toast: true,
    //     position: 'top-end',
    //     showConfirmButton: false,
    //     timer: 1700,
    //     timerProgressBar: true,
    //     didOpen: (toast) => {
    //         toast.addEventListener('mouseenter', Swal.stopTimer)
    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
    //     }
    // })

    // Toast.fire({
    //     icon: 'success',
    //     title: 'Signed in'
    // })
</script>
<?= $this->endSection(); ?>