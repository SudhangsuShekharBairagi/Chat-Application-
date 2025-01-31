<?php 
// <?php 

session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $msg = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : null;
    if (empty($msg)) {
        $msg = null; // Set NULL for empty messages
    }
    // Handle text message
    if (!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                    VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die(mysqli_error($conn));
        if ($sql) {
            echo "Success";
        } else {
            echo "Something went wrong. Please try again!";
        }
    } 
    // Handle image upload
    elseif (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        handleFileUpload($conn, $incoming_id, $outgoing_id, $_FILES['image'], 'image');
    } 
    // Handle video upload
    elseif (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
        handleFileUpload($conn, $incoming_id, $outgoing_id, $_FILES['video'], 'video');
    } 
    // Handle document upload
    elseif (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
        handleFileUpload($conn, $incoming_id, $outgoing_id, $_FILES['document'], 'document');
    } 
    else {
        echo "No file uploaded or error occurred.";
    }
} else {
    header("location: ../login.php");
}

// Function to handle file uploads for images, videos, and documents
function handleFileUpload($conn, $incoming_id, $outgoing_id, $file, $media_type) {
    $file_name = $file['name'];
    $file_type = $file['type'];
    $tmp_name = $file['tmp_name'];

    // Get the file extension
    $file_explode = explode('.', $file_name);
    $file_ext = strtolower(end($file_explode));

    // Allowed extensions for each media type
    $allowed_extensions = [
        'image' => ["jpeg", "png", "jpg"],
        'video' => ["mp4", "avi", "mov"],
        'document' => ["doc", "docx", "pdf", "txt", "xls", "xlsx", "ppt", "pptx"]
    ];

    // Allowed MIME types for each media type
    $allowed_types = [
        'image' => ["image/jpeg", "image/jpg", "image/png"],
        'video' => ["video/mp4", "video/x-msvideo", "video/quicktime"],
        'document' => [
            "application/msword", 
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
            "application/pdf", 
            "text/plain",
            "application/vnd.ms-excel",
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
            "application/vnd.ms-powerpoint",
            "application/vnd.openxmlformats-officedocument.presentationml.presentation"
        ]
    ];

    // Check if the file extension and type are allowed
    if (in_array($file_ext, $allowed_extensions[$media_type]) && in_array($file_type, $allowed_types[$media_type])) {
        $time = time();
        $new_file_name = $time . "_" . $file_name; // Generate a unique file name

        // Define upload directory based on media type
        $upload_dir = "uploads/" . $media_type . "s/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
        }

        // Move the uploaded file to the appropriate directory
        if (move_uploaded_file($tmp_name, $upload_dir . $new_file_name)) {
            // Insert the message into the messages table
            $sql_message = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                                VALUES ({$incoming_id}, {$outgoing_id}, NULL)") or die(mysqli_error($conn));
            
            if ($sql_message) {
                $msg_id = mysqli_insert_id($conn); // Get the inserted message ID

                // Insert the media details into the media table
                $sql_media = mysqli_query($conn, "INSERT INTO media (msg_id, media_type, media_path)
                                                  VALUES ({$msg_id}, '{$media_type}', '{$new_file_name}')") or die(mysqli_error($conn));

                if ($sql_media) {
                    echo "Success";
                } else {
                    echo "Failed to save media details.";
                }
            } else {
                echo "Failed to save message.";
            }
        } else {
            echo "Failed to move uploaded file.";
        }
    } else {
        echo "Invalid file type or extension.";
    }
}


//    session_start();
//    if (isset($_SESSION['unique_id'])) {
//        include_once "config.php";
//        $outgoing_id = $_SESSION['unique_id'];
//        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
//        $message = mysqli_real_escape_string($conn, $_POST['message']);
   
//        // Check if a message is provided
//        if (!empty($message)) {
//            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
//                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die(mysqli_error($conn));
//            if ($sql) {
//                echo "Success";
//            } else {
//                echo "Something went wrong. Please try again!";
//            }
//        } 
       
//        // Handle image upload
//        elseif (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
//            handleFileUpload($conn, $incoming_id, $outgoing_id, $_FILES['image'], "SendImg");
//        } 
       
//        // Handle video upload
//        elseif (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
//            handleFileUpload($conn, $incoming_id, $outgoing_id, $_FILES['video'], "SendVideo");
//        } 
//        elseif (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
//         handleFileUpload($conn, $incoming_id, $outgoing_id, $_FILES['document'], "Senddocument");
//        } 
       
//        else {
//            echo "No file uploaded or error occurred.";
//        }
//    } else {
//        header("location: ../login.php");
//    }
   
//    // Function to handle file uploads for both images and videos
//    function handleFileUpload($conn, $incoming_id, $outgoing_id, $file, $db_column) {
//        $file_name = $file['name'];
//        $file_type = $file['type'];
//        $tmp_name = $file['tmp_name'];
   
//        // Get the file extension
//        $file_explode = explode('.', $file_name);
//        $file_ext = strtolower(end($file_explode)); // Make extension lowercase
   
//        // Allowed extensions for images and videos
//        $image_extensions = ["jpeg", "png", "jpg"];
//        $video_extensions = ["mp4", "avi", "mov"];
//        $document_extensions = ["doc", "docx", "pdf", "txt", "xls", "xlsx", "ppt", "pptx"];
//        $all_extensions = array_merge($image_extensions, $video_extensions, $document_extensions); // Combine both arrays
   
//        if (in_array($file_ext, $all_extensions)) {
//            $image_types = ["image/jpeg", "image/jpg", "image/png"];
//            $video_types = ["video/mp4", "video/x-msvideo", "video/quicktime"];
//            $document_types = [
//             "application/msword",               // .doc
//             "application/vnd.openxmlformats-officedocument.wordprocessingml.document", // .docx
//             "application/pdf",                  // .pdf
//             "text/plain",                       // .txt
//             "application/vnd.ms-excel",         // .xls
//             "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", // .xlsx
//             "application/vnd.ms-powerpoint",    // .ppt
//             "application/vnd.openxmlformats-officedocument.presentationml.presentation" // .pptx
//         ];
//            $all_types = array_merge($image_types, $video_types, $document_types); // Combine both MIME types
   
//            if (in_array($file_type, $all_types)) {
//                $time = time();
//                $new_file_name = $time . "_" . $file_name; // Use underscore to avoid issues
   
//                // Move the uploaded file to the appropriate directory
//                if (move_uploaded_file($tmp_name, "Sendimages/" . $new_file_name)) {
//                    // Insert the file name into the correct database column (image or video)
//                    $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, {$db_column})
//                                                VALUES ({$incoming_id}, {$outgoing_id}, '{$new_file_name}')") or die(mysqli_error($conn));
   
//                    if ($sql) {
//                        echo "Success";
//                    } else {
//                        echo "Something went wrong. Please try again!";
//                    }
//                } else {
//                    echo "Failed to move uploaded file.";
//                }
//            } else {
//                echo "File type not allowed.";
//            }
//        } else {
//            echo "Invalid file extension.";
//        }
//    }  


?>
