<?php
require_once '../parts.php';
require_once '../settings.php';

$settings = get_settings();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Drag Free</title>

  <link rel="stylesheet" href="../../../../../dist/css/themes/splide-<?php echo $settings['theme'] ?>.min.css">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <script type="text/javascript" src="../../../../../dist/js/splide.js"></script>

  <script>
    document.addEventListener( 'DOMContentLoaded', function () {
      var splide = new Splide( '#splide01', {
        perPage: 3,
        gap    : '1.5rem',
        drag   : 'free',
        height : 200,
        type   : 'loop',
        // direction: 'rtl',
      } );

      splide.mount();
    } );
  </script>
</head>
<body>

<?php render(); ?>

</body>
</html>
