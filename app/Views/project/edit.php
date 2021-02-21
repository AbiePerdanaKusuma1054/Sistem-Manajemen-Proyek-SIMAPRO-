<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>

<div class="canvas-2">
    <div class="lay" style="text-align: left ;">
        <div class="add-back">
            <i class="fa fa-pencil-square-o">
                <span class="add-back-text">
                    Edit Your Project
                </span>
            </i>
        </div>
        <?php foreach ($detail as $d) : ?>
            <form class="row g-3 needs-validation" action="<?= base_url() ?>/project/saveEditProject/<?= $d['id'] ?>">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Project Name *</label>
                    <input type="text" class="form-control fc <?= ($validator->hasError('project_name')) ? 'is-invalid' : ''; ?>" name="project_name" value="<?= $d['project_name'] ?>" required>
                    <div class="invalid-feedback">
                        Please input a project name.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Project Manager *</label>
                    <input type="text" class="form-control fc <?= ($validator->hasError('project_manager')) ? 'is-invalid' : ''; ?>" name="project_manager" value="<?= $d['project_manager'] ?>" required>
                    <div class="invalid-feedback">
                        Please input a project manager.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Client *</label>
                    <div class="input-group">
                        <select class="form-select form-control fc" name="client_id">
                            <?php foreach ($client as $c) : ?>
                                <option value="<?= $c['id'] ?>" <?= $c['id'] == $d['client_id'] ? 'selected' : ''; ?>><?= $c['client_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="invalid-feedback">
                        Please input a client.
                    </div>
                </div>
                <!-- <div class="col-md-4">
                    <label for="validationCustom04" class="form-label">Contract Amount *</label>
                    <input type="number" class="form-control fc" name="" value="10000000" required>
                    <div class="invalid-feedback">
                        Please input a contract amount.
                    </div>
                </div> -->
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">Project Status</label>
                    <select class="form-select form-control fc <?= ($validator->hasError('project_status')) ? 'is-invalid' : ''; ?>" name="project_status">
                        <option value="waiting" <?= $d['project_status'] == 'waiting' ? 'selected' : ''; ?>>Waiting</option>
                        <option value="on progress" <?= $d['project_status'] == 'on progress' ? 'selected' : ''; ?>>On Progress</option>
                        <option value="hold" <?= $d['project_status'] == 'hold' ? 'selected' : ''; ?>>Hold</option>
                        <option value="finish" <?= $d['project_status'] == 'finish' ? 'selected' : ''; ?>>Finished</option>
                        <option value="cancelled" <?= $d['project_status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">Project Start *</label>
                    <input type="date" class="form-control fc" name="project_start <?= ($validator->hasError('project_start')) ? 'is-invalid' : ''; ?>" value="<?= $d['project_start'] ?>" required>
                    <div class="invalid-feedback">
                        Please input a date start project.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationCustom06" class="form-label">Project Deadline *</label>
                    <input type="date" class="form-control fc" name="project_finish <?= ($validator->hasError('project_finish')) ? 'is-invalid' : ''; ?>" value="<?= $d['project_finish'] ?>" required>
                    <div class="invalid-feedback">
                        Please input a deadline.
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Project Description</label>
                    <textarea class="form-control fc" id="exampleFormControlTextarea1" rows="4" name="project_desc" placeholder="Describe the project..."><?= $d['project_desc'] ?></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-light plus" type="submit">Save</button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>

<?= $this->endSection(); ?>