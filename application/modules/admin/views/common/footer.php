<script src="<?= root; ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= root; ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?= root; ?>assets/admin/dist/js/adminlte.min.js"></script>
<script src="<?= root; ?>assets/admin/dist/js/demo.js"></script>
<script>
    function isNumberPress(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>