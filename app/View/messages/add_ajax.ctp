<?php
if (isset($messages)) {
    echo json_encode([
        'status' => 'success',
        'messages' => $this->element('Message/ajax_messages', ['messages' => $messages]),
    ]);
} elseif (isset($message)) {
    echo json_encode([
        'status' => 'success',
        'message' => $this->element('Message/ajax_message', ['message' => $message]),
    ]);
}
?>
