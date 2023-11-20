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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    function sendMessage() {
        var formData = $('#messageForm').serialize(); // Serialize the form data
        var baseUrl = '<?php echo $this->Html->url('/'); ?>';
        <?php $id3 = $this->Session->read('usId');?>
        var baseId = '<?php echo $id3;?>';

        // Convert serialized form data to an object
        var formDataObject = {};
        var params = new URLSearchParams(formData);
        params.forEach(function(value, key) {
            formDataObject[key] = value;
        });

        $.ajax({
            type: 'POST',
            url: baseUrl + '/messages/index/' + baseId,
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Access individual data fields
                    var userId = formDataObject['data[user_id]'];


                    window.location.href = '/cakephp/messages/index/' + userId;
                } else {
                    $('#response').html(response.message);
                }
            },
            error: function() {
                $('#response').html('Error sending message.');
            }
        });
    }
    </script>

    <!-- <script>
// Assume you have an array of messages
var allMessages = [
    "Message 1",
    "Message 2",
    // ... (more messages)
    "Message 10",
    "Message 1",
    "Message 2",
    // ... (more messages)
    "Message 10",
    "Message 1",
    "Message 2",
    // ... (more messages)
    "Message 10",
    "Message 1",
    "Message 2",
    // ... (more messages)
    "Message 10",
    "Message 1",
    "Message 2",
    // ... (more messages)
    "Message 10",
    // ... (more messages)
];

var messagesPerPage = 2;
var currentPage = 1;

// Function to display messages based on the current page
function displayMessages() {
    var startIndex = (currentPage - 1) * messagesPerPage;
    var endIndex = startIndex + messagesPerPage;
    
    // Clear the existing messages
    $('#messagesContainer').empty();

    // Display messages for the current page
    for (var i = startIndex; i < endIndex && i < allMessages.length; i++) {
        $('#messagesContainer').append('<p>' + allMessages[i] + '</p>');
    }
}

// Show More button click event
$('#showMore').on('click', function() {
    currentPage++;
    displayMessages();
});

// Show Less button click event
$('#showLess').on('click', function() {
    if (currentPage > 1) {
        currentPage--;
        displayMessages();
    }
});

// Initial display on page load
displayMessages();
</script> -->
    <script>
    $(document).ready(function() {
        <?php $userId = $this->Session->read('UserId');?>
        var baseId = '<?php echo $userId;?>';
        // Find the button by its class or ID
        $('.increment-btn').click(function() {
            // Get the current value of the button
            var currentValue = parseInt($(this).val());


            // Increment the value by 2
            var newValue = currentValue + 10;

            // Update the button value
            $(this).val(newValue);

            // AJAX request to update the CakePHP session
            $.ajax({
                type: 'POST',
                url: '/cakephp/messages/index/' + baseId, // Replace with the correct URL
                data: {
                    newValue: newValue
                },
                success: function(response) {
                    // Handle success if needed
                    //    alert('Session updated successfully'+newValue);
                },
                error: function() {
                    // Handle error if needed
                    alert('Failed to update session');
                }
            });
        });
    });
    </script>


    <script>
    $(document).ready(function() {
        var baseUrl = '<?php echo $this->Html->url('/'); ?>';
        <?php $userId = $this->Session->read('UserId');?>
        var baseId = '<?php echo $userId;?>';
    
        // Variable to store the interval ID
        var chatInterval;
        var interacting = false;

        // Flag to track whether a message is being edited or hovered over



        // var currentPage = 1;


        // $('#show-more-btn').on('click', function() {
        //     currentPage++;
        //     loadMoreMessages(currentPage);
        // });

        // function loadMoreMessages(page) {
        //     $.ajax({
        //         type: 'GET',
        //         url: baseUrl + 'messages/index/' + baseId + '/' + 'page:' +
        //             page, // Explicitly pass the page parameter
        //         success: function(data) {
        //             $('#chat-container').append(data);
        //         },
        //         error: function() {
        //             console.log('Error loading more messages.');
        //         }
        //     });
        // }

        function truncateText() {
    $(".message-content").each(function () {
        var content = $(this);
        var originalText = content.text();

        if (!interacting) {
            var truncatedText = originalText.length > 50 ? originalText.substring(0, 50) + "... <a href='' class='show-more-link'>Show More</a>" : originalText;
            content.html(truncatedText);
        }
    });
}

    // Click event using event delegation
    $(document).on("click", ".show-more-link", function (event) {
        event.preventDefault();
        interacting = true;
        var content = $(this).closest(".message-content");
        var originalText = content.data("original-text");
        
        content.html(originalText);
    });



    // Call the function initially
    truncateText();

        // Function to update chat
        function updateChat() {
            $.ajax({
                type: "GET",
                url: baseUrl + 'messages/index/' + baseId,
                success: function(data) {
                    $("#chat-container").html(data);
                    truncateText(); // Call truncateText after updating chat
                },
                error: function() {
                    console.log('Error updating chat.');
                }
            });
        }
        var update = setInterval(function() {
            updateChat();
        }, 1000);

        $('.search-form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission behavior

            var searchTerm = $('.search-bar').val();

            if (searchTerm.trim() === '') {
                // If the search term is empty, start the interval again
                update = setInterval(function() {
                    updateChat();
                }, 1000);
            } else {
                // If the search term is not empty, clear the interval
                clearInterval(update);

                // Make an AJAX request to the search action
                $.ajax({
                    type: 'GET',
                    url: '/cakephp/messages/ajaxSearch',
                    data: {
                        term: searchTerm
                    },
                    success: function(data) {
                        $('#chat-container').html(data);
                    },
                    error: function() {
                        console.log('Error in AJAX request.');
                    }
                });
            }
        });


        // Update chat every 5 seconds


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
                url: '/cakephp/messages/delete/' + messageId +
                    '.json', // Use the .json extension to trigger JSON response
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

    <script>
    $(document).ready(function() {
        $('.delete-convo').on('click', function(event) {
            event.preventDefault();

            var userId = $(this).data('id');

            if (confirm('Are you sure you want to delete this conversation?')) {
                $.ajax({
                    type: 'POST',
                    url: '/cakephp/messages/deleteConversation/', // Adjust the URL based on your routing configuration
                    data: {
                        id1: userId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Handle success, maybe redirect or show a success message
                            window.location.href = '/cakephp/messages/index/' + userId;
                            alert('success!');
                        } else {
                            // Handle error, if necessary
                            alert('Error deleting conversation.');
                        }
                    },
                    error: function() {
                        // Handle error, if necessary
                        alert('Error deleting conversation. Please try again.');
                    }
                });
            }
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        // Handle button click event
        $('#showLessButton').click(function(e) {
            // Prevent the default form submission
            e.preventDefault();

            // Make an AJAX request to update the session variable
            $.ajax({
                type: 'POST',
                url: '/cakephp/messages/updateLimit',
                dataType: 'json',
                success: function(response) {
                    // Handle success response if needed
                    console.log('Session variable updated successfully');
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    console.error('Error updating session variable:', error);
                }
            });
        });
    });
    </script>



</body>