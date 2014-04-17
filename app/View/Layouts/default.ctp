<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?php echo $title_for_layout; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <?php
        echo $this->Html->css(array(
            'bootstrap',
            'style', 'font-awesome/css/font-awesome.min'
        ));
        ?>
        <!-- Page Specific CSS -->
        <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        
        <?php
        $baseUrl = $this->webroot;
        echo "<script>var SERVER = '$baseUrl';</script>";
        ?>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <?php
        echo "<!--[if lt IE 9]>" . $this->Html->script('html5shiv') . "<![endif]-->";
        ?>

        <!-- Fav and touch icons -->
        <?php
        echo $this->Html->meta(
                'favicon.png', '/favicon.png', array('type' => 'icon')
        );
        ?>

        <?php
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>

    <body>
        <div id="wrapper">
        <?php echo $this->element('admin/navbar'); ?>
            <div id="page-wrapper">
                <?php echo $this->fetch('content'); ?>
            </div>
            <hr>
            <footer>
                <p>&copy; Company <?php echo date('Y'); ?></p>
            </footer>
            
        </div>
        <?php
            echo $this->Html->script(array(
                'jquery',
                'bootstrap',
            ));
            ?>
        <!-- Page Specific Plugins -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
        <?php
            echo $this->Html->script(array(
                'morris/chart-data-morris',
                'tablesorter/jquery.tablesorter',
                'tablesorter/tables'
            ));
            ?>
        <?php //echo $this->element('sql_dump'); ?>
    </body>

</html>