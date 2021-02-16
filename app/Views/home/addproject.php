<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>

<!-- Menu Bar -->
<div class="canvas">
    <div class="menu-list">
        <a href="<?= base_url() ?>/home/dashboard"><span class="menu-list-title">Dashboard</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/home/project"><span class="menu-list-title active">Project</span></a>
        <div class="line"></div>
        <a href="<?= base_url() ?>/home/user"><span class="menu-list-title">User</span></a>
    </div>
</div>
<!--  -->
<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="add-back">
            <i class="fa fa-folder-open">
                <span class="add-back-text">
                    Add Your Project
                </span>
            </i>
        </div>
        <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Project Name *</label>
                <input type="text" class="form-control fc" id="validationCustom01" value="" required>
                <div class="invalid-feedback">
                    Please input a project name.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Project Master *</label>
                <input type="text" class="form-control fc" id="validationCustom02" value="" required>
                <div class="invalid-feedback">
                    Please input a project master.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Client *</label>
                <input type="text" class="form-control fc" id="validationCustom03" value="" required>
                <div class="invalid-feedback">
                    Please input a client.
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom04" class="form-label">Contract Amount *</label>
                <input type="number" class="form-control fc" id="validationCustom04" value="" required>
                <div class="invalid-feedback">
                    Please input a contract amount.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Project Start *</label>
                <input type="date" class="form-control fc" id="validationCustom05" value="" required>
                <div class="invalid-feedback">
                    Please input a date start project.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom06" class="form-label">Project Deadline *</label>
                <input type="date" class="form-control fc" id="validationCustom06" value="" required>
                <div class="invalid-feedback">
                    Please input a deadline.
                </div>
            </div>
            <div class="col-md-8">
                <label class="form-label">Project Description</label>
                <textarea class="form-control fc" id="exampleFormControlTextarea1" rows="4" placeholder="desc project..."></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Status Project</label>
                <input disabled type="text" class="form-control fc" value="Waiting" required>
            </div>
            <div class="col-12">
                <button class="btn btn-light plus" type="submit" id="addalerts">Create</button>
            </div>
        </form>
    </div>
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>

<?= $this->endSection(); ?>