<?php
   

// Check if users are available

    while ($row = mysqli_fetch_assoc($query)) {

        $sql2 = "SELECT messages.msg_id, messages.msg, messages.outgoing_msg_id, messages.incoming_msg_id, 
                       media.media_type, media.media_path FROM messages LEFT JOIN media ON messages.msg_id = media.msg_id 
                       WHERE (incoming_msg_id = {$row['unique_id']}
                   OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);


          
    

            // (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
            // (mysqli_num_rows($query2)>0) ? $result = $row2['media_type']: "hh";
            global $msg;
            if(mysqli_num_rows($query2) > 0){
                if($row2['msg'] != null){
                    $result = $row2['msg'];
                    (strlen($result) > 12) ? $msg =  substr($result, 0, 12) . '...' : $msg = $result;
                }
                else{
                    $result = $row2['media_path'];
                    (strlen($result) > 12) ? $msg = '...'. substr($result, -6) : $msg = $result;
                }
            }else{
                $msg ="No message available";
            }
            
      
            if(isset($row2['outgoing_msg_id'])){
                ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
            }else{
                $you = "";
            }

            ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
            ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

         
        $user_id = $row['unique_id'];
        
        // Check if there is a pending message request involving the logged-in user
        $checkRequest = mysqli_query($conn, "SELECT sender_id, receiver_id, status 
                                             FROM message_requests 
                                             WHERE (sender_id = {$outgoing_id} AND receiver_id = {$user_id}) 
                                                OR (sender_id = {$user_id} AND receiver_id = {$outgoing_id})");
        $request = mysqli_fetch_assoc($checkRequest);

        // Determine what button to display based on request status
        if ($request) {
            if ($request['status'] == 'accepted') {
                // $chat_button = '<button onclick="openChat(' . $user_id . ')">Chat</button>';
                $output .= '<a class="hover-underline-animation" href="chat.php?user_id='. $row['unique_id'] .'">
                <div class="content">
                <img src="php/images/'. $row['img'] .'" alt="">
                <div class="details">
                    <span>'. $row['fname']. " " . $row['lname'] .'</span>
                    <p>'. $you . $msg .'</p>
                </div>
                </div>
                <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
            </a>';       
            } elseif ($request['status'] == 'pending' && $request['receiver_id'] == $outgoing_id) {
                $chat_button = '<button class="SendButton-Request" onclick="respondRequest(' . $request['sender_id'] . ', \'accept\')">Accept</button>
                                <button class="SendButton-Request" onclick="respondRequest(' . $request['sender_id'] . ', \'reject\')">Reject</button>';
                 $output .= '<a class="hover-underline-animation">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    ' . $chat_button . '
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>'; 
            }elseif ($request['status'] == 'rejected' && $request['sender_id'] == $outgoing_id)  {
                $chat_button = '<button class="SendButton-Request" onclick="sendMessageRequest(' . $user_id . ')">Send Request</button>';
                 $output .= '<a class="hover-underline-animation">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    ' . $chat_button . '
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>'; 
             } else {
                $chat_button = '<span>'.$request['status'].'</span>';
                 $output .= '<a class="hover-underline-animation">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    ' . $chat_button . '
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>'; 
            }
        } else {
            $chat_button = '<button class="SendButton-Request" onclick="sendMessageRequest(' . $user_id . ')">Send Request</button>';
             $output .= '<a class="hover-underline-animation">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    ' . $chat_button . '
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>'; 
        }
             
    }

?>