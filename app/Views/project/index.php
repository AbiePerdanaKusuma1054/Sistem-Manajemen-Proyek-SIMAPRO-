<?= $this->extend('temp/template'); ?>

<?= $this->section('content'); ?>
<div class="canvas-2">
    <div class="lay">
        <!-- Button Add -->
        <div class="d-grid gap-2 col-6 mx-auto add">
            <a href="<?= base_url() ?>/project/add">
                <button class="btn btn-outline-light add" type="button">
                    + Add Project
                </button>
            </a>
        </div>
        <!-- End -->

        <table id="table" class="table table-striped table-dark display nowrap text-left anim" style="cursor: default;  width: 100%;">
            <thead class="attr">
                <tr>
                    <th class="text-center">Project</th>
                    <th class="text-center">Client</th>
                    <th class="text-center">Project Manager</th>
                    <th class="text-center">Start Date</th>
                    <th class="text-center">Deadline</th>
                    <th class="text-center">Progress</th>
                    <th class="text-center">Project Status</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</div>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 1700,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    $(document).ready(function() {
        $('#table').DataTable({
            "aoColumnDefs": [{
                    targets: -5,
                    className: 'text-left'
                },
                {
                    targets: -4,
                    className: 'text-right'
                },
                {
                    targets: -3,
                    className: 'text-right'
                },
                {
                    targets: -2,
                    className: 'text-center'
                },
                {
                    targets: -1,
                    className: 'text-center'
                },
                {
                    responsivePriority: 4,
                    targets: 6
                },
                {
                    responsivePriority: 3,
                    targets: 5
                },
                {
                    responsivePriority: 2,
                    targets: 1
                },
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    "bSortable": false,
                    "aTargets": [6]
                }
            ],
            "scrollX": true,
            "order": [],
            "serverSide": true,
            "responsive": true,
            "ajax": {
                url: "/project/fetchProjectData",
                type: 'POST'
            }
        });
    });

    <?php if (session()->getFlashdata('msg') == 'success') { ?>
        Toast.fire({
            icon: 'success',
            title: 'Project created'
        })
    <?php } else if (session()->getFlashdata('msg') == 'delete') { ?>
        Swal.fire(
            'Deleted!',
            'Project has been deleted.',
            'success',
        )
    <?php } ?>
</script>
<?= $this->endSection(); ?>