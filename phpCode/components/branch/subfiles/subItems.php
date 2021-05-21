<?php
if (!strcmp($flag, "熱熔")) {
    ?>
    <div id="addHotMelt"></div>
    <?php
}else {
    ?>
    <div id="addPressFit"></div>
    <?php
}

?>
<script type="text/javascript">
    var flag = '<?php Print($flag); ?>';
    if (flag == "熱熔") {
        console.log("in hotMelt");
        $("#addHotMelt").load("subfiles/hotMelt.html");
    }else {
        console.log("in 壓合");
        $("#addPressFit").load("subfiles/pressFit.html");
    }
</script>

<script type="text/javascript">
//const leafList = document.querySelector("[id=" + leafList + "]");
//const leafAdd = document.querySelector("[id=" + leafAdd + "]");
//const selectedList = document.querySelector("[id=" + selectedList + "]");
//const btnRemove = document.querySelector("[id=" + btnRemove + "]");

</script>
