const searchBar = document.querySelector(".search input"),
      searchIcon = document.querySelector(".search button"),
      usersList = document.querySelector(".users-list");

searchIcon.onclick = () => {
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if (searchBar.classList.contains("active")) {
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
};

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
  if (searchTerm !== "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }
  
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      usersList.innerHTML = xhr.response;
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      if (!searchBar.classList.contains("active")) {
        usersList.innerHTML = xhr.response;
      }
    }
  };
  xhr.send();
}, 500);

// Function to send message request
function sendMessageRequest(receiverId) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/send_request.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = () => {
    if (xhr.status === 200) {
      alert(xhr.responseText); // Notify user of request status
    }
  };
  xhr.send("receiver_id=" + receiverId);
}


// Function to send a message request
function sendMessageRequest(receiverId) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/send_request.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = () => {
      if (xhr.status === 200) {
          // alert(xhr.responseText); // Notify user of request status
      }
  };
  xhr.send("receiver_id=" + receiverId);
}

// Function to accept or reject a message request
function respondRequest(senderId, action) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/respond_request.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = () => {
      if (xhr.status === 200) {
          alert(xhr.responseText); // Notify user of acceptance or rejection
          // location.reload(); // Reload users list
      }
  };
  xhr.send("sender_id=" + senderId + "&action=" + action);
}

// Function to open chat if request is accepted
function openChat(receiverId) {
  window.location.href = "chat.php?user_id=" + receiverId;
}
