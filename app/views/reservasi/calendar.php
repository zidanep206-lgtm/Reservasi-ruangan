<?php require '../app/views/layouts/header.php'; ?>
<?php require '../app/views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php require '../app/views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <h3>Kalender Reservasi</h3>

            <div class="row mb-3">

                <div class="col-md-4">
                    <div class="alert alert-warning">
                        Pending :
                        <?= $totalPending['total'] ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-success">
                        Disetujui :
                        <?= $totalDisetujui['total'] ?>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-danger">
                        Ditolak :
                        <?= $totalDitolak['total'] ?>
                    </div>
                </div>

            </div>

            <form method="GET" action="index.php" class="mb-3">

                <input type="hidden" name="page" value="reservasi">
                <input type="hidden" name="action" value="calendar">

                <select
                    name="ruangan_id"
                    class="form-control"
                    onchange="this.form.submit()"
                >

                    <option value="">Semua Ruangan</option>

                    <?php foreach ($ruangan as $r): ?>
                        <option
                            value="<?= $r['id'] ?>"
                            <?= isset($_GET['ruangan_id']) && $_GET['ruangan_id'] == $r['id'] ? 'selected' : '' ?>
                        >
                            <?= $r['nama_ruangan'] ?>
                        </option>
                    <?php endforeach; ?>

                </select>

            </form>

            <div id="calendar"></div>

            <script>

                document.addEventListener(
                    'DOMContentLoaded',
                    function () {

                        var calendarEl =
                            document.getElementById('calendar');

                        var calendar =
                            new FullCalendar.Calendar(
                                calendarEl,
                                {
                                    initialView: 'dayGridMonth',

                                    displayEventTime: true,

                                    headerToolbar:
                                    {
                                        left: 'prev,next today',
                                        center: 'title',
                                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                                    },

                                    events:
                                    [
                                        <?php foreach ($events as $e): ?>

                                        {
                                            title:
                                            '<?= addslashes($e['kegiatan']) ?>',

                                            start:
                                            '<?= $e['tanggal'] ?>T<?= $e['jam_mulai'] ?>',

                                            color:
                                            '<?=
                                                $e['status'] == 'disetujui'
                                                ? '#198754'
                                                : (
                                                    $e['status'] == 'pending'
                                                    ? '#ffc107'
                                                    : '#dc3545'
                                                )
                                            ?>',

                                            extendedProps:
                                            {
                                                ruangan:
                                                '<?= addslashes($e['nama_ruangan']) ?>',

                                                pemohon:
                                                '<?= addslashes($e['nama']) ?>',

                                                jam_mulai:
                                                '<?= $e['jam_mulai'] ?>',

                                                jam_selesai:
                                                '<?= $e['jam_selesai'] ?>',

                                                status:
                                                '<?= $e['status'] ?>'
                                            }
                                        },

                                        <?php endforeach; ?>
                                    ],

                                    eventClick: function (info) {

                                        alert(
                                            'Kegiatan : ' +
                                            info.event.title +

                                            '\n\nRuangan : ' +
                                            info.event.extendedProps.ruangan +

                                            '\nPemohon : ' +
                                            info.event.extendedProps.pemohon +

                                            '\nJam : ' +
                                            info.event.extendedProps.jam_mulai +
                                            ' - ' +
                                            info.event.extendedProps.jam_selesai +

                                            '\nStatus : ' +
                                            info.event.extendedProps.status
                                        );
                                    }
                                }
                            );

                        calendar.render();
                    }
                );

            </script>

        </div>

    </div>

</div>

<?php require '../app/views/layouts/footer.php'; ?>