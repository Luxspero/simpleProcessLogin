<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Web By Brilliant <?=date("Y")?></div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets') ?>/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets') ?>/assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets') ?>/assets/demo/chart-bar-demo.js"></script>
<script src="<?= base_url('assets') ?>/js/js-product.js"></script>


<!-- UNTUK TABLE -->
<script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets') ?>/js/demo/datatables-demo.js"></script>

<!-- excel -->
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function(){
        $("#btnExport").click(function() {
            let table = document.getElementsByTagName("table");
            TableToExcel.convert(table[0], { // html code may contain multiple tables so here we are refering to 1st table tag
            name: `kependudukan.xlsx`, // fileName you could use any name
            sheet: {
                name: 'penduduk' // sheetName
            }
            });
        });
    });
</script>

</body>

</html>