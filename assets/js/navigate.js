function navigate() {
    let select = document.getElementById("options");
    let selectedOption = select.options[select.selectedIndex].value;
    
    if (selectedOption === "users") {
      window.location.href = "./page_users.php?search2="; 
    } else if (selectedOption === "log") {
      window.location.href = "./page_log.php";
    }
}