<form class="myform" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST" id="filter-form">

    <?php 
    $args = array(
        'show_option_all' => 'Catégories',
        'taxonomy' => 'categorie', 
        'name' => 'categorie',
        'orderby' => 'name',
        'class' => 'filter-select',
    );
    wp_dropdown_categories($args);
    ?>
   <?php 
    $args = array(
        'show_option_all' => 'Format',
        'taxonomy' => 'format', 
        'name' => 'format',
        'orderby' => 'name',
        'class' => 'filter-select',
    );
    wp_dropdown_categories($args);
    ?>
    <div class="filter-group">

    <select name="date" id="date">
        <option selected value="">Trier par Date</option>
        <option value="ASC">Plus récents</option> 
        <option value="DESC">Plus anciens</option>
    </select>
    </div>

    <!-- <button type="submit">Appliquer le filtre</button> -->
    <input type="hidden" name="action" value="filter_posts">
</form>

<div id="response"></div>
