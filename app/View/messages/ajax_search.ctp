<?php foreach ($messages as $message): ?>
    <!-- Output the search results as needed -->
    <!-- Adjust the HTML structure based on your requirements -->
    <div class="search-result">
        <?php echo $message['Message']['message']; ?>
    </div>
<?php endforeach; ?>