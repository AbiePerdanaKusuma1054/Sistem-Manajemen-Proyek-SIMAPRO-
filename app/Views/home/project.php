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
        </ul>
    </div>
</div>
<div class="canvas-2">
    <div class="lay">
        <!-- Button Modal Add -->
        <div class="d-grid gap-2 col-6 mx-auto add">
            <button class="btn btn-outline-light add" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Add Project
            </button>
        </div>
        <!-- End -->

        <table id="table" class="table table-striped table-dark " style="cursor: default;">
            <thead class="attr">
                <tr>
                    <th>Project</th>
                    <th>Client</th>
                    <th>Project Manager</th>
                    <th>Start Date</th>
                    <th>Project Status</th>
                    <th>Deadline</th>
                    <th>Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Website Design</td>
                    <td>Dacoda</td>
                    <td>Alexander</td>
                    <td>01/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-primary">Hold</span>
                    </td>
                    <td>01/03/2021</td>
                    <td><img src="/img/pending.png" alt="" class="pin">
                        <span class="pins">PENDING</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Shopii</td>
                    <td>LIPI</td>
                    <td>Bambang</td>
                    <td>08/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-info">On Progress</span>
                    </td>
                    <td>30/02/2021</td>
                    <td><img src="/img/pending.png" alt="" class="pin">
                        <span class="pins">PENDING</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>E-Ticket</td>
                    <td>Bioskop XXI</td>
                    <td>Frans Simanjuntak</td>
                    <td>08/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-secondary">Waiting</span>
                    </td>
                    <td>-</td>
                    <td><img src="/img/notyet.png" alt="" class="pin">
                        <span class="pins">NOT YET</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>App Mobile</td>
                    <td>Dicoding</td>
                    <td>Felix</td>
                    <td>01/09/2020</td>
                    <td>
                        <span class="badge rounded-pill bg-success">Finish</span>
                    </td>
                    <td>01/10/2020</td>
                    <td><img src="/img/complete.png" alt="" class="pin">
                        <span class="pins">COMPLETE</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Video Profile</td>
                    <td>UNILA</td>
                    <td>Hastria</td>
                    <td>01/12/2020</td>
                    <td>
                        <span class="badge rounded-pill bg-light text-dark">Cancel</span>
                    </td>
                    <td>31/12/2020</td>
                    <td><img src="/img/notyet.png" alt="" class="pin">
                        <span class="pins">NOT YET</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Website Design</td>
                    <td>Dacoda</td>
                    <td>Alexander</td>
                    <td>01/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-primary">Hold</span>
                    </td>
                    <td>01/03/2021</td>
                    <td><img src="/img/pending.png" alt="" class="pin">
                        <span class="pins">PENDING</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Shopii</td>
                    <td>LIPI</td>
                    <td>Bambang</td>
                    <td>08/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-info">On Progress</span>
                    </td>
                    <td>30/02/2021</td>
                    <td><img src="/img/pending.png" alt="" class="pin">
                        <span class="pins">PENDING</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>E-Ticket</td>
                    <td>Bioskop XXI</td>
                    <td>Frans Simanjuntak</td>
                    <td>08/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-secondary">Waiting</span>
                    </td>
                    <td>-</td>
                    <td><img src="/img/notyet.png" alt="" class="pin">
                        <span class="pins">NOT YET</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>App Mobile</td>
                    <td>Dicoding</td>
                    <td>Felix</td>
                    <td>01/09/2020</td>
                    <td>
                        <span class="badge rounded-pill bg-success">Finish</span>
                    </td>
                    <td>01/10/2020</td>
                    <td><img src="/img/complete.png" alt="" class="pin">
                        <span class="pins">COMPLETE</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Video Profile</td>
                    <td>UNILA</td>
                    <td>Hastria</td>
                    <td>01/12/2020</td>
                    <td>
                        <span class="badge rounded-pill bg-light text-dark">Cancel</span>
                    </td>
                    <td>31/12/2020</td>
                    <td><img src="/img/notyet.png" alt="" class="pin">
                        <span class="pins">NOT YET</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Website Design</td>
                    <td>Dacoda</td>
                    <td>Alexander</td>
                    <td>01/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-primary">Hold</span>
                    </td>
                    <td>01/03/2021</td>
                    <td><img src="/img/pending.png" alt="" class="pin">
                        <span class="pins">PENDING</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Shopii</td>
                    <td>LIPI</td>
                    <td>Bambang</td>
                    <td>08/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-info">On Progress</span>
                    </td>
                    <td>30/02/2021</td>
                    <td><img src="/img/pending.png" alt="" class="pin">
                        <span class="pins">PENDING</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>E-Ticket</td>
                    <td>Bioskop XXI</td>
                    <td>Frans Simanjuntak</td>
                    <td>08/02/2021</td>
                    <td>
                        <span class="badge rounded-pill bg-secondary">Waiting</span>
                    </td>
                    <td>-</td>
                    <td><img src="/img/notyet.png" alt="" class="pin">
                        <span class="pins">NOT YET</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>App Mobile</td>
                    <td>Dicoding</td>
                    <td>Felix</td>
                    <td>01/09/2020</td>
                    <td>
                        <span class="badge rounded-pill bg-success">Finish</span>
                    </td>
                    <td>01/10/2020</td>
                    <td><img src="/img/complete.png" alt="" class="pin">
                        <span class="pins">COMPLETE</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>Video Profile</td>
                    <td>UNILA</td>
                    <td>Hastria</td>
                    <td>01/12/2020</td>
                    <td>
                        <span class="badge rounded-pill bg-light text-dark">Cancel</span>
                    </td>
                    <td>31/12/2020</td>
                    <td><img src="/img/notyet.png" alt="" class="pin">
                        <span class="pins">NOT YET</span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-info">
                            Detail
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="space">
        <p class="dot">.</p>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
<?= $this->endSection(); ?>