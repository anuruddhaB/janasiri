
<form action="">
    <div>
        <label for="phone">Phone</label>
        <!-- or set via JS -->
        <input id="phone" type="text" />
    </div>

</form>
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="jquery.inputmask.bundle.js"></script>
<script>
    $(":input").inputmask();

    $("#phone").inputmask({"mask": "9999-999-9999-999"});
</script>