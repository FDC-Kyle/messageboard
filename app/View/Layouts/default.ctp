<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'); ?>
<?php echo $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'); ?>




	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title');  ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('styles1');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');

		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		
	?>
</head>
<body>
	<div id="container">

    <div id="header">
			<h1>Message Board FDCI</h1>
			
		</div>
	
		<div id="content">


			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
        <?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
	
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->

    <?php echo $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js'); ?>


<?php echo $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'); ?>

<?php echo $this->Html->script('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'); ?>

<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            dateFormat: 'yy-mm-dd', // Set the desired date format
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0" // Set the desired year range
        });
    });
</script>
<script type="text/javascript">
    // Initialize Select2 for the 'select2' class with search functionality
    $(document).ready(function() {
    $('.s-example-basic-single').select2();
});
</script>
<script>
function sendMessage1() {
    var formData = $('#messageForm1').serialize(); // Serialize the form data
    var baseUrl = '<?php echo $this->Html->url('/'); ?>';
    <?php $userId = $this->Session->read('UserId');?>
    var baseId = '<?php echo $userId;?>';

    $.ajax({

        type: 'POST',
        url: baseUrl + '/messages/index/' + baseId,
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                $('#response1').html(response.message);
            } else {
                $('#response1').html(response.message);
            }
        },
        error: function() {
            $('#response1').html('Error sending message.');
        }
    });
}
</script>



<script>
    var baseUrl = '<?php echo $this->Html->url('/'); ?>';
    <?php $userId = $this->Session->read('UserId');?>
    var baseId = '<?php echo $userId;?>';
    

    function updateChat() {
        $.ajax({
            type: "GET",
            url: baseUrl + 'messages/index/' + baseId, // Replace with your controller and action
            success: function(data) {
                $("#chat-container").html(data);
            },
            error: function() {
                console.log('Error updating chat.');
            }
        });
    }

    $(document).ready(function() {
        setInterval(updateChat, 1000); // Update every 5 seconds (adjust as needed)
    });
</script>



<script>
$(document).ready(function() {
    $('.delete-link').on('click', function(e) {
        e.preventDefault();
        var messageId = $(this).data('message-id');

        // Perform the Ajax request
        $.ajax({
            type: 'POST',
            url: '/cakephp/messages/delete/' + messageId + '.json', // Use the .json extension to trigger JSON response
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Update the UI or perform any additional actions for a successful delete
                    alert(response.message);
                } else {
                    // Handle error scenario
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred during the Ajax request.');
            }
        });
    });
});
</script>


</body>





