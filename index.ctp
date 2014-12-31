
<div class="container recherche">
    <div class="col-lg-12">
        <form  class="sortiejeux" action="#">
            <input type="text" id="langages" placeholder="Rechercher un jeux"/>
        </form>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('#langages').autocomplete({
            serviceUrl: 'liste',
            dataType: 'json'
        });
    });
</script>
