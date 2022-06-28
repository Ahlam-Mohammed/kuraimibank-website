<script>
    function selectAll(source) {
        let checkboxes = document.getElementsByName('permissions[]');

        checkboxes.forEach((e) => {
            e.checked = source.checked;
        })
    }
</script>
